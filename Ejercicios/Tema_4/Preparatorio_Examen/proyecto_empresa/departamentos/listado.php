<?php
// Incluir el archivo de conexion
require_once '../conexion.php';

try {
    // Obtener la conexión
    $conexion = obtenerConexion();

    // Preparar y ejecutar la consulta
    $consulta = $conexion->prepare("SELECT departamentos.id_departamento, departamentos.nombre, departamentos.presupuesto, sedes.nombre AS 'sede' FROM departamentos JOIN sedes ON departamentos.id_sede = sedes.id_sede ORDER BY departamentos.id_departamento");
    $consulta->execute();

    // Vincular las columnas a las variables
    $consulta->bindColumn('id_departamento', $id_departamento);
    $consulta->bindColumn('nombre', $nombre_departamento);
    $consulta->bindColumn('presupuesto', $presupuesto);
    $consulta->bindColumn('sede', $nombre_sede);

    // Mostrar los resultados
    echo "<h1>Listado de departamentos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Presupuesto</th><th>Sede</th></tr>";

    while ($consulta->fetch(PDO::FETCH_BOUND)) {
        echo "<tr>";
        echo "<td>{$id_departamento}</td>";
        echo "<td>{$nombre_departamento}</td>";
        echo "<td>{$presupuesto}</td>";
        echo "<td>{$nombre_sede}</td>";
        echo "</tr>";
    }

    echo "</table>";


    // Cerrar la conexion   
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
