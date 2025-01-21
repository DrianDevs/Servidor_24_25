<?php
session_start();
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");


try {
    $conexion = conectarPDO($database);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Verificar si el token llega en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar el token en la base de datos
    $stmt = $conexion->prepare("SELECT email FROM usuarios_recuperacion WHERE token = :token AND expiracion > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $usuario['email'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_contrasena'])) {
            $nuevaContrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_BCRYPT);

            $updateStmt = $conexion->prepare("UPDATE usuarios SET contrasena = :contrasena WHERE email = :email");
            $updateStmt->bindParam(':contrasena', $nuevaContrasena);
            $updateStmt->bindParam(':email', $email);

            if ($updateStmt->execute()) {
                $deleteStmt = $conexion->prepare("DELETE FROM usuarios_recuperacion WHERE token = :token");
                $deleteStmt->bindParam(':token', $token);
                $deleteStmt->execute();

                echo "Contraseña actualizada correctamente.";
            } else {
                echo "Error al actualizar la contraseña.";
            }
        }
        ?>

        <form method="POST">
            <label for="nueva_contrasena">Introduce tu nueva contraseña</label>
            <input type="password" name="nueva_contrasena" placeholder="Nueva Contraseña" required>
            <input type="submit" value="Cambiar">
        </form>

        <?php
    } else {
        echo "El token es inválido o ha expirado.";
    }
} else {
    echo "No se proporcionó un token válido.";
}
?>