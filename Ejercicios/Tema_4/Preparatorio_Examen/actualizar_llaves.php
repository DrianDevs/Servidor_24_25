<?php
// Este código se encarga de actualizar las tablas de la base de datos para agregarles a las columnas las claves primarias, foráneas y otros atributos necesarios
// No es compatible con crear_tablas.php, ya que ese archivo ya hace lo mismo que este en la creación de las tablas

// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'dwes_manana_empresa';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Actualizar tabla "sedes"
    $sqlSedes = "
        ALTER TABLE sedes
        MODIFY COLUMN id_sede INT(11) AUTO_INCREMENT PRIMARY KEY;
    ";
    $pdo->exec($sqlSedes);

    // Actualizar tabla "departamentos"
    $sqlDepartamentos = "
        ALTER TABLE departamentos
        MODIFY COLUMN id_departamento INT(11) AUTO_INCREMENT PRIMARY KEY,
        ADD UNIQUE (nombre),
        ADD INDEX (id_sede),
        ADD CONSTRAINT fk_sede FOREIGN KEY (id_sede) REFERENCES sedes(id_sede) ON DELETE CASCADE;
    ";
    $pdo->exec($sqlDepartamentos);

    // Actualizar tabla "empleados"
    $sqlEmpleados = "
        ALTER TABLE empleados
        MODIFY COLUMN id_empleado INT(11) AUTO_INCREMENT PRIMARY KEY,
        ADD INDEX (id_departamento),
        ADD INDEX (id_pais),
        ADD CONSTRAINT fk_departamento FOREIGN KEY (id_departamento) REFERENCES departamentos(id_departamento) ON DELETE CASCADE,
        ADD CONSTRAINT fk_pais FOREIGN KEY (id_pais) REFERENCES paises(id_pais) ON DELETE CASCADE;
    ";
    $pdo->exec($sqlEmpleados);

    // Actualizar tabla "paises"
    $sqlPais = "
        ALTER TABLE paises
        MODIFY COLUMN id_pais INT(11) AUTO_INCREMENT PRIMARY KEY;
    ";
    $pdo->exec($sqlPais);

    echo "Las claves primarias, foráneas, únicas y AUTO_INCREMENT se han actualizado correctamente.";
} catch (PDOException $e) {
    echo "Error al actualizar las tablas: " . $e->getMessage();
}
?>
