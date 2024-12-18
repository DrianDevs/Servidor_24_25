<?php
session_start();

$cerrar_sesion = isset($_GET['cerrar_sesion']) ? $_GET['cerrar_sesion'] : null;

if ($cerrar_sesion) {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['usuario'])) {
    die("Usuario no encontrada.");
} else {
    $usuario = $_SESSION['usuario'];
}

echo "<h1>Bienvenido, " . $usuario . "</h1>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="clases.php">Seleccionar una clase</a>
    <br>
    <a href="main.php?cerrar_sesion=true">Cerrar sesión</a>
</body>

</html>