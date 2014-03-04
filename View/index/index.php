<?php
/*
    HTML should look like HTML
    Keep the PHP code in the views extremely simple: 
    - function calls
    - simple loops
    - variable substitutions 
    should be all you need
*/
?>

<?php include_once("View/header.php"); ?>
Texto de la p&aacute;gina index
<script>
    cargarBloque("catalogo", "divCatalogo");
</script>

<div id="divCatalogo"></div>

<?php 
include_once("View/footer.php");
