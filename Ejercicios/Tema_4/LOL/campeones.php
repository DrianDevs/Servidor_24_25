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
$resultado = $conexion->query('select * FROM campeones');
$registros = $resultado->fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $registro) {
    echo "<p>---------------------</p>";
    echo "<p>ID: " . $registro['id'] . "</p>";
    echo "<p>Nombre: " . $registro['nombre'] . "</p>";
    echo "<p>Rol: " . $registro['rol'] . "</p>";
    echo "<p>Dificultad: " . $registro['dificultad'] . "</p>";
    echo "<p>Descripcion: " . $registro['descripcion'] . "</p>";
}

$conexion = null;
?>