<?php
$numero = $_POST['numero'];

if (ctype_digit($numero) && $numero >= 1 && $numero <= 10) {
    echo "<p>Número de elementos: $numero x $numero</p>";
    echo "<p>Introduzca los elementos a tratar: </p>";
    echo "<form action='formulario_3.php' method='post'>";
    echo "<input type='hidden' name='numero' value='$numero'>";
    for ($i = 1; $i <= $numero; $i++) {
        for ($j = 1; $j <= $numero; $j++) {
            echo "<input type='text' name='elemento$i$j' size=5 required>";
        }
        echo "<br>";
    }
    echo "<br>";
    echo "<label>Selecciona una fila: </label>";
    echo "<select name='fila'>";
    for ($i = 1; $i <= $numero; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    echo "<br>";
    echo "</select>";
    echo "<br>";
    echo "<label>Selecciona la columna: </label>";
    echo "<select name='columna'>";
    for ($i = 1; $i <= $numero; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    echo "<br>";
    echo "</select>";
    echo "<br>";
    echo "<label>Introduzca la trayectoria: </label>";
    echo "<select name='trayectoria'>";
    echo "<option value='arriba'>Arriba</option>";
    echo "<option value='abajo'>Abajo</option>";
    echo "<option value='izquierda'>Izquierda</option>";
    echo "<option value='derecha'>Derecha</option>";
    echo "<option value='arriba-izquierda'>Arriba-Izquierda</option>";
    echo "<option value='arriba-derecha'>Arriba-Derecha</option>";
    echo "<option value='abajo-izquierda'>Abajo-Izquierda</option>";
    echo "<option value='abajo-derecha'>Abajo-Derecha</option>";
    echo "</select>";
    echo "<br><br><input type='submit' value='Enviar'>";
    echo "<button type='reset'>Borrar</button>";
    echo "</form>";
} else {
    echo "<p>El valor es incorrecto. Debe ser un número entero 1 y 10</p>";
}
echo "<a href='formulario_1.html'>Volver al inicio</a>";

?>