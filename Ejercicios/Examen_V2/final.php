<?php
session_start();
include('horario.php');

if (!isset($_SESSION['accion'])) {
    echo "Acción no reconocida";
    exit;
} else {
    if ($_SESSION['accion'] == 'realizar') {
        reservar_plaza($_SESSION['clase'], $_SESSION['horario']);
    } else if ($_SESSION['accion'] == 'anular') {
        liberar_plaza($_SESSION['clase'], $_SESSION['horario']);
    }
}

$ticket = "Gimnasio Iron Forge:\n";


$horario_ticket = $_SESSION['horario'];

$ticket = "Gimnasio Iron Forge:\n";
$ticket .= "Clase: " . $_SESSION['clase'] . "\n";
$ticket .= "Horario: " . $_SESSION['horario'] . " " . $_SESSION['horarios_clases'][$_SESSION['clase']][$_SESSION['horario']]['hora'] . "\n";
$ticket .= "Acción: " . $_SESSION['accion'] . " reserva" . "\n";

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="ticket.txt"');
echo $ticket;
exit();

?>