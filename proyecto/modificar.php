<?php

require_once "cors.php";

try {
    require_once "../conexion.php";

    # capturamos datos a agregar
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $NombreArticulo = filter_input(INPUT_POST, 'NombreArticulo', FILTER_SANITIZE_STRING);
    $Cantidad = filter_input(INPUT_POST, 'Cantidad', FILTER_SANITIZE_STRING);
    $Precio = filter_input(INPUT_POST, 'Precio', FILTER_SANITIZE_STRING);
    
    # Validación adicional si es necesario
    if (empty($NombreArticulo) || empty($Cantidad) || empty($Precio) || empty($estado)) {
        throw new Exception("Todos los campos son obligatorios");
    }

    # consulta para el borrado NombreArticulo
    $sql = "UPDATE users 
            SET 
                NombreArticulo= :NombreArticulo, 
                Cantidad = :Cantidad, 
                Precio = :Precio
            WHERE id = :id";

    $consulta = $conexion -> prepare($sql);

    $consulta ->execute (array(
        ":id" => $id,
        ":NombreArticulo" => $NombreArticulo,
        ":Cantidad" => $Cantidad,
        ":Precio" => $Precio
    ));

    $respuesta = array ("status" => "ok", "message" => "Datos Modificados correctamente");
}
catch (PDOException $e){
    $respuesta = array ("status" => "error", "message" => "Error al Modificar los datos:  ". $e->getMessage());
}

header("Content-Type: application/json");

echo json_encode($respuesta);
?>