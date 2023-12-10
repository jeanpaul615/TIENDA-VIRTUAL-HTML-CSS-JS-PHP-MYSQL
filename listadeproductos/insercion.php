<?php
include("config.php");
$db = new Database();

// Verificar si se han enviado datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST["id"];
    $nombreArticulo = $_POST["NombreArticulo"];
    $descripcion = $_POST["Descripcion"];
    $precio = $_POST["Precio"];

    // Preparar la consulta SQL para la inserción
    $sql = $db->conectar()->prepare("INSERT INTO articulos (id, NombreArticulo, Descripcion, Precio) VALUES (:id,:NombreArticulo,:Descripcion,:Precio)");

    // Ejecutar la consulta con los valores proporcionados
    $sql->execute([$id, $nombreArticulo, $descripcion, $precio]);

    // Redireccionar a la página principal después de la inserción
    header("Location: index.php");
    exit();
}
?>
