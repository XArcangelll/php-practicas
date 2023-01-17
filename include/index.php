<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include y Require</title>
    <style>
        #container{width: 500px;margin: 150px auto;}
        #footer{background-color: #222; padding: 10px; color: white;}
        #menu{background-color: #eee;padding: 10px;}
    </style>
</head>
<body>  
    <div id="container">
        <?php
        include("menu.php");
        ?>
        <h3>Contenido Principal</h3>
        <?php
        include("footer.php");
        ?>
    </div>


</body>
</html>