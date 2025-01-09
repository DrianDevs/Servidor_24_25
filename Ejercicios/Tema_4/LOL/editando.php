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
if (isset($_POST['Editar'])) {
    $consulta = $conexion->prepare('update campeones set nombre=:nombre, rol=:rol, dificultad=:dificultad, descripcion=:descripcion where id=:id');
    $consulta->bindParam(':id', $_POST['id']);
    $consulta->bindParam(':nombre', $_POST['nombre']);
    $consulta->bindParam(':rol', $_POST['rol']);
    $consulta->bindParam(':dificultad', $_POST['dificultad']);
    $consulta->bindParam(':descripcion', $_POST['descripcion']);
    $consulta->execute();
    header("Location: campeones3.php");
} else {
    $resultado = $conexion->query('select * FROM campeones WHERE id=' . $_GET['id']);
    echo "<form action='' method='post'>";
    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<fieldset>";
        echo "<label>ID:</label>";
        echo "<input type='text' name='id' value='" . $registro['id'] . "' readonly>";
        echo "<br>";
        echo "<label>Nombre:</label>";
        echo "<input type='text' name='nombre' value='" . $registro['nombre'] . "'>";
        echo "<br>";
        echo "<label>Rol:</label>";
        echo "<input type='text' name='rol' value='" . $registro['rol'] . "'>";
        echo "<br>";
        echo "<label>Dificultad:</label>";
        echo "<input type='text' name='dificultad' value='" . $registro['dificultad'] . "'>";
        echo "<br>";
        echo "<label>Descripción:</label>";
        echo "<textarea name='descripcion'>" . $registro['descripcion'] . "</textarea>";
        echo "<br>";
        echo "<input type='submit' name='Editar' value='Editar'>";
        echo "</fieldset>";
    }
    echo "</form>";
    echo "</table>";
}
$conexion = null;
?>