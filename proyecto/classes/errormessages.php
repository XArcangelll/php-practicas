<?php

class ErrorMessages{
    //ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "79cd10ec211ccbea8fda665c2f53f382";

    private $errorList = [];
    public  function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => "Este es un ejemplo error"
        ];
    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existKey($key){
        if(array_key_exists($key,$this->errorList)){
            return true;
        }else{
            return false;
        }

    }
}

?>