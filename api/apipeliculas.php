<?php

include_once 'pelicula.php';

class ApiPeliculas{

    private $imagen;
    private $error;

    function getAll(){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPeliculas();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                    "imagen" => $row['imagen'],
                );
                array_push($peliculas["items"], $item);
            }
        
            $this->printJSON($peliculas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPelicula($id);



        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id" => $row['id'],
                "nombre" => $row['nombre'],
                "imagen" => $row['imagen'],
            );
            array_push($peliculas["items"], $item);
            $this->printJSON($peliculas);
        }else{
           $this->error("no hay elementos registrados");
        }
    }

    function add($item){
        $pelicula = new Pelicula();
        $res = $pelicula->nuevaPelicula($item);
        $this->exito("nueva pelicula registrada");

    }

    function printJSON($array){
        echo  json_encode($array) ;
    }



    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje),JSON_UNESCAPED_UNICODE); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje),JSON_UNESCAPED_UNICODE); 
    }

    function subirImagen($file){
            $directorio = "imagenes/";

            $this->imagen = basename($file["name"]);
            $archivo = $directorio . basename($file["name"]);

            $tipoArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

            //valida que es imagen
            $checarSiImagen = getimagesize($file["tmp_name"]);

            if($checarSiImagen !=false){
                $size = $file["size"];

                if($size > 500000){
                    $this->error("El archivo tiene que ser menor a 500 000 kbs");
                    return false;
                }else{
                    //validar tipo de imagen

                    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                        //se valido el archivo correctamente

                            if(move_uploaded_file($file["tmp_name"],$archivo)){
                                //el archivo subio correctamente

                                return true;
                            }else{
                                $this->error("Hubo un error en la subida de archivos");
                                return false;
                            }
                    }else{
                        $this->error("Solo se admiten archivos jpg o jpeg");
                        return false;
                    }
                }
            }else{
                $this->error("el documento no es una imagen");
                return false;
            }
    }

    function getImagen(){
        return $this->imagen;
    }

    function getError(){
        return $this->error;
    }

   
}

?>