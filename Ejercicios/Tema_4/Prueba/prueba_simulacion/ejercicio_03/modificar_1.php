<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

$errores = [];
$nombreTorneo = $ciudad = $superficieId = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idTorneo = obtenerValorCampo('id_torneo');
    $nombreTorneo = obtenerValorCampo('nombre_torneo');
    $ciudad = obtenerValorCampo('ciudad');
    $superficieId = obtenerValorCampo('superficie_id');

    // Validar nombre del torneo
    if (!validarLongitudCadena($nombreTorneo, 3, 60)) {
        $errores[] = "El nombre del torneo debe tener entre 3 y 60 caracteres.";
    }

    // Validar ciudad
    if (!validarLongitudCadena($ciudad, 3, 60)) {
        $errores[] = "La ciudad debe tener entre 3 y 60 caracteres.";
    }

    // Validar superficie
    if (!validarEnteroRango($superficieId, 1, PHP_INT_MAX)) {
        $errores[] = "La superficie seleccionada no es válida.";
    }

    // Si no hay errores, actualizar el torneo en la base de datos
    if (empty($errores)) {
        try {
            $conexion = conectarPDO($database);

            $consulta = $conexion->prepare("UPDATE torneos SET nombre = :nombre_torneo, ciudad = :ciudad, superficie_id = :superficie_id WHERE id = :id_torneo");
            $consulta->bindParam(':nombre_torneo', $nombreTorneo, PDO::PARAM_STR);
            $consulta->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
            $consulta->bindParam(':superficie_id', $superficieId, PDO::PARAM_INT);
            $consulta->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
            $consulta->execute();

            echo "<h1>Torneo actualizado correctamente</h1>";
        } catch (PDOException $e) {
            echo "Error al actualizar el torneo: " . $e->getMessage();
        }
    }
} else {
    // Obtener el id del torneo por GET
    $idTorneo = obtenerValorCampo('id_torneo');

    // Redirigir a la página de listado si no se recibe el id o no es válido
    if (empty($idTorneo) || !validarEnteroRango($idTorneo, 1, PHP_INT_MAX)) {
        header("Location: listado.php");
        exit();
    }

    // Consulta para obtener la información del torneo por id
    try {
        $conexion = conectarPDO($database);

        $consulta = $conexion->prepare("SELECT id, nombre, ciudad, superficie_id FROM torneos WHERE id = :id_torneo");
        $consulta->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
        $consulta->execute();

        // Verificar si el torneo existe
        if ($consulta->rowCount() === 0) {
            header("Location: listado.php");
            exit();
        }

        // Obtener los datos del torneo
        $torneo = $consulta->fetch(PDO::FETCH_ASSOC);
        $nombreTorneo = $torneo['nombre'];
        $ciudad = $torneo['ciudad'];
        $superficieId = $torneo['superficie_id'];
    } catch (PDOException $e) {
        echo "Error al hacer la consulta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Torneo</title>
</head>

<body>
    <h1>Modificar Torneo</h1>
    <?php
    if (!empty($errores)) {
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>
    <form method="post" action="modificar_1.php">
        <input type="hidden" name="id_torneo" value="<?php echo htmlspecialchars($idTorneo); ?>">
        <label for="nombre_torneo">Nombre del Torneo:</label>
        <input type="text" id="nombre_torneo" name="nombre_torneo"
            value="<?php echo htmlspecialchars($nombreTorneo); ?>"><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($ciudad); ?>"><br>

        <label for="superficie_id">Superficie:</label>
        <select id="superficie_id" name="superficie_id">
            <option value="">Seleccione Superficie</option>
            <?php
            // Obtener las superficies disponibles
            try {
                $consulta = $conexion->prepare("SELECT id, nombre FROM superficies");
                $consulta->execute();
                while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($row['id'] == $superficieId) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['nombre']}</option>";
                }
            } catch (PDOException $e) {
                echo "Error al obtener las superficies: " . $e->getMessage();
            }
            ?>
        </select><br>

        <input type="submit" value="Guardar">
    </form>
    <a href="listado.php">Volver al listado de torneos</a>
</body>

</html>