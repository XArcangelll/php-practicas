<?php
    function saludo(){
        $args = func_get_args();
        print_r($args);
        echo __FUNCTION__;
        //echo class;
    }

    saludo("dieguito","zin","apellido");

    $files = glob("*.{txt,php}",GLOB_BRACE);

    print_r($files);

    $item  = array(
        "nombre" => "diego",
        "mascota" => "ricardo",
        "edad" => 25,
        "hobbies" => array(
            "programacion",
            "peliculas"
        )
    );

    $string = serialize($item);
        echo $string;
    echo "\n";
        $string = unserialize($string);
     print_r($string);
    echo "\n";
    echo __LINE__;
     echo "\n";
    echo __DIR__;
    echo "\n";
    echo __FILE__;
    echo "\n";
    echo uniqid("id_");
    echo "\n";
    $texto = "la mamamama la mamamamala mamamama la mamamama la mamamama la mamamama la mamamama la mamamama la mamamama la mamamama";

    echo strlen($texto);
    echo "\n";
    $compress = gzcompress($texto);
    echo strlen($compress);
    echo "\n";
    $original = gzuncompress($compress);
    echo strlen($original);

    highlight_string('<?php echo "ayarmanco" ?>');

    highlight_file('index.php');

?>