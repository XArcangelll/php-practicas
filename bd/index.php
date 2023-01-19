<?php
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $db = "todoListDB";

    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);

    if($conexion->connect_error){
        die("conexion fallida: " . $conexion->connect_error);
    }

    $sql = "CREATE DATABASE todolistDB";

   /* if($conexion->query($sql) === true){
        echo "base de datos creada correctamente";
    }else{
        die("Error al crear la base de datos: " .$conexion->error );
    }*/

    $sql = "CREATE TABLE todoTable(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        texto varchar(100) NOT NULL,
        completado BOOLEAN  NOT NULL,
        timestamp TIMESTAMP
    )";

    if($conexion->query($sql)===true){
        echo "La tabla se creo correctamente";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }
?>