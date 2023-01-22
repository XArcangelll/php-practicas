<?php

class Controller{

    //lo declare no mas por el error q me daba en el intelephense la verdad no es necesario jaja; el public view;
    public $view;

    function __construct()
    {
         
            echo "<p>Controlador Base</p>";
            $this->view = new View();
    }
}

?>