<?php

require_once "controllers/errores.php";

class App{

    function __construct()
    {

            $url = isset($_GET["url"]) ? $_GET["url"]  : null;
            $url = rtrim($url, "/");
            $url = explode('/', $url);

            if(empty($url[0])){
                error_log("App::construct-> No hay controlador especificado");
                $archivocontroller = "controllers/login.php";
                require_once $archivocontroller;
                $controller = new Login();
               $controller->loadModel("login");
               $controller->render();
                return false;
            }

            $archivocontroller = "controllers/" . $url[0] . ".php";

            if(file_exists($archivocontroller)){
                    require_once $archivocontroller;
                    
                    $controller = new $url[0];
                    $controller->loadModel($url[0]);

                    if(isset($url[1])){
                            if(method_exists($controller,$url[1])){
                                    if(isset($url[2])){
                                            // numreo de parametros
                                                $nparam = count($url) - 2;
                                                //arreglo de parametros
                                                $params = [];
                                                for($i = 0; $i< $nparam;$i++){
                                                    array_push($params, $url[$i+2]);
                                                }
                                                $controller->{$url[1]}($params);

                                    }else{
                                                //no tiene parametros se manda a llamar tal cual
                                                // {} para llamar al metodo () lo interpreta para llamar a un metodo dinamico
                                                $controller->{$url[1]}();
                                    }
                            }else{
                                //error no existe el metodo
                                $controller = new Errores();
                                $controller->render();
                               
                            }
                    }else{
                            //no existe se carga el metodo por default
                            $controller->render();
                    }

            }else{  
                //no existe el archivo
                $controller = new Errores();
                $controller->render();
            }
    }
}

?>