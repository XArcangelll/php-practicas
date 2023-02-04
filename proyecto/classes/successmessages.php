<?php

class SuccessMessages{

    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = "79cd10ec211ccbea8fda665c2f53f382";

    private $successList = [];


     public function __construct()
    {
        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => "El nombre de la categoría registrada"
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