<?php
session_start();
include('horario.php');

$clases = obtenerClases();
$horarios = obtenerHorarios();

if (isset($_POST['horario'])) {
    $_SESSION['horario'] = $_POST['horario'];
}

if (isset($_GET['confirmar'])) {
    $clase_ticket = $_SESSION['clase'];
    $horario_ticket = $_SESSION['horario'];

    $ticket = "Reserva Gimnasio Iron Forge:\n";
    $ticket .= "Clase: " . $clase_ticket . "\n";
    $ticket .= "Horario: " . $horario_ticket . "\n";
    $ticket .= "Gracias por tu reserva.";

    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="ticket.txt"');
    echo $ticket;
    exit();
}

if (isset($_GET['eliminar'])) {
    session_destroy();
    unset($_SESSION['clase']);
    header('Location: index.php');
    exit;
}


if (isset($_SESSION['clase'])) {
    $clase = $_SESSION['clase'];
    echo "<h2>Has seleccionado la clase de " . $clase . "</h2>";
} else {
    echo "<h2>Le faltan datos por seleccionar</h2>";
    exit;
}

if (isset($_POST['horario'])) {
    $horario = $_POST['horario'];
    echo "<h2>Fecha y hora: " . $horarios[$clase][$horario + 1]['dia'] . " " . $horarios[$clase][$horario + 1]['hora'] . "</h2>";
} else {
    echo "<h2>Le faltan datos por seleccionar</h2>";
    exit;
}

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    if ($accion == "anular") {
        echo "<h2>Se va a proceder a anular su reserva</h2>";
    } else {
        echo "<h2>Se va a realizar una reserva</h2>";
    }
} else {
    echo "<h2>Le faltan datos por seleccionar</h2>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="procesar_formulario.php?confirmar=true"><button>Confirmar</button></a>
    <a href="procesar_formulario.php?eliminar=true"><button>Eliminar selección</button></a>
</body>

</html>