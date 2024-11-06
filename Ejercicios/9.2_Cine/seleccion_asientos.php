<?php
session_start();

// Incluir funciones.php para usar las funciones
include('funciones.php');

// Obtener los parámetros de película y sesión
$pelicula_id = isset($_GET['pelicula_id']) ? $_GET['pelicula_id'] : null;
$sesion_id = isset($_GET['sesion_id']) ? $_GET['sesion_id'] : null;
$asiento = isset($_GET['asiento']) ? $_GET['asiento'] : null; // Asiento seleccionado al pulsar sobre el botón de libre
$liberar_asientos = isset($_GET['liberar_asientos']) ? $_GET['liberar_asientos'] : null;    // Booleano para comprobar si se deben liberar asientos
$asientos_sesion = isset($_SESSION['asientos_sesion']) ? $_SESSION['asientos_sesion'] : []; // Array de asientos seleccionados


if ($liberar_asientos) {
    liberarAsientos($sesion_id, $asientos_sesion);
    unset($_SESSION['asientos_sesion']);
    header('Location: seleccion_pelicula.php?pelicula_id=' . $pelicula_id);
    exit;
}

// Comprobamos si los datos de la sesión son válidos
if (!$pelicula_id || !$sesion_id) {
    die("No se ha seleccionado una película o sesión.");
}

// Si se ha seleccionado un asiento, lo marcamos como ocupado
if ($asiento) {
    marcarAsientoOcupado($sesion_id, $asiento);
    $asientos_sesion[] = $asiento;
    $_SESSION['asientos_sesion'] = $asientos_sesion;
}

// Definir las filas y los asientos (5x6)
$asientos = [
    [0, 0, 0, 0, 0, 0], // Fila 1
    [0, 0, 0, 0, 0, 0], // Fila 2
    [0, 0, 0, 0, 0, 0], // Fila 3
    [0, 0, 0, 0, 0, 0], // Fila 4
    [0, 0, 0, 0, 0, 0]  // Fila 5
];

// Obtener los asientos ocupados de la sesión seleccionada
$asientos_ocupados = obtenerAsientosOcupados($sesion_id);

// Mostrar los asientos en la tabla
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seleccionar Asientos</title>
</head>

<body>
    <h1>Selecciona tus asientos para la película</h1>

    <!-- Enlace para volver a la selección de película -->
    <a
        href="seleccion_asientos.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion_id; ?>&liberar_asientos=true">Volver
        a la selección de película</a>
    <br><br>

    <table border="1">
        <?php
        // Mostrar los asientos en un formato de tabla
        for ($fila = 0; $fila < 5; $fila++) {
            echo "<tr>";
            for ($columna = 0; $columna < 6; $columna++) {
                $asiento_id = "{$fila}-{$columna}";
                $ocupado = in_array($asiento_id, $asientos_ocupados);

                echo "<td>";

                if ($ocupado) {
                    echo "<button disabled style='background-color: gray;'>Ocupado</button>";
                } else {
                    echo "<a href='seleccion_asientos.php?pelicula_id=$pelicula_id&sesion_id=$sesion_id&asiento=$asiento_id'><button>Libre</button></a>";
                }

                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <br><br>
    <a href="pago.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion_id; ?>">Proceder al pago</a>

</body>

</html>