<?php
include('funciones.php');

// Verificamos que se haya pasado el ID de la película
if (!isset($_GET['pelicula_id'])) {
    die("Película no encontrada.");
}

$pelicula_id = $_GET['pelicula_id'];

// Obtenemos las sesiones de la película seleccionada
$sesiones = obtenerHorariosPorPelicula($pelicula_id);

// Si no existen sesiones para esta película, mostramos un mensaje de error
if ($sesiones === null) {
    die("No se han encontrado sesiones para esta película.");
}

// Obtenemos el nombre de la película
$pelicula_nombre = obtenerNombrePelicula($pelicula_id);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seleccionar Sesión - <?php echo $pelicula_nombre; ?></title>
</head>

<body>
    <h1>Selecciona una sesión para <?php echo $pelicula_nombre; ?></h1>

    <ul>
        <?php foreach ($sesiones as $sesion): ?>
            <li>
                <a
                    href="seleccion_asientos.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion['id_sesion']; ?>">
                    <?php echo $sesion['hora']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <br>
    <a href="index.php">Volver a la página principal</a>
</body>

</html>