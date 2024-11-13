<?php
session_start();
include('horario.php');

echo "SID: " . session_id() . "<br>";

inicializar_horarios();

$clases = array_keys($_SESSION['horarios_clases']);

if (isset($_POST['clase'])) {
    $claseSeleccionada = $_POST['clase'];
    $_SESSION['clase'] = $claseSeleccionada;

    $horariosClase = $_SESSION['horarios_clases'][$claseSeleccionada];

    echo "<h2>Fechas y horas para las sesiones de " . $claseSeleccionada . "</h2>";
    echo "<h3>Selecciona una fecha y hora para la reserva</h3>";

    echo "<form action='procesar_formulario.php' method='POST'>";
    foreach ($horariosClase as $key => $value) {
        echo "<input type='radio' name='horario' value='" . $key . "' required>";
        echo $key . ": " . $value['hora'];
    }
    echo "<br><br>";
    echo '<input type="radio" name="accion" value="realizar" required/>Realizar una reserva';
    echo '<input type="radio" name="accion" value="anular" required/>Anular una reserva';
    echo "<br><br>";
    echo '<button type="submit">Continuar</button>';
    echo '</form>';
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Actividades - Tu Gimnasio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Catálogo de Actividades</h1>

    <section class="actividad">
        <h2>Clase de Yoga</h2>
        <img src="yoga.jpg" alt="Postura de Yoga by Miguel CC BY-SA 2.0">
        <p>Complementa tu rutina de gimnasio con yoga. Aumenta tu fuerza y resistencia de una manera diferente, mejora
            tu postura y alineación, y reduce el riesgo de lesiones. El yoga te ayudará a esculpir músculos y a ganar
            flexibilidad de una forma más suave y consciente.</p>

    </section>

    <section class="actividad">
        <h2>Clase de Zumba</h2>
        <img src='zumba.jpg' alt='Zumba by Claude PERON CC BY-SA 3.0'>
        <p>¡Tonifica tu cuerpo y mejora tu condición física mientras te mueves al ritmo de la música! La Zumba es una
            forma divertida y efectiva de quemar calorías, fortalecer tus músculos y mejorar tu coordinación. ¡Olvídate
            de la monotonía y descubre una nueva forma de entrenar!.</p>
    </section>
    <section class="actividad">
        <h2>Clase de Crossfit</h2>
        <img src="crossfit.jpg" alt="Clase de Crossfit">
        <p>¿Buscas un entrenamiento que te desafíe al máximo y te haga sentir como un auténtico atleta? ¡Nuestras clases
            de CrossFit son para ti! Combina ejercicios funcionales de alta intensidad con movimientos olímpicos,
            fortaleciendo todo tu cuerpo y mejorando tu resistencia, fuerza y agilidad. ¡Prepárate para sudar, quemar
            calorías y alcanzar tus metas de fitness más rápido que nunca!.</p>
    </section>

    <h3>Selecciona una clase para mostrar los horarios</h3>
    <form action="clases.php" method="POST">
        <?php foreach ($clases as $accion): ?>
            <input type="radio" name="clase" value="<?php echo $accion; ?>" required>
            <?php echo $accion;
            echo "<br>"; ?>
        <?php endforeach; ?>
        <button type="submit">Continuar</button>
    </form>
</body>

</html>