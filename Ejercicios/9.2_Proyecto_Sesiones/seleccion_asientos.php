<?php
session_start();

// Establecer el tiempo de inicio
if (!isset($_SESSION['tiempo_inicio'])) {
    $_SESSION['tiempo_inicio'] = time(); // Guarda la hora actual en segundos
}

// Calcular el tiempo transcurrido
$tiempo_transcurrido = time() - $_SESSION['tiempo_inicio'];

// Verificar si ha pasado más de un minuto (60 segundos)
if ($tiempo_transcurrido > 60) {
    // Limpiar las variables de sesión relacionadas con la selección
    unset($_SESSION['pelicula'], $_SESSION['horario'], $_SESSION['asientos'], $_SESSION['tiempo_inicio']);

    // Redirigir a la página principal
    header("Location: index.php");
    exit; // Termina la ejecución del script
}

$tiempo_restante = 60 - $tiempo_transcurrido;
echo "Te quedan $tiempo_restante segundos para seleccionar tus asientos.";

$asientos = [
    [0, 0, 0, 0, 0, 0], // Fila 1
    [0, 0, 0, 0, 0, 0], // Fila 2
    [0, 0, 0, 0, 0, 0], // Fila 3
    [0, 0, 0, 0, 0, 0], // Fila 4
    [0, 0, 0, 0, 0, 0], // Fila 5
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Selección de Asientos</title>
    <script>
        function actualizarMensaje() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const mensajeElemento = document.getElementById('mensaje_seleccion');

            if (checkboxes.length > 0) {
                const asientosSeleccionados = Array.from(checkboxes).map(checkbox => {
                    const partes = checkbox.value.split('-');
                    const fila = parseInt(partes[0]) + 1; // Sumar 1 para mostrarlo como 1, 2, 3...
                    const columna = parseInt(partes[1]) + 1; // Sumar 1 para mostrarlo como 1, 2, 3...
                    return `Asiento ${columna} de la fila ${fila}`;
                });
                mensajeElemento.innerText = 'Has seleccionado: ' + asientosSeleccionados.join(', ');
            } else {
                mensajeElemento.innerText = ''; // Limpiar el mensaje si no hay asientos seleccionados
            }
        }
    </script>
</head>

<body>
    <h1>Selecciona tus asientos</h1>
    <form action="pago.php" method="POST">
        <?php foreach ($asientos as $fila_index => $fila): ?>
            <div>
                <?php foreach ($fila as $asiento_index => $asiento): ?>
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
        <button type="submit">Continuar al Pago</button>
    </form>
</body>

</html>