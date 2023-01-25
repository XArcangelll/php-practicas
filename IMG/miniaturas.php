<?php

    crearMiniatura($_FILES["imagen"]["name"]);

    function crearMiniatura($nombreArchivo){

        $finalwidth = 100;
        $dirFullImage = "imagenes/full/";
        $dirThumbImage = "imagenes/thumbs/";
        $tmpName = $_FILES["imagen"]["tmp_name"];
        $finalName = $dirFullImage . $_FILES["imagen"]["name"];

        //copiar mi imagen a la carpeta full
        copiarImagen($tmpName,$finalName);

        $im = null;
        //preg_match expresion regular validar q es imagen
        if(preg_match("/[.](jpg)$/",$nombreArchivo)){
                $im =  imagecreatefromjpeg($finalName);
        }else if(preg_match("/[.](gif)$/",$nombreArchivo)){  
            $im = imagecreatefromgif($finalName);
        }else if(preg_match("/[.](png)$/",$nombreArchivo)){
            $im = imagecreatefrompng($finalName);
        }

       $width = imagesx($im);
       $height = imagesy($im);

       $minWidth = $finalwidth;
       $minHeight = floor($height * ($finalwidth/$width));

       $imageTrueColor = imagecreatetruecolor($minWidth,$minHeight);
       //imagetruecolor es el destino donde montaremos nuestra imagen
       imagecopyresized($imageTrueColor, $im, 0,0,0,0, $minWidth,$minHeight,$width,$height);

       if(!file_exists($dirThumbImage)){
            if(!mkdir($dirThumbImage)){
                die("Hubo un problema con la miniatura");
            }
       }

       imagejpeg($imageTrueColor,$dirThumbImage . $nombreArchivo);
       $html = '<img src="' . $dirThumbImage . $nombreArchivo . '" alt="image" />';
     $html .= '<br />Tu imagen ha sido creada exitosamente';
     echo $html;

    }

    function copiarImagen($origen,$destino){
            move_uploaded_file($origen,$destino);
    }

?>

