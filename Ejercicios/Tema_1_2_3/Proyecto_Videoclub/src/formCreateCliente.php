<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>
</head>

<body>
    <form action="createCliente.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <label for="maxalquiler">Máximo de alquileres concurrentes:</label>
        <input type="number" id="maxalquiler" name="maxalquiler" required>
        <br><br>
        <input type="submit" value="Crear usuario">
    </form>
</body>

</html>