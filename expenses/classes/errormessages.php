<?php

class ErrorMessages{
    //ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "79cd10ec211ccbea8fda665c2f53f382";
    const ERROR_SIGNUP_NEWUSER = "10cd10gc211wcbea8fza665c2f53f382";
    const ERROR_SIGNUP_NEWUSER_EMPTY = "46c870gc211wcbea8fza614c2f97f382";
    const ERROR_SIGNUP_NEWUSER_EXISTS = "79c870gs211wcuya8yza614c2f97x382";
    const ERROR_LOGIN_AUTHENTICATE_DATA = "79c870gs3sawxcya7yza614c2f97x222";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "79c870gs3sawcuya8yza614c2f97x222";
    const ERROR_LOGIN_AUTHENTICATE = "79c870gs3sawcooa8zza64sadf97x222";

    private $errorList = [];
    public  function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => "Este es un ejemplo error",
            ErrorMessages::ERROR_SIGNUP_NEWUSER => "Hubo un error un al intentar procesar la solicitud",
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => "Llena los campos del ususario y password",
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS => "Nombre de usuario ya existe",
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY => "Llena los campos de usuario y password",
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => "Nombre de usuario y/o contraseña incorrectos",
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE => "No se puede procesar la solicitud, ingrese ususario y password"
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