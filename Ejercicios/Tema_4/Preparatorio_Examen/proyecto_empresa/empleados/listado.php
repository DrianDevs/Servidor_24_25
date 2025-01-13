<?php
// Incluir el archivo de conexion
require_once '../conexion.php';

try {
    // Obtener la conexión
    $conexion = obtenerConexion();

    // Preparar y ejecutar la consulta
    $consulta = $conexion->prepare("SELECT empleados.id_empleado, empleados.nombre, empleados.apellidos, empleados.email, empleados.salario, empleados.hijos, departamentos.nombre AS 'departamento', sedes.nombre AS 'sede' FROM empleados JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento JOIN sedes ON departamentos.id_sede = sedes.id_sede ORDER BY id_empleado");
    $consulta->execute();

    // Mostrar los resultados
    echo "<h1>Listado de empleados</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Correo electrónico</th><th>Salario</th><th>Nº Hijos</th><th>Departamento</th><th>Sede</th></tr>";

    while ($empleado = $consulta->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>{$empleado->id_empleado}</td>";
        echo "<td>{$empleado->nombre}</td>";
        echo "<td>{$empleado->apellidos}</td>";
        echo "<td>{$empleado->email}</td>";
        echo "<td>{$empleado->salario}</td>";
        echo "<td>{$empleado->hijos}</td>";
        echo "<td>{$empleado->departamento}</td>";
        echo "<td>{$empleado->sede}</td>";
        echo "</tr>";
    }
    echo "</table>";


    // Cerrar la conexion
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
