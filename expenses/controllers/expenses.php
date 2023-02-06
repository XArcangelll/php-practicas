<?php

require_once "models/expensesmodel.php";
require_once "models/categoriesmodel.php";

class Expenses extends SessionController{
    
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->render("expenses/index",[
            "user" => $this->user
        ]);
      
    }

    function newExpenses(){
        if(!$this->existPOST(["title","amount","category","date"])){
            $this->redirect("dashboard",[]); //todo error
            return;
        }

        if($this->user == null){
            $this->redirect("dashboard",[]); //TODO: error
            return;
        }

        $expense = new ExpensesModel();

        $expense->setTitle($this->getPost("title"));
        $expense->setAmount((float)$this->getPost("amount"));
        $expense->setCategoryId($this->getPost("category"));
        $expense->setDate($this->getPost("date"));
        $expense->setUserId($this->user->getId());

        $expense->save();
        $this->redirect("dashboard",[]); //TODO : success
    }

    function create(){
        $categories = new CategoriesModel();
        $this->view->render("expenses/create",[
            "categories"=>$categories->getAll(),
            "user"=> $this->user
        ]);
    }

    function getCategoriesId(){
        $joinModel = new JoinExpensesCategoriesModel();
        $categories = $joinModel->getAll($this->user->getId());
        $res = [];

        foreach($categories as $cat){
            array_push($res,$cat->getCategoryId());
        }
        $res = array_values(array_unique($res));

        return $res;
    }

    private function getDateList(){
        $months = [];
        $res = [];
        $joinModel = new JoinExpensesCategoriesModel();
        $expenses =  $joinModel->getAll($this->user->getId());
        foreach($expenses as $expense){
            array_push($months,substr($expense->getDate(),0,7));
        }
        
    }







}

?>