<?php
/**
 * Método que establece la conexión con la base de datos
 * @param {string} - Host
 * @param {string} - Usuario
 * @param {string} - Contraseña
 * @param {string} - Esquema de la base de datos
 * @return {PDO}
 */
function conectarPDO(string $host, string $user, string $password, string $bbdd): PDO
{
    try {
        $mysql = "mysql:host=$host;dbname=$bbdd;charset=utf8";
        $conexion = new PDO($mysql, $user, $password);
        // set the PDO error mode to exception
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $exception) {
        exit($exception->getMessage());
    }
    return $conexion;
}
//-----------------------------------------------------
// Variables
//-----------------------------------------------------
$errores = [];
$user = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$host = "localhost";
$dbUser = "root";
$passwordDB = "";
$bbdd = "dwes_manana_tenistas";
// Comprobamos que nos llega los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //-----------------------------------------------------
// COMPROBAR SI LA CUENTA EXISTE
//-----------------------------------------------------
// Conecta con base de datos
    $conexion = conectarPDO($host, $dbUser, $passwordDB, $bbdd);
    // Prepara SELECT para obtener la contraseña almacenada del usuario
    $select = "SELECT password FROM usuarios WHERE user = :user;";
    $consulta = $conexion->prepare($select);
    // Ejecuta consulta
    $consulta->execute([
        "user" => $user
    ]);
    // Guardo el resultado
    $resultado = $consulta->fetch();

    if ($resultado) {
        //-----------------------------------------------------
// COMPROBAR LA CONTRASEÑA
//-----------------------------------------------------
// Comprobamos si es válida
        if (password_verify($password, $resultado["password"])) {
            // Si son correctos, creamos la sesión
            session_start();
            $_SESSION["user"] = $user;
            // Redireccionamos a la página segura
            header("Location: privado.php");
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
    <!-- Mostramos errores por HTML -->
    <?php if (count($errores) > 0): ?>
        <ul class="errores">
            <?php
            foreach ($errores as $error) {
                echo "<li>" . $error . "</li>";
            }
            ?>
        </ul>
    <?php endif; ?>
    <!-- Formulario de identificación -->
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
</body>

</html>