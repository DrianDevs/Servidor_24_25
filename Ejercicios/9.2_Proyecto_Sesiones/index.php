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


?>
<!DOCTYPE html>
<html>

<head>
    <title>Cine Byte</title>
</head>

<body>
    <h1>Bienvenido al Cine Byte</h1>
    <h2>Seleccione una película:</h2>
    <ul>
        <?php foreach ($peliculas as $pelicula) { ?>
            <li>
                <a href="seleccion_pelicula.php?pelicula=<?php echo $pelicula["titulo"]; ?>">
                    <?php echo $pelicula["titulo"]; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>

</html>