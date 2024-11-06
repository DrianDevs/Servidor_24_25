<?php
session_start();

// Incluir funciones.php para usar las funciones
include('funciones.php');

// Obtener los parámetros de película y sesión
$pelicula_id = isset($_GET['pelicula_id']) ? $_GET['pelicula_id'] : null;
$sesion_id = isset($_GET['sesion_id']) ? $_GET['sesion_id'] : null;


// Comprobamos si los datos de la sesión son válidos
if (!$pelicula_id || !$sesion_id || !isset($_SESSION['asientos_sesion'])) {
    die("No se ha seleccionado una película, sesión o asientos.");
}

// Obtener los asientos seleccionados desde la sesión
$asientos_sesion = $_SESSION['asientos_sesion'];

// Precio por asiento (puedes modificarlo según tus necesidades)
$precio_asiento = 5; // 5 €
$total = count($asientos_sesion) * $precio_asiento;

// Si el usuario realiza el pago
if (isset($_GET['pagar'])) {
    // Cambiar el SID (esto simula la realización del pago)
    session_regenerate_id(true); // Regenera el ID de sesión para simular un pago completado

    // Limpiar los asientos de la sesión (ya no se podrán volver a usar)
    unset($_SESSION['asientos_sesion']);

    // Crear el archivo de entrada .txt
    $entradas = "Entradas para la película:\n";
    $entradas .= "Película: " . obtenerNombrePelicula($pelicula_id) . "\n";
    $entradas .= "Sesión: " . obtenerSesionPorId($sesion_id) . "\n";
    $entradas .= "Asientos seleccionados: " . implode(", ", $asientos_sesion) . "\n";
    $entradas .= "Total: " . $total . " €\n";
    $entradas .= "Gracias por tu compra.";

    // Crear un archivo .txt con la entrada
    $filename = "entradas_" . session_id() . ".txt";
    file_put_contents($filename, $entradas);

    // Descargar el archivo .txt
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);

    // Borrar el archivo temporal después de la descarga
    unlink($filename);

    exit;
}

// Función para convertir los asientos "0-indexed" a "1-indexed" (más fácil de entender para el usuario)
function convertirAsiento($asiento)
{
    list($fila, $columna) = explode('-', $asiento);
    return "Fila " . ($fila + 1) . ", Asiento " . ($columna + 1);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra</title>
</head>

<body>
    <h1>Resumen de la Compra</h1>

    <h2>Película seleccionada: <?php echo obtenerNombrePelicula($pelicula_id); ?></h2>
    <h3>Sesión: <?php echo obtenerSesionPorId($sesion_id); ?></h3>

    <h3>Asientos seleccionados:</h3>
    <ul>
        <?php foreach ($asientos_sesion as $asiento): ?>
            <li><?php echo convertirAsiento($asiento); ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Total: <?php echo $total; ?> €</h3>

    <p>Para completar la compra, por favor haz clic en "Pagar".</p>

    <a href="pago.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion_id; ?>&pagar=true">Pagar</a>

    <br><br>

    <a href="seleccion_asientos.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion_id; ?>">
        Volver a la selección de asientos
    </a>


    <p><strong>Nota:</strong> Si no realizas el pago en 1 minuto, los asientos seleccionados se liberarán
        automáticamente.</p>

</body>

</html>