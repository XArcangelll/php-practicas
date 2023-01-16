<?php

//caracter
$letra = "c";
//entero
$numero = 45;
//cadena
$cadena = "dieguito";
//flotante
$decimal = 15414.65;
//booleano
$verdadero = true;
//arreglo
$carros = array("chico","camino","perro","gato");
//nulos
$nada = null;
print_r($carros);
echo "<br>";

/*foreach($carros['data'] as $result) {
    echo $result['type'], '<br>';
}*/

foreach ($carros as $i=>$k){
    echo "$i <br> $k <br>";
}


?>