<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

try {
    $conexion = conectarPDO($database);

    $consulta = $conexion->prepare("SELECT tenistas.nombre, tenistas.apellidos, tenistas.id, tenistas.altura, tenistas.mano, tenistas.anno_nacimiento, COUNT(titulos.tenista_id) AS torneos_ganados FROM tenistas LEFT JOIN titulos ON tenistas.id = titulos.tenista_id GROUP BY tenistas.id ORDER BY torneos_ganados DESC");
    $consulta->execute();

    echo "<h1>Listado de tenistas</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Altura</th><th>Mano</th><th>Año de nacimiento</th><th>Torneos ganados</th></tr>";

    while ($tenista = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$tenista['id']}</td>";
        echo "<td>{$tenista['nombre']}</td>";
        echo "<td>{$tenista['apellidos']}</td>";
        echo "<td>{$tenista['altura']}</td>";
        echo "<td>{$tenista['mano']}</td>";
        echo "<td>{$tenista['anno_nacimiento']}</td>";
        echo "<td>{$tenista['torneos_ganados']}</td>";
        echo "</tr>";
    }

    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
