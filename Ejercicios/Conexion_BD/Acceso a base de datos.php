<?php
try {
    $mysql =
        "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user =
        "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password);

    $consulta = $conexion->prepare("insert into mensajes2 (nombre, email, mensaje)
values (?,?,?)");
    $nombre = 'Nombre';
    $descripcion = 'emanil@email.com';
    $precio = 'Texto mensaje PDO';
    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $descripcion);
    $consulta->bindParam(3, $precio);
    $consulta->execute();
} catch (PDOException $e) {
    // Mostramos mensaje en caso de error
    echo "<p>" . $e->getMessage() . "</p>";
    exit();
}
$conexion = null;
?>