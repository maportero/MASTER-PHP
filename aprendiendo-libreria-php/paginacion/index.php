<?php
require "../vendor/autoload.php";

$conexion = new mysqli("localhost","root","","notas_master");
$conexion->query("SET NAMES 'uft8'");
$consulta = $conexion->query("SELECT * FROM notas;");
$numero_registros=$consulta->num_rows;
$elementos_por_pagina=2;

$pagination = new Zebra_Pagination();
$pagination->records($numero_registros);

$pagination->records_per_page($elementos_por_pagina);
$page=$pagination->get_page();
$empieza_aqui = (($page - 1) * $elementos_por_pagina);

$notas= $conexion->query("SELECT * FROM notas LIMIT  $empieza_aqui,$elementos_por_pagina;");
echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';
while ($nota=$notas->fetch_object()) {
    
    echo '<h1>' . $nota->titulo . '</h1></br>';
    
}
        
$pagination->render();