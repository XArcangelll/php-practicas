<?php

class View{

    public $mensaje;
    public $alumnos = [];
    public $alumno;
    function __construct()
    {
          //  echo "<p>Vista Base</p>";
    }

    function render($nombre){
        require "views/" . $nombre . ".php";
    }
}

?>