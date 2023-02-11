<?php

require_once "models/expensesmodel.php";
require_once "models/categoriesmodel.php";
require_once "models/joinexpensescategoriesmodel.php";
require_once "models/usermodel.php";

    class Admin extends SessionController{

        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $stats = $this->getStatistics();

            $this->view->render("admin/index",[
                "stats"=> $stats
            ]);
        }

        function createCategory(){
            $this->view->render("admin/create-category");
        }

        function newCategory(){
            if($this->existPOST(["name","color"])){
                $name = $this->getPost("name");
                $color = $this->getPost("color");

                $categoriesModel = new CategoriesModel();

                if(!$categoriesModel->exists($name)){
                    $categoriesModel->setName($name);
                    $categoriesModel->setColor($color);
                    $categoriesModel->save();

                    $this->redirect("admin",["success"=> SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY]); //TODO
                }else{
                    $this->redirect("admin",["error"=> ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS]); //error
                }
            }
        }

        private function getMaxAmounth($expenses){
            $max = 0;
            foreach($expenses as $expense){
                $max = max($max,$expense->getAmount());
            }

            return $max;
        }

        private function getMinAmounth($expenses){
            $min = $this->getMaxAmounth($expenses);
            foreach($expenses as $expense){
                $min = min($min,$expense->getAmount());
            }

            return $min;
        }
    
        private function getAverageAmounth($expenses){
            $sum= 0;
            foreach($expenses as $expense){
                $sum += $expense->getAmount();
            }
            return ($sum/count($expenses));
        }

        private function getCategoryMostUsed($expenses){
            $repeat = [];
            foreach($expenses as $expense){
                if(!array_key_exists($expense->getCategoryId(),$repeat)){
                    $repeat[$expense->getCategoryId()]=0;
                }
                $repeat[$expense->getCategoryId()]++;
            }
            
            //$categoryMostUsed = max($repeat);
            $categoryMostUsed = array_search(max($repeat),$repeat);
            //lo de abajo sirve pero esto mas abreviado
          /*  $categoryMostUsed = 0;
            $maxCategory = max($repeat);
            foreach($repeat as $index => $category){
                  if($category == $maxCategory){
                      $categoryMostUsed = $index;
                  }
            }*/

            $categoryModel = new CategoriesModel();
            $categoryModel->get($categoryMostUsed);
            $category = $categoryModel->getName();

            return $category;

        }

        private function getCategoryLessUsed($expenses){
            $repeat = [];
            foreach($expenses as $expense){
                if(!array_key_exists($expense->getCategoryId(),$repeat)){
                    $repeat[$expense->getCategoryId()]=0;
                }
                $repeat[$expense->getCategoryId()]++;
            }
            
            //$categoryMostUsed = less($repeat);
          //ESTE SI SIRVE 
           $categoryLessUsed = array_search(min($repeat),$repeat);
        /*  $categoryLessUsed = 0;
          $minCategory = min($repeat);
          foreach($repeat as $index => $category){
                if($category == $minCategory){
                    $categoryLessUsed = $index;
                }
          }*/

            $categoryModel = new CategoriesModel();
            $categoryModel->get($categoryLessUsed);
            $category = $categoryModel->getName();

            return $category;

        }

        function getStatistics(){
            $res = [];

            $userModel = new UserModel();
            $users = $userModel->getAll();

            $expensesModel = new ExpensesModel();
            $expenses = $expensesModel->getAll();

            $categoriesModel = new CategoriesModel();
            $categories = $categoriesModel->getAll();

            $res["count-users"] = count($users);
            $res["count-expenses"] = count($expenses);
            $res["max-expenses"] = $this->getMaxAmounth($expenses);
            $res["min-expenses"] =  $this->getMinAmounth($expenses);
            $res["avg-expenses"] =  $this->getAverageAmounth($expenses);
            $res["count-categories"] = count($categories);
            $res["mostused-categories"] = $this->getCategoryMostUsed($expenses);
            $res["lessused-categories"] = $this->getCategoryLessUsed($expenses);

            return $res;

        }

    }

?>