<?php

require_once "cors.php";
require_once "conexion.php";

$sql = "SELECT * FROM `Articulos`";

$consulta = $conexion -> query ($sql);

$datos = $consulta->fetchAll();

$json = json_encode($datos);

header("Content-Type: application/json");

echo $json;

?>