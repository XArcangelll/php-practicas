<?php
  require_once "controllers/error.php";
class App{

    function __construct()
    {
        echo "<p>Nueva App </p>";

        $url = $_GET["url"];
        
        $url = rtrim("$url","/");
        $url = explode("/",$url);

       // var_dump($url);

       $archivoController = "controllers/" . $url[0] . ".php";
      
        if(file_exists($archivoController)){
            require_once $archivoController;
            //es como decir q pones new Main();
            $controller = new $url[0];

                //methos_exists?
                if(isset($url[1])){
                    $controller->{$url[1]}();
                }

        }else{
            $controller = new ErrorM();
        }

     

     
      
    }
}

?>