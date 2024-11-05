<?php
session_start();
$_SESSION['tiempo_inicio'] = time();

// Comprobar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $asientosSeleccionados = $_POST['asientos'];
    $_SESSION['asientos'] = $_POST['asientos']; //Guardamos los asientos en la sesion

    // Suponiendo un precio por asiento
    $precioPorAsiento = 7;
    $total = count($asientosSeleccionados) * $precioPorAsiento; // Total a pagar
} else {
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen de Pago</title>
</head>

<body>
    <h1>Resumen de la Compra</h1>
    <p><strong>Película:</strong> <?php echo $_SESSION['pelicula']; ?></p>
    <p><strong>Horario:</strong> <?php echo $_SESSION['horario']; ?></p>
    <p><strong>Asientos seleccionados:</strong></p>
    <ul>
        <?php foreach ($asientosSeleccionados as $asiento): ?>
            <?php

            $partes = explode('-', $asiento);
            $fila = intval($partes[0]) + 1;
            $columna = intval($partes[1]) + 1;
            ?>
            <li>Asiento <?php echo $columna . ' de la fila ' . $fila; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total a pagar:</strong> €<?php echo $total; ?></p>
    <button onclick="location.href='realizar_pago.php'">Continuar al Pago</button>
</body>

</html>