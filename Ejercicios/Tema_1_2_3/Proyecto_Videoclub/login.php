<?php
session_start();

$usuarios = array(
    'admin' => 'admin',
    'usuario' => 'usuario'
);

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
        $_SESSION['usuario'] = $usuario;

        if ($usuario === 'admin') {
            header('Location: src/mainAdmin.php');
            exit;
        } else {
            header('Location: src/mainCliente.php');
            exit;
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
        echo '<br><a href="main.php">Volver</a>';
    }
} else {
    header('Location: index.php');
    exit;
}

?>