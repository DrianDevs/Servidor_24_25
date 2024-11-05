<?php
session_start();

if (!isset($_SESSION['tiempo_inicio'])) {
    $_SESSION['tiempo_inicio'] = time();  // Establece la hora de inicio cuando no está definida
}


// Calcular el tiempo transcurrido
$tiempo_transcurrido = time() - $_SESSION['tiempo_inicio'];

// Verificar si ha pasado mas de un minuto (60 segundos)
if ($tiempo_transcurrido > 62) {
    session_unset();   // Limpia todas las variables de sesión
    session_destroy();

    // Redirigir a la pagina principal
    header("Location: index.php");
    exit;
}

$tiempo_restante = 61 - $tiempo_transcurrido;
echo "Te quedan $tiempo_restante segundos para seleccionar tus asientos.";

$asientos = [
    [0, 0, 0, 0, 0, 0], // Fila 1
    [0, 0, 0, 0, 0, 0], // Fila 2
    [0, 0, 0, 0, 0, 0], // Fila 3
    [0, 0, 0, 0, 0, 0], // Fila 4
    [0, 0, 0, 0, 0, 0], // Fila 5
];

// Se compruebasi se ha enviado el horario
if (isset($_POST['horario'])) {
    $horario_seleccionado = $_POST['horario']; // Obtener el horario seleccionado desde el formulario

    // Guardar el horario seleccionado en la sesion
    $_SESSION['horario'] = $horario_seleccionado;
} else {
    exit;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Selección de Asientos</title>
    <script>
        function actualizarMensaje() {  //Funcion que actualiza la pagina cuando se selecciona uno o varios asientos (PROCEDENTE DE FUENTES EXTERNAS)
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const mensajeElemento = document.getElementById('mensaje_seleccion');

            if (checkboxes.length > 0) {
                document.getElementById("botonAsientos").disabled = false;
                const asientosSeleccionados = Array.from(checkboxes).map(checkbox => {
                    const partes = checkbox.value.split('-');
                    const fila = parseInt(partes[0]) + 1; // Sumar 1 para mostrarlo como 1, 2, 3...
                    const columna = parseInt(partes[1]) + 1; // Sumar 1 para mostrarlo como 1, 2, 3...
                    return `Asiento ${columna} de la fila ${fila}`;
                });
                mensajeElemento.innerText = 'Has seleccionado: ' + asientosSeleccionados.join(', ');
            } else {
                mensajeElemento.innerText = ''; // Limpiar el mensaje si no hay asientos seleccionados
                document.getElementById("botonAsientos").disabled = true;
            }
        }
    </script>
</head>

<body>
    <h1>Selecciona tus asientos</h1>
    <p>Pelicula: <?php echo $_SESSION['pelicula']; ?></p>
    <p>Horario: <?php echo $_SESSION['horario']; ?></p>
    <form action="pago.php" method="POST">
        <?php foreach ($asientos as $fila_index => $fila): ?>
            <div>
                <?php foreach ($fila as $asiento_index => $asiento): ?> <!--(PROCEDENTE DE FUENTES EXTERNAS)-->
                    <?php if ($asiento == 0): ?>
                        <input type="checkbox" name="asientos[]" value="<?php echo $fila_index . '-' . $asiento_index; ?>"
                            onclick="actualizarMensaje(this.value)">
                        Asiento <?php echo $fila_index + 1 . '-' . ($asiento_index + 1); ?>
                    <?php else: ?>
                        <span style="text-decoration: line-through;">Asiento
                            <?php echo $fila_index + 1 . '-' . ($asiento_index + 1); ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <input type="hidden" name="pelicula" value="<?php echo $_SESSION['pelicula']; ?>">
        <input type="hidden" name="horario" value="<?php echo $_SESSION['horario']; ?>">

        <div id="mensaje_seleccion"></div> <!-- Contenedor para el mensaje -->
        <br>
        <button type="submit" id="botonAsientos" disabled>Continuar al Pago</button>
    </form>
</body>

</html>