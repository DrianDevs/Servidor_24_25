<?php
require_once("../autoload.php");
session_start();


if (!isset($_POST['nombre']) || !isset($_POST['maxalquiler']) || !isset($_POST['usuario']) || !isset($_POST['password']) || !isset($_POST['numero'])) {
    header('Location: index.php');
    exit;
} else {
    //Falta metodo actualizar socios
    //$_SESSION['videoclub']->incluirSocio($_POST['nombre'], $_POST['maxalquiler'], $_POST['usuario'], $_POST['password']);
}

echo "<h2>Cliente insertado con éxito</h2>";
echo '<br><br><a href="mainAdmin.php">Volver al panel de administrador</a>';