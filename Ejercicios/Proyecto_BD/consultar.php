<?php
try {
    $mysql =
        "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user =
        "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password, $opciones);

    $resultado = $conexion->query('select * FROM productos');

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Categoría</th></tr>";


    while
    ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>ID:" . $registro->id . "</td>";
        echo "<td>Nombre:" . $registro->nombre . "</td>";
        echo "<td>Descripción:" . $registro->descripcion . "</td>";
        echo "<td>Precio:" . $registro->precio . "</td>";
        echo "<td>Stock:" . $registro->stock . "</td>";
        echo "<td>Categoría:" . $registro->categoria . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "<p>" . $e->getMessage() . "</p>";
    exit();
}
$conexion = null;
?>