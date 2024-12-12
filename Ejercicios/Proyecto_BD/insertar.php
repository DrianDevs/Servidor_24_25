<?php
try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password, $opciones);

    $consulta = $conexion->prepare("insert into productos (nombre, descripcion, precio, stock, categoria) values (?,?,?,?,?)");

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];

    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $descripcion);
    $consulta->bindParam(3, $precio);
    $consulta->bindParam(4, $stock);
    $consulta->bindParam(5, $categoria);
    $consulta->execute();
} catch (PDOException $e) {
    echo "<p>" . $e->getMessage() . "</p>";
    exit();
}
$conexion = null;
?>