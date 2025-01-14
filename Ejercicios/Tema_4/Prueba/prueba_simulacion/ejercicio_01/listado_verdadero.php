<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

try {
    $conexion = conectarPDO($database);

    $tenista_id = $_GET['id_tenista'];

    // Verificar si el tenista existe y obtener su nombre
    $consulta_tenista = $conexion->prepare("SELECT nombre, apellidos FROM tenistas WHERE id = :tenista_id");
    $consulta_tenista->bindParam(':tenista_id', $tenista_id, PDO::PARAM_INT);
    $consulta_tenista->execute();

    if ($consulta_tenista->rowCount() > 0) {
        $tenista = $consulta_tenista->fetch(PDO::FETCH_ASSOC);
        $nombre_completo = $tenista['nombre'] . ' ' . $tenista['apellidos'];

        // Consulta de los torneos ganados por el tenista
        $consulta = $conexion->prepare("SELECT torneos.nombre AS torneo, torneos.ciudad AS ciudad, titulos.anno AS anno FROM titulos JOIN torneos ON titulos.torneo_id = torneos.id WHERE titulos.tenista_id = :tenista_id");
        $consulta->bindParam(':tenista_id', $tenista_id, PDO::PARAM_INT);
        $consulta->execute();

        echo "<h1>Listado de torneos ganados por {$nombre_completo}</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Torneo</th><th>Ciudad</th><th>Año</th></tr>";

        while ($torneo = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$torneo['torneo']}</td>";
            echo "<td>{$torneo['ciudad']}</td>";
            echo "<td>{$torneo['anno']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<h1>El tenista con ID {$tenista_id} no existe.</h1>";
    }

    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
