<?php
session_start();

$peliculas = [
    [
        "titulo" => "Interstellar",
        "horarios" => ["10:00", "14:00", "18:00"]
    ],
    [
        "titulo" => "Cars",
        "horarios" => ["11:00", "15:00", "19:00"]
    ],
    [
        "titulo" => "Titanic",
        "horarios" => ["12:00", "16:00", "20:00"]
    ]
];

if (isset($_GET['pelicula'])) {
    $pelicula_seleccionada = $_GET['pelicula'];

    $horarios = null;
    foreach ($peliculas as $pelicula) {
        if ($pelicula['titulo'] === $pelicula_seleccionada) {
            $horarios = $pelicula['horarios'];
            break;
        }
    }

    $_SESSION['pelicula'] = $pelicula_seleccionada;
} else {
    echo "No se ha seleccionado ninguna película.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cine Particular - <?php echo htmlspecialchars($pelicula_seleccionada); ?></title>
</head>

<body>
    <h1>Selecciona un horario para <?php echo htmlspecialchars($pelicula_seleccionada); ?></h1>
    <h2>Horarios disponibles:</h2>
    <form action="seleccion_asientos.php" method="POST">
        <?php foreach ($horarios as $horario): ?>
            <label>
                <input type="radio" name="horario" value="<?php echo htmlspecialchars($horario); ?>" required>
                <?php echo htmlspecialchars($horario); ?>
            </label><br>
        <?php endforeach; ?>
        <button type="submit">Continuar</button>
    </form>
</body>

</html>