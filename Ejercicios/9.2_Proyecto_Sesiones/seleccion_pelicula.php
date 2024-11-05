<?php
session_start();
$_SESSION['tiempo_inicio'] = time();

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


if (isset($_GET['pelicula'])) { //Comprobar si le ha llegado la pelicula
    $pelicula_seleccionada = $_GET['pelicula'];
    $horarios = null;

    foreach ($peliculas as $pelicula) {
        if ($pelicula['titulo'] === $pelicula_seleccionada) {
            $horarios = $pelicula['horarios'];  //Se guarda en la variable horarios los horarios se la pelicula seleccionada
            break;
        }
    }

    $_SESSION['pelicula'] = $pelicula_seleccionada; //Guardar en la sesion la pelicula seleccionada
} else {
    echo "No se ha seleccionado ninguna película.";
    exit;
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cine Byte - <?php echo $pelicula_seleccionada; ?></title>
</head>

<body>
    <h1>Selecciona un horario para <?php echo $pelicula_seleccionada; ?></h1>
    <h2>Horarios disponibles:</h2>
    <form action="seleccion_asientos.php" method="POST">
        <?php foreach ($horarios as $horario): ?> <!--Imprimir en el html cada horario para la pelicula seleccionada-->
            <label>
                <input type="radio" name="horario" value="<?php echo $horario; ?>" required>
                <!--Crea un input radio para cada horario-->
                <?php echo $horario; ?>
                <!--Imprime el horario junto al input-->
            </label><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Continuar</button>
    </form>
</body>

</html>