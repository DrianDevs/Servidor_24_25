<?php
session_start();
echo "SID: " . session_id() . "<br>";
include('horario.php');

if (!isset($_SESSION['clase']) || !isset($_POST['horario']) || !isset($_POST['accion'])) {
    echo "<h2>Le faltan datos por seleccionar</h2>";
    exit;
}

$_SESSION['horario'] = $_POST['horario'];
$_SESSION['accion'] = $_POST['accion'];

echo "Clase: " . $_SESSION['clase'] . "<br>";
echo "Horario: " . $_POST['horario'] . " " . $_SESSION['horarios_clases'][$_SESSION['clase']][$_POST['horario']]['hora'] . "<br>";
echo "Acción: " . $_POST['accion'] . " reserva" . "<br>";
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