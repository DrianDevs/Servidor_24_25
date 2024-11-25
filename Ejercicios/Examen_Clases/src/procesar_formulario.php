<?php
require_once("../autoload.php");
session_start();


if (!isset($_SESSION['peticion']) || !isset($_POST['horario']) || !isset($_POST['accion'])) {
    echo "<h2>Le faltan datos por seleccionar</h2>";
    exit;
}

$_SESSION['peticion']->setDia($_POST['horario']);
$_SESSION['peticion']->setAccion($_POST['accion']);

echo "Clase: " . $_SESSION['peticion']->getClase() . "<br>";
echo "Horario: " . $_SESSION['peticion']->getDia() . " " . $_SESSION['horarios']->getHorarios()[$_SESSION['peticion']->getClase()][$_SESSION['peticion']->getDia()]['hora'] . "<br>";
echo "Acción: " . $_SESSION['peticion']->getAccion() . " reserva" . "<br>";
echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="final.php"><button>Confirmar selección</button></a>
    <a href="cerrar_sesion.php?cerrar_sesion=true"><button>Cancelar selección</button></a>
</body>

</html>