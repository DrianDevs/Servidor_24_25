<?php
try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "root";
    $password = "";
    $conexion = new PDO($mysql, $user, $password);
    echo "<p>Conectada a la BBDD</p>";
} catch (PDOException $e) {
    // Mostramos el mensaje en caso de error
    echo "<p>" . $e->getMessage() . "</p>";
}
?>