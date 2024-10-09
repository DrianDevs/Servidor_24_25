<?php
//Ejercicio 1: Cálculo de área y perímetro de un rectángulo
//Escribe un script que calcule el área y el perímetro de un rectángulo dados el ancho y el alto

$base = 5;
$altura = 3;

$area = $base * $altura;
$perimetro = 2 * ($base + $altura);

echo "<p>El área del rectángulo es: $area</p>";
echo "<p>El perímetro del rectángulo es: $perimetro</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 2: Calcular el resto y cociente de dos números
//Dado dos números enteros, calcula el cociente y el resto de la división.

$num1 = 10;
$num2 = 3;

$cociente = $num1 / $num2;
$resto = $num1 % $num2;

echo "<p>Cociente: $cociente</p>";
echo "<p>Resto: $resto</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 3: Pre-incremento y post-incremento
//Crea un script que muestre la diferencia entre el pre-incremento y el post-incremento.
$original = 5;

echo "<h4>Pre-incremento</h4>";
echo "<p>Antes del incremento: $original</p>";
$copia = ++$original;
echo "<p>Después del incremento: Original = $original, Copia = $copia</p>";


$original = 5;
echo "<h4>Post-incremento</h4>";
echo "<p>Antes del incremento: $original</p>";
$copia = $original++;
echo "<p>Despues del incremento: Original = $original, Copia = $copia</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 4: Redondeo de un número
//Utiliza la función round() para redondear un número a 2 decimales.

$pi = 3.141592;
echo "<p>El número redondeado $pi con 2 decimales es: " . round($pi, 2) . "</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 5:  Calcular potencias
//Escribe un script que calcule y muestre el valor de 3 elevado a la 4ta potencia usando el operador **.

$base = 3;
$exponente = 4;
$resultado = $base ** $exponente;
echo "<p>3 elevado a la 4ta es: $resultado</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 6: Número aleatorio
//Genera un número aleatorio entre 1 y 50 usando mt_rand().

echo "<p>Número aleatorio entre 1 y 50: " . mt_rand(1, 50) . "</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 7: Conversión de tipos con operadores de comparación
//Compara un número entero con una cadena de texto usando === y == para mostrar la diferencia.

$numero = 5;
$cadena = "5";

echo "<h4>Comparación estricta</h4>";
echo $numero === $cadena ? "<p>$numero y $cadena tienen mismo tipo y valor</p>" : "<p>$numero y $cadena no tienen mismo tipo y valor</p>";

echo "<h4>Comparación no estricta</h4>";
echo $numero == $cadena ? "<p>$numero y $cadena tienen el mismo valor</p>" : "<p>$numero y $cadena no tienen el mismo valor</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 8: Formatear un número con separador de miles y decimales
//Usa number_format() para mostrar un número con separador de miles y 3 decimales.

$numero = 766666.84924;
echo "<p>" . number_format($numero, 3) . "</p>";

echo "<p>---------------------------------</p>";

//Ejercicio 9: Evaluar expresiones con operadores lógicos
//Usa operadores lógicos para determinar si un número está entre 10 y 20.

$numero = 17;
echo ($numero >= 10 && $numero <= 20 ? "<p>$numero está entre 10 y 20.</p>" : "</p>$numero no está entre 10 y 20.</p>");

echo "<p>---------------------------------</p>";

//Ejercicio 10: Incremento de caracteres
//Muestra cómo se comporta el incremento en caracteres con el operador ++.

$cadena = 'A';
echo "<p> Cadena original: $cadena</p>";

$cadena++;
echo "<p> Cadena incrementada (siguiente caracter ASCII): $cadena</p>";

?>