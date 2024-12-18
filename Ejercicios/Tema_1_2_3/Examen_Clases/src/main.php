<?php
require_once("../autoload.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    die("Usuario no encontrada.");
} else {
    $usuario = $_SESSION['usuario']->getUsuario();
}

echo "<h1>Bienvenido, " . $usuario . "</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <a href="clases.php">Seleccionar una clase</a>
    <br>
    <a href="cerrar_sesion.php?cerrar_sesion=true">Cerrar sesión</a>
</body>

</html>