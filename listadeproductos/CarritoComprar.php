<?php


function CarritoComprar($id){
$db = new Database();
$con = $db->conectar("usuarios"); 


$sql = "SELECT * FROM articulos WHERE id = $id";
$resultado = mysqli_query($con, $sql);
$producto = mysqli_fetch_assoc($resultado);

// Insertar los datos del producto en la otra tabla
$sql = "INSERT INTO carrito (id, NombreArticulo, Descripcion, Precio) VALUES (" . $id . ", '" . $producto['NombreArticulo'] . "', " . $producto['Descripcion'] . ", '" . $producto['Precio'] . "')";
mysqli_query($conexion, $sql);
}
?>
