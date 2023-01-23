<?php

class ErrorM extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hubo un error causa o no existe la página";
        $this->view->render("error/index");

        //    echo "<p>Error al cargar recurso</p>";
    }

  
}

?>