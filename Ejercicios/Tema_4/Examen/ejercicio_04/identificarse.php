<?php
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");

$errores = [];
$user = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = conectarPDO($database);

    $select = "SELECT password FROM usuarios WHERE user = :user;";

    $consulta = $conexion->prepare($select);
    $consulta->bindParam(':user', $user, PDO::PARAM_STR);
    $consulta->execute();

    $resultado = $consulta->fetch();

    if ($resultado) {

        if (password_verify($password, $resultado["password"])) {

            session_start();
            $_SESSION["user"] = $user;

            header("Location: ../ejercicio02/nuevo_tenista.php");
            exit();
        } else {
            $errores[] = "El usuario o la contraseña es incorrecta.";
        }
    } else {
        $errores[] = "El usuario no existe.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
</head>

<body>
    <h1>Entrar</h1>

    <?php if (count($errores) > 0): ?>
        <ul class="errores">
            <?php
            foreach ($errores as $error) {
                echo "<li>" . $error . "</li>";
            }
            ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <p>
            <input type="text" name="user" placeholder="Usuario">
        </p>
        <p>
            <input type="password" name="password" placeholder="Contraseña">
        </p>
        <p>
            <input type="submit" value="Entrar">
        </p>
    </form>
    <a href="recupContrasena.php">Recuperar Contraseña</a>
</body>

</html>