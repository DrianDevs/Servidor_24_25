<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'dwes_manana_empresa';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$pdo->beginTransaction();

    // Crear tabla de Sedes
    $sqlSedes = "
        CREATE TABLE IF NOT EXISTS sedes (
            id_sede INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            direccion VARCHAR(256) NOT NULL
        );
    ";
    $pdo->exec($sqlSedes);

    // Crear tabla de Departamentos
    $sqlDepartamentos = "
        CREATE TABLE IF NOT EXISTS departamentos (
            id_departamento INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            presupuesto INT(11) NOT NULL,
            id_sede INT(11) NOT NULL,
            FOREIGN KEY (id_sede) REFERENCES sedes(id_sede) ON DELETE CASCADE
        );
    ";
    $pdo->exec($sqlDepartamentos);

    // Crear tabla de Paises
    $sqlPaises = "
        CREATE TABLE IF NOT EXISTS paises (
            id_pais INT(11) AUTO_INCREMENT PRIMARY KEY,
            pais VARCHAR(50) NOT NULL,
            nacionalidad VARCHAR(50) NOT NULL
        );
    ";
    $pdo->exec($sqlPaises);

    // Crear tabla de Empleados
    $sqlEmpleados = "
        CREATE TABLE IF NOT EXISTS empleados (
            id_empleado INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellidos VARCHAR(150) NOT NULL,
            email VARCHAR(120) UNIQUE NOT NULL,
            hijos INT(11) NOT NULL DEFAULT 0,
            salario FLOAT NOT NULL,
            id_pais INT(11) NOT NULL,
            id_departamento INT(11) NOT NULL,
            FOREIGN KEY (id_pais) REFERENCES paises(id_pais) ON DELETE CASCADE,
            FOREIGN KEY (id_departamento) REFERENCES departamentos(id_departamento) ON DELETE CASCADE
        );
    ";
    $pdo->exec($sqlEmpleados);

    // $pdo->commit();

    echo "Tablas creadas con éxito.";
} catch (PDOException $e) {
    echo "Error al crear las tablas: " . $e->getMessage();
}
?>
