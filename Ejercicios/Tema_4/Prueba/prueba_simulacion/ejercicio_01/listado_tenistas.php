<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

try {
    $conexion = conectarPDO($database);

    $consulta = $conexion->prepare("SELECT * FROM tenistas");
    $consulta->execute();

    echo "<h1>Listado de tenistas</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Altura</th><th>Mano</th><th>Año de nacimiento</th></tr>";

    while ($tenista = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$tenista['id']}</td>";
        echo "<td>{$tenista['nombre']}</td>";
        echo "<td>{$tenista['apellidos']}</td>";
        echo "<td>{$tenista['altura']}</td>";
        echo "<td>{$tenista['mano']}</td>";
        echo "<td>{$tenista['anno_nacimiento']}</td>";
        echo "</tr>";
    }

    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
