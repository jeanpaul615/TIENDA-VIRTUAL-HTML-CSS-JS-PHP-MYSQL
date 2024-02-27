<?php
// Obtener el ID del producto enviado desde JavaScript
$id_elemento = $_POST['id'];

// Llamar a la función CarritoComprar con el ID del producto
CarritoComprar($id_elemento);

function CarritoComprar($id_elemento){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuarios";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Realizar una consulta INSERT para agregar el elemento a la tabla 'carrito'
    $sql_insert = "INSERT INTO carrito (id, NombreArticulo, Descripcion, Precio)
                   SELECT id, NombreArticulo, Descripcion, Precio
                   FROM articulos
                   WHERE id = $id_elemento";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Elemento agregado al carrito correctamente.";
        header('Location: index.php');
    } else {
        echo "Error al agregar el elemento al carrito: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
