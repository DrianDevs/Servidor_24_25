<?php
session_start();

// Establecer un tiempo de inicio especifico para la página de pago
if (!isset($_SESSION['tiempo_inicio_pago'])) {
    $_SESSION['tiempo_inicio_pago'] = time();
}

$tiempo_transcurrido_pago = time() - $_SESSION['tiempo_inicio_pago'];

if ($tiempo_transcurrido_pago > 62) {
    unset($_SESSION['asientos']);
    unset($_SESSION['tiempo_inicio_pago']);
    header("Location: index.php");
    exit;
}

// Función para leer asientos ocupados desde el archivo JSON
function leerAsientosOcupados()
{
    $contenido = file_get_contents('asientos_ocupados.json');
    return json_decode($contenido, true) ?? [];
}

// Función para actualizar el archivo JSON con los asientos ocupados
function actualizarAsientosOcupados($pelicula, $sesion, $asientos)
{
    $ocupados = leerAsientosOcupados();

    // Inicializar el arreglo si no existe la película o sesión
    if (!isset($ocupados[$pelicula])) {
        $ocupados[$pelicula] = [];
    }
    if (!isset($ocupados[$pelicula][$sesion])) {
        $ocupados[$pelicula][$sesion] = [];
    }

    // Añadir los asientos nuevos a los ocupados
    $ocupados[$pelicula][$sesion] = array_unique(array_merge($ocupados[$pelicula][$sesion], $asientos));

    // Guardar el archivo actualizado
    file_put_contents('asientos_ocupados.json', json_encode($ocupados));
}

// Comprobar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $asientosSeleccionados = $_POST['asientos'];
    $_SESSION['asientos'] = $_POST['asientos']; // Guardamos los asientos en la sesión

    // Suponiendo un precio por asiento
    $precioPorAsiento = 7;
    $total = count($asientosSeleccionados) * $precioPorAsiento; // Total a pagar

    // Llamar a la función para actualizar asientos ocupados
    if (isset($_SESSION['pelicula']) && isset($_SESSION['horario'])) {
        $pelicula = $_SESSION['pelicula'];
        $horario = $_SESSION['horario'];
        actualizarAsientosOcupados($pelicula, $horario, $asientosSeleccionados);
    }
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
    <button href='#'>Continuar al Pago</button>
</body>

</html>