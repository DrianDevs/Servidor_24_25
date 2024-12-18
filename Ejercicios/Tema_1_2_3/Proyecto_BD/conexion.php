<?php
try {
    $mysql =
        "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user =
        "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password, $opciones);

    //echo "<p>Conectado exitosamente a la BBDD</p>";

    //print_r(PDO::getAvailableDrivers()); Muestra en pantalla los drivers
} catch (PDOException $e) {
    echo "<p>" . $e->getMessage() . "</p>";
    exit();
}
$conexion = null;
?>