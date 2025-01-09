<?php
try {
    $mysql =
        "mysql:host=localhost;dbname=lol;charset=UTF8";
    $user = "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password);
} catch (PDOException $e) {
    // Mostramos mensaje en caso de error
    echo "<p>" . $e->getMessage() . "</p>";
    exit();
}
?>
<script>
    function confirmarBorrado(id, nombre) {
        console.log("Hola");
        if (confirm('Está seguro de que desea borrar al campeón ' + nombre + '?')) {
            window.location.href = 'campeones3.php?borrar=true&id=' + id + '&nombre=' + nombre;
        }
    }
</script>

<?php

if (isset($_GET['borrar'])) {
    $eliminar = $conexion->prepare('delete from campeones where id=:id and nombre=:nombre');
    $eliminar->bindParam(':id', $_GET['id']);
    $eliminar->bindParam(':nombre', $_GET['nombre']);
    $eliminar->execute();
    header("Location: campeones3.php");
} else if (isset($_GET['order'])) {
    $resultado = $conexion->prepare('select * from campeones order by ' . $_GET['order'] . ' ' . $_GET['tipo']);
    $resultado->execute();
} else {
    $resultado = $conexion->query('select * FROM campeones');
}

echo "<table border='1'>";
echo "<th>ID<a href='campeones3.php?order=id&tipo=asc'>^</a><a href='campeones3.php?order=id&tipo=desc'>˅</a></th>
<th>Nombre<a href='campeones3.php?order=nombre&tipo=asc'>^</a><a href='campeones3.php?order=nombre&tipo=desc'>˅</a></th>
<th>Rol<a href='campeones3.php?order=rol&tipo=asc'>^</a><a href='campeones3.php?order=rol&tipo=desc'>˅</a></th>
<th>Dificultad<a href='campeones3.php?order=dificultad&tipo=asc'>^</a><a href='campeones3.php?order=dificultad&tipo=desc'>˅</a></th>
<th>Descripcion<a href='campeones3.php?order=descripcion&tipo=asc'>^</a><a href='campeones3.php?order=descripcion&tipo=desc'>˅</a></th>
<th>Editar</th><th>Eliminar</th>";
while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $registro['id'] . "</td>";
    echo "<td>" . $registro['nombre'] . "</td>";
    echo "<td>" . $registro['rol'] . "</td>";
    echo "<td>" . $registro['dificultad'] . "</td>";
    echo "<td>" . $registro['descripcion'] . "</td>";
    echo "<td><button><a href='editando.php?id=" . $registro['id'] . "'>Editar</a></button></td>
    <td><button onclick='confirmarBorrado(" . $registro['id'] . ", \"" . $registro['nombre'] . "\")'>Eliminar</a></button>";
}
echo "</table>";
$conexion = null;
?>