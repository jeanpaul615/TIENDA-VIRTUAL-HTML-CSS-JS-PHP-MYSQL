<!DOCTYPE html>
<html lang="en">
<?php
include ("enlace.php");
$db = new Database();

$con = $db->conectar();
$sql = $con->prepare("SELECT id,NombreArticulo,Precio FROM carrito");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Carrito de Compras</title>
</head>
<body>
<header>
        <div class="title-container">
        <h1>Carrito de Compras</h1>
        <a href="../listadeproductos/index.php">
        <button class="regresar">Regresar</button>
        </a>
        </div>

</header>
<div class="container">
    <?php 
    foreach ($resultado as $row): ?>
        <div class="producto">
            <?php
            $id = $row['id'];
            $imagen = "images/productos/". $id ."/imagen.webp";
            if(!file_exists($imagen)){
                $imagen = "images/no-photo.webp";
            }
            ?>
            <img src="<?php echo $imagen;?>" 
            alt="<?php echo $row['NombreArticulo'] ?>">
            <div class="informacion">
                <p><?php echo $row['NombreArticulo'] ?></p>
                <p class="precio">$<?php echo $row['Precio'] ?><span>.00</span></p>
                <button>eliminar</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<footer>
    <p>Total:</p>
    <button class="finalizarcompra">Finalizar compra</button>
</footer>
</body>
</html>
