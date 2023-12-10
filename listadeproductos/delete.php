<?php
include("config.php");
$db = new Database();

// Verificar si se han enviado datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre del artículo del formulario
    $nombreArticulo = $_POST["NombreArticulo"];

    // Preparar la consulta SQL para obtener el ID del artículo por su nombre
    $sqlSelect = $db->conectar()->prepare("SELECT id FROM articulos WHERE NombreArticulo = :NombreArticulo");

    // Ejecutar la consulta con el nombre del artículo proporcionado
    $sqlSelect->execute([':NombreArticulo' => $nombreArticulo]);

    // Obtener el ID del resultado de la consulta
    $result = $sqlSelect->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];

    if ($id) {
        // Si se encontró el ID, proceder con la eliminación
        // Preparar la consulta SQL para la eliminación
        $sqlDelete = $db->conectar()->prepare("DELETE FROM articulos WHERE id = :id");

        // Ejecutar la consulta con el ID obtenido
        $sqlDelete->execute([':id' => $id]);

        // Redireccionar a la página principal después de la eliminación
        header("Location: index.php");
        exit();
    } else {
        // Manejar el caso en el que no se encontró el artículo por el nombre
        echo "No se encontró el artículo con el nombre proporcionado.";
    }
}
?>
