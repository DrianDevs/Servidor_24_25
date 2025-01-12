<?php
function obtenerConexion()
{
    // Configuración de la base de datos
    $host = 'localhost';
    $dbname = 'dwes_manana_empresa';
    $username = 'root';
    $password = '';

    try {
        // Crear una nueva conexión PDO
        $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;
    } catch (PDOException $e) {
        die("Error al conectar con la base de datos: " . $e->getMessage());
    }
}
