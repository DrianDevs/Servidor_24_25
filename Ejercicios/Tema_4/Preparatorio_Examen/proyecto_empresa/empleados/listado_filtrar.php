<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
</head>

<body>
    <form action="listado_filtrar.php" method="post">
        <fieldset>
            <legend>Filtrado</legend>
            <label for="texto">Texto:</label>
            <input type="text" name="texto" id="texto">
            <br><br>
            <label for="minimo">Sueldo mínimo:</label>
            <input type="number" name="minimo" id="minimo">
            <label for="maximo">Sueldo máximo:</label>
            <input type="number" name="maximo" id="maximo">
            <br><br>
            <label for="hijos">Número de hijos:</label>
            <input type="number" name="hijos" id="hijos">
            <br><br>
            <input type="submit" value="Filtrar">
        </fieldset>
    </form>
</body>

</html>

<?php
// Incluir el archivo de conexion
require_once '../conexion.php';

try {
    // Obtener la conexión
    $conexion = obtenerConexion();

    // Recoge los datos del formulario
    $filtros = [];
    $parametros = [];

    if (!empty($_POST['texto'])) {
        $filtros[] = "(empleados.nombre LIKE :texto OR empleados.apellidos LIKE :texto OR empleados.email LIKE :texto)";
        $parametros[':texto'] = '%' . $_POST['texto'] . '%';
    }
    if (!empty($_POST['minimo'])) {
        $filtros[] = "empleados.salario >= :minimo";
        $parametros[':minimo'] = $_POST['minimo'];
    }
    if (!empty($_POST['maximo'])) {
        $filtros[] = "empleados.salario <= :maximo";
        $parametros[':maximo'] = $_POST['maximo'];
    }
    if (!empty($_POST['hijos'])) {
        $filtros[] = "empleados.hijos = :hijos";
        $parametros[':hijos'] = $_POST['hijos'];
    }

    // Construye la consulta SQL dinámica
    $sql = "SELECT empleados.id_empleado, empleados.nombre, empleados.apellidos, empleados.email, empleados.salario, empleados.hijos, 
        departamentos.nombre AS 'departamento', sedes.nombre AS 'sede'
        FROM empleados 
        JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento 
        JOIN sedes ON departamentos.id_sede = sedes.id_sede";

    // Añade las condiciones al SQL si hay filtros
    if (!empty($filtros)) {
        $sql .= " WHERE " . implode(" AND ", $filtros);
    }
    $sql .= " ORDER BY id_empleado";

    // Prepara y ejecuta la consulta
    $consulta = $conexion->prepare($sql);
    $consulta->execute($parametros);

    // Mostrar los resultados
    echo "<h1>Listado de empleados</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Correo electrónico</th><th>Salario</th><th>Nº Hijos</th><th>Departamento</th><th>Sede</th></tr>";

    while ($empleado = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$empleado['id_empleado']}</td>";
        echo "<td>{$empleado['nombre']}</td>";
        echo "<td>{$empleado['apellidos']}</td>";
        echo "<td>{$empleado['email']}</td>";
        echo "<td>{$empleado['salario']}</td>";
        echo "<td>{$empleado['hijos']}</td>";
        echo "<td>{$empleado['departamento']}</td>";
        echo "<td>{$empleado['sede']}</td>";
        echo "</tr>";
    }
    echo "</table>";


    // Cerrar la conexion
    $conexion = null;
} catch (PDOException $e) {
    echo "Error al hacer la consulta: " . $e->getMessage();
}
