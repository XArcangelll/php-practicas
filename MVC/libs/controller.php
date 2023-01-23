<?php

class Controller{

    //lo declare no mas por el error q me daba en el intelephense la verdad no es necesario jaja; el public view;
    public $view;
    public $model;

    function __construct()
    {
         
           // echo "<p>Controlador Base</p>";
            $this->view = new View();
    }

    function loadModel($model){
        $url ="models/" .$model . "model.php";

        if(file_exists($url)){
            require $url;
            $modelname = $model. "Model";
            $this->model = new $modelname();
        }
    }
}

?>