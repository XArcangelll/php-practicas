
<?php
 include_once "apipeliculas.php";

header('Access-Control-Allow-Origin: *');
    $api = new APIPeliculas();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error("parámetro");
        }
    }else{
        $api->getAll();
    }
    
?>


