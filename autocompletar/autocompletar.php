<?php

include_once "database.php";

class AutoCompletar extends Database{
    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare("SELECT * FROM mascotas WHERE nombre LIKE :texto");
        $query->execute(["texto"=>$texto . "%"]);

        if($query->rowCount()){
            while($row = $query->fetch()){
                array_push($res,$row["nombre"]);
            }
        }
            return $res;
        

    }
}


?>