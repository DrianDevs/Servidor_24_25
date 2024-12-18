<?php
require_once("autoload.php");
session_start();
session_regenerate_id();
//evita el almacenamiento en caché
header('Cache-Control: no-store, no-cache, must-revalidate');

$bd = new BD();
$usuarios = $bd->getUsuarios();

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = new Usuario($_POST['usuario'], $_POST['contrasena']);

    if (isset($usuarios[$usuario->getUsuario()]) && $usuarios[$usuario->getUsuario()] === $usuario->getContrasena()) {
        $_SESSION['usuario'] = $usuario;

        $horarios = new Horario();
        $_SESSION['horarios'] = $horarios;

        header('Location: src/main.php');
        exit;
    } else {
        echo "<br><div style='text-align: center;font-weight: bold; font-size: 16px;'> Usuario o contraseña incorrectos. </div>";
        echo "<p><href : 'index.php'></p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <form action="index.php" method="post">
            <input type="submit" value="Volver a la página de inicio">
        </form>
    </nav>
</body>

</html>