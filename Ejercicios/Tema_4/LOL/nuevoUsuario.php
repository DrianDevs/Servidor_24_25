<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['email'])) {
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

    //Ciframos la contrasena antes de insertar
    $_POST['contrasena'] = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $consulta = $conexion->prepare('insert into usuario (nombre, usuario, password, email) values (:nombre, :usuario, :password, :email)');
    $consulta->bindParam(':nombre', $_POST['nombre']);
    $consulta->bindParam(':usuario', $_POST['usuario']);
    $consulta->bindParam(':password', $_POST['contrasena']);
    $consulta->bindParam(':email', $_POST['email']);
    $consulta->execute();
    echo "<p>El usuario" . $_POST['usuario'] . " ha sido introducido en el sistema con la contraseña " . $_POST['contrasena'] . "</p>";
} else {
    echo "<p>No se han recibido los datos necesarios</p>";
    header("Location: registro.php");
    exit();
}

?>