<?php
//Array de peliculas
$peliculas = [
    ['id' => 1, 'nombre' => 'Interestelar'],
    ['id' => 2, 'nombre' => 'Cars'],
    ['id' => 3, 'nombre' => 'Titanic']
];

// Si se ha seleccionado una película, redirigimos a la página de selección de sesiones de la película
if (isset($_GET['pelicula_id'])) {
    header("Location: seleccion_pelicula.php?pelicula_id=" . $_GET['pelicula_id']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cine - Selección de Películas</title>
</head>

<body>
    <h1>Bienvenidos al Cine</h1>
    <h2>Películas disponibles</h2>

    <?php foreach ($peliculas as $pelicula): ?>
        <a href="index.php?pelicula_id=<?php echo $pelicula['id']; ?>"><?php echo $pelicula['nombre']; ?></a>
        <br>
    <?php endforeach; ?>
</body>

</html>