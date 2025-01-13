<?php
// Incluir el archivo de conexion
require_once 'config.php';

try {
    // Obtener la conexión
    $conexion = obtenerConexion();

    // Preparar y ejecutar la consulta
    $consulta = $conexion->prepare("SELECT * FROM sedes");
    $consulta->execute();

    // Mostrar los resultados
    echo "<h1>Listado de sedes</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Dirección</th></tr>";

    while ($sede = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$sede['id_sede']}</td>";
        echo "<td>{$sede['nombre']}</td>";
        echo "<td>{$sede['direccion']}</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Cerrar la conexion
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al obtener las sedes: " . $e->getMessage();
}
