<?php
session_start();
include('horario.php');

$clases = obtenerClases();
$horarios = obtenerHorarios();

if (isset($_POST['clase'])) {
    $claseSeleccionada = $_POST['clase'];
    $_SESSION['clase'] = $claseSeleccionada;
    $horariosClase = $horarios[$claseSeleccionada];
    echo "<h2>Fechas y horas para las sesiones de " . $claseSeleccionada . "</h2>";

    echo '<form action="procesar_formulario.php" method="POST">';
    for ($i = 0; $i < count($horariosClase); $i++) {
        echo '<input type="radio" name="horario" value=' . $i . ' required>';
        echo $horariosClase[$i + 1]["dia"];
        echo " ";
        echo $horariosClase[$i + 1]["hora"];
    }
    echo "<br>";
    echo '<input type="radio" name="accion" value="realizar" required/>Realizar la reserva';
    echo '<input type="radio" name="accion" value="anular" required/>Anular la reserva';

    echo '<button type="submit">Continuar</button>';
    echo '</form>';
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo  
        de Actividades - Tu Gimnasio</title>
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
        <?php foreach ($clases as $clase): ?>
            <input type="radio" name="clase" value="<?php echo $clase; ?>" required>
            <?php echo $clase;
            echo "<br>"; ?>
        <?php endforeach; ?>
        <button type="submit">Continuar</button>
    </form>
</body>

</html>