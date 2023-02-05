<?php

class SuccessMessages{

    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = "79cd10ec211ccbea8fda665c2f53f382";
    const SUCCESS_SIGNUP_NEWUSER = "79cd10ec211ufbea8fda745c2f53f382";

    private $successList = [];


     public function __construct()
    {
        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => "El nombre de la categoría registrada",
            SuccessMessages::SUCCESS_SIGNUP_NEWUSER => "Nuevo usuario registrado correctamente"
        ];
    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existKey($key){
        if(array_key_exists($key,$this->successList)){
            return true;
        }else{
            return false;
        }

    }
}

?>