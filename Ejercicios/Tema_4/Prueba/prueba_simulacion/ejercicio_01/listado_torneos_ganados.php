<?php
require_once '../utiles/config.php';
require_once '../utiles/funciones.php';

try {
    $conexion = conectarPDO($database);

    $order = isset($_GET['order']) ? $_GET['order'] : 'torneos_ganados';
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'desc';

    $consulta = $conexion->prepare("SELECT tenistas.nombre, tenistas.apellidos, tenistas.id, tenistas.altura, tenistas.mano, tenistas.anno_nacimiento, COUNT(titulos.tenista_id) AS torneos_ganados FROM tenistas LEFT JOIN titulos ON tenistas.id = titulos.tenista_id GROUP BY tenistas.id ORDER BY $order $tipo");
    $consulta->execute();

    echo "<h1>Listado de tenistas</h1>";
    echo "<table border='1'>";
    echo "<tr>
    <th>Id<a href='listado_torneos_ganados.php?order=id&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=id&tipo=desc'>&#8595;</a></th>
    <th>Nombre<a href='listado_torneos_ganados.php?order=nombre&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=nombre&tipo=desc'>&#8595;</a></th>
    <th>Apellidos<a href='listado_torneos_ganados.php?order=apellidos&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=apellidos&tipo=desc'>&#8595;</a></th>
    <th>Altura<a href='listado_torneos_ganados.php?order=altura&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=altura&tipo=desc'>&#8595;</a></th>
    <th>Mano<a href='listado_torneos_ganados.php?order=mano&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=mano&tipo=desc'>&#8595;</a></th>
    <th>Año de nacimiento<a href='listado_torneos_ganados.php?order=anno_nacimiento&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=anno_nacimiento&tipo=desc'>&#8595;</a></th>
    <th>Torneos ganados<a href='listado_torneos_ganados.php?order=torneos_ganados&tipo=asc'>&#8593;</a><a href='listado_torneos_ganados.php?order=torneos_ganados&tipo=desc'>&#8595;</a></th>
    </tr>";

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
?>