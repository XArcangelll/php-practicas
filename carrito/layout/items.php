<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <div class="imagen"><img src="img/<?php echo $item['imagen'];  ?>" /></div>
    <div class="titulo"><?php echo $item['nombre'];  ?></div>
    <div class="precio">S/.<?php echo $item['precio'];  ?> Soles</div>
    <div class="botones">
        <button class='btn-add'>Agregar al carrito</button>
    </div>
</div>