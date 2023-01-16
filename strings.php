<?php

    $mensaje = "hoy voy a aprender mucho";

    echo strlen($mensaje);
    echo "<br>";

    echo str_word_count($mensaje);
    echo "<br>";

    echo strrev($mensaje);
    echo "<br>";

    echo strpos($mensaje,"aprender");
    echo "<br>";
    //remplazar
    echo str_replace("aprender","tu vieja", $mensaje);
    echo "<br>";
    //minusculas
    echo strtolower($mensaje);
    echo "<br>";
    //minusculas
    echo strtoupper($mensaje);
    echo "<br>";
    //comparar cadena
    echo strcmp("a","b");
    //sustraer cadena
    echo "<br>";
    // segundo 4 es para la posicion 5 el numero de caracteres q quiers q cuente
    echo substr($mensaje,4,5);
    echo "<br>";
    //remover spacios en blanco
    echo trim("tu viejaaaaa                  si");


?>