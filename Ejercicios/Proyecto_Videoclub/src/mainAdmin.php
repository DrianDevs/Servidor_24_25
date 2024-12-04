<?php
session_start();
require_once("ini.php");


if (!isset($_SESSION['usuario'])) { //Si se ha llegado sin iniciar sesión, redirigir a index
    header('Location: index.php');
    exit;
} else {
    echo "<h1>Hola, " . $_SESSION['usuario'] . "</h1>";
    echo '<br><a href="../cerrar_sesion.php">Cerrar sesión</a>';

    $_SESSION['videoclub'] = $vc;   //Se inicializan los datos del videoclub de ini.php

    echo "<h3>Listado de clientes</h3>";
    $_SESSION['videoclub']->listarSocios();

    echo "<h3>Listado de soportes</h3>";
    $_SESSION['videoclub']->listarProductos();
}
?>