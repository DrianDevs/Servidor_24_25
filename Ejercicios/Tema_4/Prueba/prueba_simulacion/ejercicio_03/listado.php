<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

try {
    $conexion = conectarPDO($database);

    $consulta = $conexion->prepare("SELECT torneos.id, torneos.nombre, torneos.ciudad, superficies.nombre AS 'superficie' FROM torneos JOIN superficies ON torneos.superficie_id = superficies.id ORDER BY torneos.id;");
    $consulta->execute();

    echo "<h1>Listado de torneos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Ciudad</th><th>Superficio</th></tr>";

    while ($torneo = $consulta->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>{$torneo->id}</td>";
        echo "<td>{$torneo->nombre}</td>";
        echo "<td>{$torneo->ciudad}</td>";
        echo "<td>{$torneo->superficie}</td>";
        echo "</tr>";
    }

    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
