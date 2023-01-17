<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arreglos</title>
</head>
<body>
    
<?php
  echo "arreglos";
  echo "<br>";
  $valores = array("diego","penelope","aea");

  echo "<pre>";
  print_r($valores);
  echo "</pre>"; 
  echo "<br>";
  echo var_dump($valores);
  echo "<br>";

  for($i = 0;$i<count($valores);$i++){
   echo $valores[$i] ."<br>";
  }

  $edades = array("Diego"=>25,"Penelope"=>21,"Nilou"=>20);

  print_r($edades);
  echo "<br>";
  echo $edades["Diego"];
  echo "<br>";

  foreach($edades as $key => $value){
      echo $key . "<br>";
      echo $value . "<br>";
  }

?>
  


</body>
</html>