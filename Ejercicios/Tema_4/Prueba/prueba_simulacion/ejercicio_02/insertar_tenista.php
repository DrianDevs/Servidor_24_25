<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

$errores = [];
$nombre = $apellidos = $altura = $mano = $anno_nacimiento = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = obtenerValorCampo('nombre');
    $apellidos = obtenerValorCampo('apellidos');
    $altura = obtenerValorCampo('altura');
    $mano = obtenerValorCampo('mano');
    $anno_nacimiento = obtenerValorCampo('anno_nacimiento');

    // Validar nombre
    if (!validarLongitudCadena($nombre, 1, 50)) {
        $errores[] = "El nombre debe tener entre 1 y 50 caracteres.";
    }

    // Validar apellidos
    if (!validarLongitudCadena($apellidos, 1, 100)) {
        $errores[] = "Los apellidos deben tener entre 1 y 100 caracteres.";
    }

    // Validar altura
    if (!validarEnteroRango($altura, 100, 250)) {
        $errores[] = "La altura debe ser un número entero entre 100 y 250.";
    }

    // Validar mano
    if (!in_array($mano, ['derecha', 'izquierda'])) {
        $errores[] = "La mano debe ser 'derecha' o 'izquierda'.";
    }

    // Validar año de nacimiento
    if (!validarEnteroRango($anno_nacimiento, 1900, date("Y"))) {
        $errores[] = "El año de nacimiento debe ser un número entero entre 1900 y el año actual.";
    }

    // Si no hay errores, insertar el tenista en la base de datos
    if (empty($errores)) {
        try {
            $conexion = conectarPDO($database);

            $consulta = $conexion->prepare("INSERT INTO tenistas (nombre, apellidos, altura, mano, anno_nacimiento) VALUES (:nombre, :apellidos, :altura, :mano, :anno_nacimiento)");
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $consulta->bindParam(':altura', $altura, PDO::PARAM_INT);
            $consulta->bindParam(':mano', $mano, PDO::PARAM_STR);
            $consulta->bindParam(':anno_nacimiento', $anno_nacimiento, PDO::PARAM_INT);
            $consulta->execute();

            echo "<h1>Tenista insertado correctamente</h1>";
        } catch (PDOException $e) {
            echo "Error al insertar el tenista: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Insertar Tenista</title>
</head>

<body>
    <h1>Insertar Tenista</h1>
    <?php
    if (!empty($errores)) {
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>
    <form method="post" action="insertar_tenista.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($apellidos); ?>"><br>

        <label for="altura">Altura (cm):</label>
        <input type="text" id="altura" name="altura" value="<?php echo htmlspecialchars($altura); ?>"><br>

        <label for="mano">Mano:</label>
        <select id="mano" name="mano">
            <option value="derecha" <?php if ($mano == 'derecha') echo 'selected'; ?>>Derecha</option>
            <option value="izquierda" <?php if ($mano == 'izquierda') echo 'selected'; ?>>Izquierda</option>
        </select><br>

        <label for="anno_nacimiento">Año de Nacimiento:</label>
        <input type="text" id="anno_nacimiento" name="anno_nacimiento" value="<?php echo htmlspecialchars($anno_nacimiento); ?>"><br>

        <input type="submit" value="Insertar">
    </form>
</body>

</html>