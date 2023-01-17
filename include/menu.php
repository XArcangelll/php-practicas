<!--required e include el include no necesariamente tiene q estar, required si sino no muestra nada -->

<div id="menu">
        <?php
            $lista = array("Inicio","Servicios","Vlog","Contacto");
            for($i=0; $i<count($lista);$i++){
                echo $lista[$i] . " ";
            }
        ?>
</div>