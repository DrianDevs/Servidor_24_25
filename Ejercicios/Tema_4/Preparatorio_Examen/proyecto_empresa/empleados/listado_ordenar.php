<?php
// Incluir el archivo de conexion
require_once '../conexion.php';

try {
    // Obtener la conexión
    $conexion = obtenerConexion();

    // Preparar la consulta dependiendo de los parametros y ejecutarla
    if (isset($_GET['order'])) {
        $consulta = $conexion->prepare("SELECT empleados.id_empleado, empleados.nombre, empleados.apellidos, empleados.email, empleados.salario, empleados.hijos, departamentos.nombre AS 'departamento', sedes.nombre AS 'sede' FROM empleados JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento JOIN sedes ON departamentos.id_sede = sedes.id_sede ORDER BY {$_GET['order']} {$_GET['tipo']}");
    } else {
        $consulta = $conexion->prepare("SELECT empleados.id_empleado, empleados.nombre, empleados.apellidos, empleados.email, empleados.salario, empleados.hijos, departamentos.nombre AS 'departamento', sedes.nombre AS 'sede' FROM empleados JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento JOIN sedes ON departamentos.id_sede = sedes.id_sede ORDER BY id_empleado");
    }
    $consulta->execute();

    // Mostrar los resultados
    echo "<h1>Listado de empleados</h1>";
    echo "<table border='1'>";
    echo "<tr>
    <th>Id<a href='listado_ordenar.php?order=id_empleado&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=id_empleado&tipo=desc'>&#8595;</a></th>
    <th>Nombre<a href='listado_ordenar.php?order=nombre&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=nombre&tipo=desc'>&#8595;</a></th>
    <th>Apellidos<a href='listado_ordenar.php?order=apellidos&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=apellidos&tipo=desc'>&#8595;</a></th>
    <th>Correo electrónico<a href='listado_ordenar.php?order=email&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=email&tipo=desc'>&#8595;</a></th>
    <th>Salario<a href='listado_ordenar.php?order=salario&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=salario&tipo=desc'>&#8595;</a></th>
    <th>Nº Hijos<a href='listado_ordenar.php?order=hijos&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=hijos&tipo=desc'>&#8595;</a></th>
    <th>Departamento<a href='listado_ordenar.php?order=departamento&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=departamento&tipo=desc'>&#8595;</a></th>
    <th>Sede<a href='listado_ordenar.php?order=sede&tipo=asc'>&#8593;</a><a href='listado_ordenar.php?order=sede&tipo=desc'>&#8595;</a></th>
    </tr>";

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
