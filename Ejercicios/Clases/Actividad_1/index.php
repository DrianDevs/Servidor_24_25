<?php
require_once 'usuario.php';

$usuario = new Usuario('Juan', 'juan@example.com', '123456');

$passwordIntento = 'elpepe';

if (password_verify($passwordIntento, $usuario->getPassword())) {
    echo "Contraseña correcta";
} else {
    echo "Contraseña incorrecta";
}
?>