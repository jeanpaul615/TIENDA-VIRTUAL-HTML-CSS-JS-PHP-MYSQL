<?php
$servidor = 'localhost';
$usuario = 'root';
$contrasena = '';
$nombre_de_base = 'usuarios';

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_de_base", $usuario, $contrasena);
    // Cambiado para devolver un JSON con éxito y la conexión
    //echo json_encode(['success' => true, 'conexion' => $conexion]);
} catch (Exception $e) {
    // Cambiado para devolver un JSON con error en lugar de un mensaje de texto
    echo json_encode(['error' => 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage()]);
    exit;
}
?>
