<?php
session_start();

// Comprobar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos de la sesión y del formulario
    $pelicula = $_POST['pelicula'];
    $horario = $_POST['horario'];
    $asientosSeleccionados = $_POST['asientos']; // Asientos seleccionados

    // Suponiendo un precio por asiento
    $precioPorAsiento = 10; // Puedes cambiar este valor según lo que desees
    $total = count($asientosSeleccionados) * $precioPorAsiento; // Total a pagar

} else {
    echo "No se han enviado datos válidos.";
    exit; // Termina el script si no hay datos
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
    <p><strong>Película:</strong> <?php echo htmlspecialchars($pelicula); ?></p>
    <p><strong>Horario:</strong> <?php echo htmlspecialchars($horario); ?></p>
    <p><strong>Asientos seleccionados:</strong></p>
    <ul>
        <?php foreach ($asientosSeleccionados as $asiento): ?>
            <?php
            // Aquí puedes usar explode para dividir fila y columna
            $partes = explode('-', $asiento);
            $fila = intval($partes[0]) + 1; // +1 para mostrar como 1, 2, 3...
            $columna = intval($partes[1]) + 1; // +1 para mostrar como 1, 2, 3...
            ?>
            <li>Asiento <?php echo $columna . ' de la fila ' . $fila; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total a pagar:</strong> €<?php echo $total; ?></p>
    <button onclick="location.href='realizar_pago.php'">Continuar al Pago</button>
</body>

</html>