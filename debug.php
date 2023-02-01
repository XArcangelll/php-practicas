<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function sumar($a,$b){
        if(!is_int($a) || !is_int($b)) return null;
        return $a + $b;
    }

    $a = 5;
    $b = 6;

    $c = sumar($a,$b);

    if($c === null) {
        echo "No son números";
    }else{
        echo "El resultado es : " . $c;
    }

    ?>
</body>
</html>