<?php
require_once("ini.php");
session_start();


if (!isset($_SESSION['usuario'])) { //Si se ha llegado sin iniciar sesión, redirigir a index
    header('Location: index.php');
    exit;
} else {
    echo "<h1>Hola, " . $_SESSION['usuario'] . "</h1>";
    echo '<a href="formCreateCliente.php"><button>Crear cliente</button></a>';
    echo '<a href="formUpdateCliente.php"><button>Modificar cliente</button></a>';
    echo '<br><br><a href="../cerrar_sesion.php">Cerrar sesión</a>';

    if (!isset($_SESSION['videoclub'])) {
        $_SESSION['videoclub'] = $vc;   //Se inicializan los datos del videoclub de ini.php si es la primera vez
    }

    echo "<h3>Listado de clientes</h3>";
    $_SESSION['videoclub']->listarSocios();

    echo "<h3>Listado de soportes</h3>";
    $_SESSION['videoclub']->listarProductos();
}
?>