<?php

    $x = 20;
    $y = 2;

    echo $x + $y;
    echo "<br>";

    echo $x - $y;
    echo "<br>";

    echo $x * $y;
    echo "<br>";


    echo $x / $y;
    echo "<br>";


    echo $x % $y;
    echo "<br>";

    echo $x ** $y;
    echo "<br>";

    $x = $y;
    echo $x;

    $x += $y;
    echo "<br>";
    echo $x;
    echo "<br>";

    $x = 5;
    $y = "5";
    // comparar 2 valores true o false
   var_dump($x == $y);
    echo "<br>";
    //comparacion mas estricta
    var_dump($x === $y);
    echo "<br>";
    //diferencia !== o <>
    var_dump($x !== $y);
    echo "<br>";
    // importante la posicion ++ o -- 
    echo ++$x;
    echo "<br>";
    echo $x;





?>