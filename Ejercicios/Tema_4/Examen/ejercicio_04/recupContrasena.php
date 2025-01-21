<?php
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");

try {
    $conexion = conectarPDO($database);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Generar el token seguro
$tokenSeguro = bin2hex(openssl_random_pseudo_bytes(16));
$user = "usuario_ejemplo";
$expiracion = date("Y-m-d H:i:s", strtotime("+1 day"));  // El token expira en 1 día

// Guardar el token en la base de datos
$stmt = $conexion->prepare("INSERT INTO usuarios_recuperacion (user, token, expiracion) VALUES (:user, :token, :expiracion)");
$stmt->bindParam(':user', $user);
$stmt->bindParam(':token', $tokenSeguro);
$stmt->bindParam(':expiracion', $expiracion);

if ($stmt->execute()) {
    // Enviar el correo
    $mensaje = "
    <html>
    <head><title>Recupera tu contraseña</title></head>
    <body>
    <a href=\"http://localhost/Drian/Servidor_24_25/Ejercicios/Tema_4/Login_Registro/verifyToken.php?token=$tokenSeguro\">Pulsa aquí para cambiar tu contraseña</a>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: dwes@php.com\r\n";

    if (mail($user, 'Recuperar contraseña', $mensaje, $headers)) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Error al guardar el token en la base de datos.";
}
?>