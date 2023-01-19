<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertar</title>
</head>
<body>

<form  action="insertar.php" method="post" enctype="multipart/form-data">
    <input type="text" name="texto" id="texto">
    <input type="submit" value="Añadir Pendiente">
</form>

<div id="todoList">
    <?php
      $servidor = "localhost";
      $nombreusuario = "root";
      $password = "";
      $db = "todoListDB";
  
      $conexion = new mysqli($servidor,$nombreusuario,$password,$db);
  
      if($conexion->connect_error){
          die("conexion fallida: " . $conexion->connect_error);
      }

      if(isset($_POST["texto"])){
        $texto = $_POST["texto"];
        $sql = "INSERT INTO todoTable(texto,completado) VALUES('$texto',false)";
        if($conexion->query($sql)===true){

           // echo '<div><form action=""><input type="checkbox">'. $texto .'</form></div>';
        }
        else{
            die("Error al insertar datos: " . $conexion->error);
        }  
      }else if(isset($_POST["completar"])) {
            $id = $_POST["completar"];
            $sql = "UPDATE todoTable SET completado =  1 WHERE id = $id";

            if($conexion->query($sql)===true){

                // echo '<div><form action=""><input type="checkbox">'. $texto .'</form></div>';
             }
             else{
                 die("Error al actualizar datos: " . $conexion->error);
             }  

      }else if(isset($_POST["eliminar"])){
        $id = $_POST["eliminar"];
        $sql = "DELETE FROM todoTable WHERE id = $id";

        if($conexion->query($sql)===true){

            // echo '<div><form action=""><input type="checkbox">'. $texto .'</form></div>';
         }
         else{
             die("Error al actualizar datos: " . $conexion->error);
         }  
      }

      $sql = "SELECT * FROM todotable where completado = 0";
      $resultado = $conexion->query($sql);

      if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                ?>
                   <div>
                        <form method="POST" id="form<?php echo $row['id']?>" action="">
                             <input name="completar" value="<?php echo $row['id']?>" id="<?php echo $row['id']?>" type="checkbox" onchange="completarPendiente(this)"><?php echo $row['texto']?>
                        </form>
                        <form method="POST" id="form_eliminar_<?php echo $row['id']?>" action="">
                        <input type="hidden" name="eliminar" value="<?php echo $row['id']?>"/>
                            <input type="submit" value="Borrar">
                        </form>
                 </div>
                <?php
             
            }
      }

      $conexion->close();

    ?>
</div>

<script>

    function completarPendiente(e){
         var id = "form" + e.id;
         var formulario = document.getElementById(id);
         formulario.submit();
    }
</script>
    
</body>
</html>