<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="nuevoUsuario.php" method="post">
        <fieldset>
            <legend>Registro de usuario</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" maxlength="255" required>
            <br>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" maxlength="255" required>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" maxlength="255" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="255" required>
            <br>
            <input type="submit" value="Registrarse">
        </fieldset>
    </form>
</body>

</html>