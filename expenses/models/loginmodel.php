<?php

require_once "models/usermodel.php";

    class loginModel extends Model{

        function __construct()
        {
            parent::__construct();
        }


        function login($username,$password){
            try{
                $query = $this->prepare("SELECT * FROM users where username = :username");
                $query->execute(["username" => $username]);

                if($query->rowCount() == 1){
                    $item = $query->fetch(PDO::FETCH_ASSOC);
                    $user = new UserModel();
                    $user->from($item);

                    if(password_verify($password,$user->getPassword())){
                        error_log("LoginModel::login->sucess");
                        return $user;
                    }else{
                        error_log("LoginModel::login->PASSWORD NO ES IGUAL");
                        return NULL;
                    }
                }
            }catch(PDOException $e){
                error_log("LOGINMODEL::Login->exception " .$e);
                    return null;
            }
        }
    }



?>