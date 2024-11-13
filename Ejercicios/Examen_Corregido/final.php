<?php
session_start();

if (!isset($_GET['confirmar'])) {
    echo "<h2>No se ha seleccionado ninguna acción</h2>";
    exit;
}

$confirmar = $_GET['confirmar'];
if ($confirmar == 'true') {
    echo "<h2>Reserva confirmada</h2>";
} else {
    echo "<h2>Reserva cancelada</h2>";
}
?>