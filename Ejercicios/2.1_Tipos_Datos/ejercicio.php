<?php
//Ejercicio 1: Crea un script en PHP que declare y muestre diferentes tipos de datos: enteros, flotantes, cadenas y booleanos.
$entero = 5;
$cadena = "Patata";
$float = 55.66;
$aprender = true;

echo "<p>Entero: $entero </p>";
echo "<p>Cadena: $cadena </p>";
echo "<p>Float: $float </p>";
echo "<p>Booleano: $aprender </p>";


echo "<p>---------------------------------</p>";

//Ejercicio 2: Declara una cadena y realiza operaciones básicas como obtener su longitud, convertirla a mayúsculas y concatenarla con otra cadena.
$cad1 = "Hola";
$longitud = strlen($cad1);
$mayusculas = strtoupper($cad1);

echo "<p>Cadena : $cad1</p>";
echo "<p>La longitud de la cadena : $longitud</p>";
echo "<p>Cadena en mayúsculas : $mayusculas</p>";

$cad2 = " mundo";
$concatenado = $cad1 . $cad2;
echo "Cadena concatenada : $concatenado";


echo "<p>---------------------------------</p>";

//Ejercicio 3: Crea una cadena en la que incluyas comillas simples y dobles.
$cadena = "Comilla simple = ' Comilla doble = \"";
echo "<p>$cadena</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 4: Escribe dos cadenas, una con comillas simples y otra con comillas dobles, que incluyan una variable. Observa la diferencia.
$cadena = 'Pizza';
echo '<p>Hoy voy a comer $cadena</p>';
echo "<p>Hoy voy a comer $cadena</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 5: Crea una cadena que incluya código HTML y CSS, utilizando comillas correctamente.
$cadena = '<div style="background-color: #B0B6B8; padding: 10px; margin-right: 90%">
<h1 style="color: #91590f; text-align: center">Hola</h1>
</div>';
echo $cadena;


echo "<p>---------------------------------</p>";

//Ejercicio 6: Usa caracteres especiales como saltos de línea, tabulaciones o barras invertidas dentro de una cadena.
echo "<p>Esta linea tiene un salto de línea</p>" . PHP_EOL . "Soy una nueva linea con una barra invertida: \\</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 7: Concatenar dos cadenas y mostrar el resultado.
$cad1 = "Buenas ";
$cad2 = "tardes";
$cad1 .= $cad2;
echo "<p>$cad1</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 8: Modifica el script anterior para que el texto concatenado se muestre en líneas separadas.
$cad1 = "Buenas ";
$cad2 = "tardes";
$cad1 .= $cad2;
echo "<p>" . str_replace(" ", "<br>", $cad1) . "</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 9: Declara una variable y asígnale un valor. Luego, imprímela en pantalla.
$nombre = "Adrián";
print "<p>Me llamo $nombre</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 10: Usa varias variables en un cálculo simple y muestra el resultado.
$x = 10;
$y = 8;
$resultado = $x - $y;
echo "<p>La resta de $x y $y es $resultado</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 11: Concatenar una variable y una cadena en una sola línea de texto.
$x = 18;
$resultado = "Tengo " . $x . " anios.";
echo $resultado;


echo "<p>---------------------------------</p>";

//Ejercicio 12: Incluye una variable dentro de una cadena usando comillas dobles.
$nombre = "Esperanza";
echo "Soy la $nombre";


echo "<p>---------------------------------</p>";

//Ejercicio 13: Declara variables de diferentes tipos (entero, flotante, booleano) y muéstralas.
$entero = 5;
$float = 5.555;
$boolean = true;
echo "<p>$entero</p>";
echo "<p>$float</p>";
echo "<p>" . var_dump($boolean) . "</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 14: Realiza operaciones aritméticas básicas (suma, resta, multiplicación, división).
$entero = 5;
$float = 3.14;
$suma = $entero + $float;
$resta = $entero - $float;
$multiplicacion = $entero * $float;
$division = $entero / $float;
echo "<p>$entero + $float = $suma</p>";
echo "<p>$entero - $float = $resta</p>";
echo "<p>$entero * $float = $multiplicacion</p>";
echo "<p>$entero / $float = $division</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 15: Declara variables con nombres significativos y utiliza buenas prácticas para nombrarlas.
$nombreUsuario = "Adrián";
$userId = 123;
echo "<p>$nombreUsuario</p>";
echo "<p>$userId</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 16: Une variables y texto dentro de un echo.
$nombre = "Adrián";
$estudios = "DAW";
echo "Me llamo $nombre y estudio $estudios.";


echo "<p>---------------------------------</p>";

//Ejercicio 17: Declara una variable booleana y usa un if para mostrar un mensaje dependiendo de su valor.
$boolean = true;
if ($boolean) {
    echo "<p>El valor de la variable es true</p>";
} else {
    echo "<p>El valor de la variable es false</p>";
}


echo "<p>---------------------------------</p>";

//Ejercicio 18: Declara una variable entera y úsala en una operación.
$entero = 5;
$entero += 10;
echo "<p>Tras la suma, la variable ahora vale $entero</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 19: Realiza una operación binaria y muestra el resultado.
$int = 5;
$int2 = 10;
$suma = $int + $int2;
echo "<p>La suma de $int + $int2 = $suma</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 20: Usa una variable de tipo flotante y realiza una operación con ella.
$float = 5.5;
$float2 = 3.14;
$division = $float / $float2;
echo "<p>La división de $float / $float2 = $division</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 21: Declara una variable de cadena y manipúlala (mayúsculas, minúsculas).
$cadena = "Esperanza";
$mayusculas = strtoupper($cadena);
$minusculas = strtolower($cadena);
echo "<p>$mayusculas</p>";
echo "<p>$minusculas</p>";


echo "<p>---------------------------------</p>";

//Ejercicio 22: Convierte un número en una cadena y una cadena en un número.
$numero = 342;
$cadena = strval($numero);
echo $cadena;
echo "<br>";
$cadena = "167";
$numero = intval($cadena);
echo $numero;


echo "<p>---------------------------------</p>";

//Ejercicio 23: Convierte explícitamente una variable flotante en entera.
$float = 6.7;
$entero = (int)$float;
echo $entero;


echo "<p>---------------------------------</p>";

//Ejercicio 24: Realiza una operación entre diferentes tipos de datos (flotante y entero) y observa la conversión automática.
$entero = 5;
$float = 3.14;
$suma = $entero + $float;
echo "Resultado: $suma";


echo "<p>---------------------------------</p>";

//Ejercicio 25: Usa una variable como condicional lógica.
$boolean = true;
if ($boolean) {
    echo "La variable es true";
} else {
    echo "La variable es false";
}
