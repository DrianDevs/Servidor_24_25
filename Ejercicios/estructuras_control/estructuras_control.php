<?php

//Ejercicio 1
echo "<h2>Ejercicio 1</h2>";

$charInicialNumero = ord('a'); //Convertimos los caracteres a numeros para iterar sobre ellos
$charFinalNumero = ord('d');

for ($i = 1; $i <= 3; $i++) {
    echo "Sentencia de la variable \$i : $i<br>";
    for ($j_num = $charInicialNumero; $j_num <= $charFinalNumero; $j_num++) { //Iteramos del caracter 'a' a 'd' (en numeros)
        $j = chr($j_num); //Convertimos el numero a caracterer para mostrarlo
        echo "&nbsp;&nbsp;Sentencia de la variable \$j : $j<br>"; //"&nbsp;&nbsp;" agrega identacion al imprimir para que sea mas legible
    }
}

echo "<p>-------------------------------------</p>";

//Ejercicio 2
echo "<h2>Ejercicio 2</h2>";

for ($i = 1; $i <= 3; $i++) {
    $primerDado = rand(1, 6); //Tiramos el primer dado, que decidira cuantas veces tiramos el segundo dado
    echo "Sentencia del primer dado : $primerDado<br>";
    for ($j = 1; $j <= $primerDado; $j++) {
        $segundoDado = rand(1, 6); //Tiramos el segundo dado
        echo "&nbsp;&nbsp;Sentencia del segundo dado : $segundoDado<br>";
    }
}

echo "<p>-------------------------------------</p>";

//Ejercicio 3
echo "<h2>Ejercicio 3</h2>";

$numero = 6;
$factorial = 1;
for ($i = 1; $i <= $numero; $i++) {
    $factorial *= $i;
}
echo "<p>El factorial de $numero es: $factorial</p>";

?>