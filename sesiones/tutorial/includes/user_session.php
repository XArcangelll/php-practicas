<?php

class UserSession{

    public function __construct()
    {
        session_set_cookie_params(60*60*24*14); //14 dias
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION["user"] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION["user"];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}


?>