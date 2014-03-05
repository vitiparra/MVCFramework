Categor&iacute;as (cargadas por Ajax)
<br/>
<?php if(count($params) == 0): ?>
<div id="categoriasVacia">No hay categor&iacute;as</div>
<?php else: ?>
<div id="listaCategorias">
<?php foreach($params as $key => $val): ?>
    <div class="categoria"><?php echo $val["id"]; ?> - <?php echo $val["nombre"]; ?></div>
<?php endforeach; ?>
</div>
<?php endif; ?>
