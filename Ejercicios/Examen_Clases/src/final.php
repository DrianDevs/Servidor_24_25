<?php
require_once("../autoload.php");
session_start();

if (!isset($_SESSION['peticion'])) {
    echo "Error: Debe rellenar los datos de la petición.";
    exit;
} else {
    if ($_SESSION['peticion']->getAccion() == 'realizar') {
        $_SESSION['horarios']->reservar_plaza($_SESSION['peticion']->getClase(), $_SESSION['peticion']->getDia());
    } else if ($_SESSION['peticion']->getAccion() == 'anular') {
        $_SESSION['horarios']->liberar_plaza($_SESSION['peticion']->getClase(), $_SESSION['peticion']->getDia());
    }
}

$ticket = "Gimnasio Iron Forge:\n";
$ticket .= "Clase: " . $_SESSION['peticion']->getClase() . "\n";
$ticket .= "Horario: " . $_SESSION['peticion']->getDia() . " " . $_SESSION['horarios']->getHorarios()[$_SESSION['peticion']->getClase()][$_SESSION['peticion']->getDia()]['hora'] . "\n";
$ticket .= "Acción: " . $_SESSION['peticion']->getAccion() . " reserva" . "\n";

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="ticket.txt"');
echo $ticket;
exit();

?>