<?php
// Incluir ficheros de configuración y funciones
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");

// Establecer conexión a la base de datos
$conn = conectarPDO($database);

// Validar si se ha recibido el id del torneo por GET
$idTorneo = obtenerValorCampo('id_torneo');

// Redirigir si no se recibe el id o no es válido
if (empty($idTorneo) || !validarEnteroRango($idTorneo, 1, PHP_INT_MAX)) {
    header("Location: listado.php");
    exit();
}

// Consultar la información del torneo
$sql = "SELECT t.id, t.nombre AS nombre_torneo, t.ciudad, t.superficie_id
        FROM torneos t
        WHERE t.id = :id_torneo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
$stmt->execute();

// Redirigir si el torneo no existe
if ($stmt->rowCount() === 0) {
    header("Location: listado.php");
    exit();
}

$torneo = $stmt->fetch(PDO::FETCH_ASSOC);

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreTorneo = obtenerValorCampo('nombre_torneo');
    $ciudad = obtenerValorCampo('ciudad');
    $superficieId = obtenerValorCampo('superficie_id');

    // Validar los datos
    $errores = [];

    if (!validarLongitudCadena($nombreTorneo, 3, 60)) {
        $errores['nombre_torneo'] = 'El nombre del torneo debe tener entre 3 y 60 caracteres.';
    }

    if (!validarLongitudCadena($ciudad, 3, 60)) {
        $errores['ciudad'] = 'La ciudad debe tener entre 3 y 60 caracteres.';
    }

    // Validar la existencia de la superficie
    $sql = "SELECT id FROM superficies WHERE id = :superficie_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':superficie_id', $superficieId, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        $errores['superficie_id'] = 'La superficie seleccionada no es válida.';
    }

    // Verificar nombres duplicados
    $sql = "SELECT id FROM torneos WHERE nombre = :nombre_torneo AND id != :id_torneo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre_torneo', $nombreTorneo, PDO::PARAM_STR);
    $stmt->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $errores['nombre_torneo'] = 'Ya existe un torneo con este nombre.';
    }

    // Actualizar el torneo si no hay errores
    if (empty($errores)) {
        $sql = "UPDATE torneos SET nombre = :nombre_torneo, ciudad = :ciudad, superficie_id = :superficie_id WHERE id = :id_torneo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_torneo', $nombreTorneo, PDO::PARAM_STR);
        $stmt->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
        $stmt->bindParam(':superficie_id', $superficieId, PDO::PARAM_INT);
        $stmt->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
        $stmt->execute();

        // Redirigir al listado
        header("Location: listado.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Torneo</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Modificar Torneo</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id_torneo=' . $torneo['id']; ?>" method="post">
        <input type="hidden" name="id_torneo" value="<?php echo htmlspecialchars($torneo['id']); ?>">
        <label>Nombre del Torneo:</label>
        <input type="text" name="nombre_torneo" value="<?php echo htmlspecialchars($torneo['nombre_torneo']); ?>">
        <span style="color: red;"><?php echo $errores['nombre_torneo'] ?? ''; ?></span><br>
        
        <label>Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo htmlspecialchars($torneo['ciudad']); ?>">
        <span style="color: red;"><?php echo $errores['ciudad'] ?? ''; ?></span><br>
        
        <label>Superficie:</label>
        <select name="superficie_id">
            <option value="">Seleccione Superficie</option>
            <?php
            $sql = "SELECT id, nombre FROM superficies";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = ($row['id'] == $torneo['superficie_id']) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['nombre']}</option>";
            }
            ?>
        </select>
        <span style="color: red;"><?php echo $errores['superficie_id'] ?? ''; ?></span><br>
        
        <button type="submit">Guardar</button>
    </form>
    <a href="listado.php">Volver al listado</a>
</body>
</html>
