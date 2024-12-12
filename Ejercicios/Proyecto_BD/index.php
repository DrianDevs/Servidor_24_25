<?php
include_once('conexion.php');
include_once('consultar.php');

if (isset($_POST['nombre']) || isset($_POST['descripcion']) || isset($_POST['precio']) || isset($_POST['stock']) || isset($_POST['categoria'])) {
    include_once('insertar.php');
    exit;
}

if (isset($_POST['id']) || isset($_POST['precio_nuevo'])) {
    include_once('actualizar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Insertar producto</h2>
    <form method="post">
        Nombre: <input type="text" name="nombre"><br>
        Descripción: <input type="text" name="descripcion"><br>
        Precio: <input type="number" step="0.01" name="precio"><br>
        Stock: <input type="number" name="stock"><br>
        Categoría: <input type="text" name="categoria"><br>
        <button type="submit">Insertar Producto</button>
    </form>

    <h2>Actualizar precio por ID producto</h2>
    <form method="post">
        ID: <input type="number" name="id" required><br>
        Precio: <input type="text" name="precio_nuevo" required><br>
        <button type="submit">Insertar Producto</button>
    </form>
</body>

</html>