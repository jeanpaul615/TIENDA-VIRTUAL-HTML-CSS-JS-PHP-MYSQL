<?php

require_once "cors.php";

try {
    require_once "../conexion.php";

    # capturamos el id a borrar
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    # consulta para el borrado usuario
    $sql = "DELETE FROM articulos WHERE id = :id";

    $consulta = $conexion -> prepare($sql);

    $consulta ->execute (array(
        ":id" => $id
    ));    

    $respuesta = array ("status" => "ok", "message" => "Datos eliminados correctamente");
    
}
catch (PDOException $e){
    $respuesta = array ("status" => "error", "message" => "Error al eliminar los datos:  ". $e->getMessage());
}
header("Content-Type: application/json");
echo json_encode($respuesta);
?>