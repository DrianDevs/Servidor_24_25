<?php
session_start();
require_once("ini.php");


if (!isset($_SESSION['usuario'])) { //Si se ha llegado sin iniciar sesión, redirigir a index
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION['videoclub'] = $vc;   //Se inicializan los datos del videoclub de ini.php
    $socios = $_SESSION['videoclub']->getSocios();
    $iniciar = false;
    $cliente;

    foreach ($socios as $socio) {
        if ($socio->getUsuario() === $_SESSION['usuario']) {  //Si el usuario coincide con alguno de los clientes, se inicia la pagina
            $iniciar = true;
            $cliente = $socio;
            break;
        }
    }

    if ($iniciar) {
        echo "<h1>Hola, " . $_SESSION['usuario'] . "</h1>";
        echo '<br><a href="../cerrar_sesion.php">Cerrar sesión</a>';

        echo "<h3>Productos alquilados actualmente</h3>";
        echo "<pre>";
        print_r($cliente->getAlquileres());
        echo "</pre>";
    } else {
        header('Location: ../index.php');
        exit;
    }
}
?>