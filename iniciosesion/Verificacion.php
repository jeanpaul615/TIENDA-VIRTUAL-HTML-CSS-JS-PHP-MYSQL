<?php
include("ConexionIs.php");

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo json_encode(['error' => 'LOS CAMPOS ESTAN VACIOS']);
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = $conexion->query("SELECT * FROM usuarios WHERE NombreUsuario='$username' AND Contraseña='$password'");
        
        if ($datos = $sql->fetch(PDO::FETCH_ASSOC)) {
            // Modificado para devolver un JSON con éxito y los datos

            echo json_encode(['success' => true, 'data' => $datos]);

        } else {
            // Modificado para devolver un JSON con error en lugar de un mensaje de texto
            echo json_encode(['error' => 'Acceso Denegado']);
        }
    }
}
?>

