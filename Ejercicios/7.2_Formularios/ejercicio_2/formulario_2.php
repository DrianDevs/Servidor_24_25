<?php
$numero = $_POST['numero'];

if (ctype_digit($numero) && $numero >= 1 && $numero <= 10) {
    echo "<p>Número de elementos: $numero</p>";
    echo "<p>Introduzca los elementos a tratar: </p>";
    echo "<form action='formulario_3.php' method='post'>";
    for ($i = 1; $i <= $numero; $i++) {
        echo "<input type='text' name='elemento$i' size=5 required>";
    }
    echo "<br><br><input type='submit' value='Enviar'>";
    echo "<button type='reset'>Borrar</button>";
    echo "</form>";
} else {
    echo "<p>El valor es incorrecto. Debe ser un número entero 1 y 10</p>";
}
echo "<a href='formulario_1.html'>Volver al inicio</a>";

?>