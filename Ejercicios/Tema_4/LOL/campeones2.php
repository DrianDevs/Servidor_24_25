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
            window.location.href = 'campeones2.php?borrar=true&id=' + id + '&nombre=' + nombre;
        }
    }
</script>

<?php

if (isset($_GET['borrar'])) {
    $consulta = $conexion->prepare('delete from campeones where id=:id and nombre=:nombre');
    $consulta->bindParam(':id', $_GET['id']);
    $consulta->bindParam(':nombre', $_GET['nombre']);
    $consulta->execute();
    header("Location: campeones2.php");
}
$resultado = $conexion->query('select * FROM campeones');
echo "<table border='1'>";
while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>ID: " . $registro['id'] . "</td>";
    echo "<td>Nombre: " . $registro['nombre'] . "</td>";
    echo "<td>Rol: " . $registro['rol'] . "</td>";
    echo "<td>Dificultad: " . $registro['dificultad'] . "</td>";
    echo "<td>Descripcion: " . $registro['descripcion'] . "</td>";
    echo "<td><button><a href='editando.php?id=" . $registro['id'] . "'>Editar</a></button></td>
    <td><button onclick='confirmarBorrado(" . $registro['id'] . ", \"" . $registro['nombre'] . "\")'>Eliminar</a></button>";
}
echo "</table>";
$conexion = null;
?>