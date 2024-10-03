<?php
echo "<h3>Ejercicio 1: Crea una matriz que contenga los nombres de cinco colores y luego imprime el tercer color en la matriz.</h3>";
$colores = ["azul", "rojo", "verde", "amarillo", "naranja"];
echo $colores[2];
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 2: Crea una matriz asociativa para almacenar información de un coche (marca, modelo, año) y luego imprime el valor del modelo.</h3>";
$coche = ["marca" => "Nissan", "modelo" => "Skyline GT-R", "nota" => 10];
echo "<p>Mi coche es de la marca $coche[marca] y modelo $coche[modelo]</p>";
echo "<p>----------------------------</p>";


echo "<h3>Ejercicio 3: Crea una matriz multidimensional que contenga información de tres estudiantes (nombre, edad, nota). Imprime el nombre del segundo estudiante.</h3>";
$estudiantes = [
    ["nombre" => "Leonardo", "edad" => 25, "nota" => 8],
    ["nombre" => "Miguel", "edad" => 18, "nota" => 7],
    ["nombre" => "Ana", "edad" => 65, "nota" => 10],
];
echo "<p>Segundo estudiante: " . $estudiantes[1]["nombre"] . "</p>";
echo "<p>----------------------------</p>";


echo "<h3>Ejercicio 4: Crea una matriz con los días de la semana y usa la función print_r() para imprimirla.</h3>";
$semana = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];
print_r($semana);
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 5: Crea una matriz con tres números y añade dos números más a la matriz</h3>";
$numeros = [1, 2, 3];
$numeros[] = 4;
$numeros[] = 5;
print_r($numeros);
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 6: Crea dos matrices, una con los nombres de tres frutas y otra con tres verduras. Únelas en una sola matriz.</h3>";
$frutas = ["manzana", "pera", "platano"];
$verduras = ["lechuga", "patata", "zanahoria"];
print_r(array_merge($frutas, $verduras));
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 7: Crea una matriz con tres valores, utiliza count() para mostrar cuántos elementos tiene</h3>";
$ropa = ["camiseta", "pantalon", "zapatos"];
echo "<p>Contador de elemementos de la matriz ropa: " . count($ropa) . "</p>";
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 8:  Crea una matriz con cinco números y elimina el tercer número usando unset().</h3>";
$numeros2 = [5, 6, 7, 8, 9];
unset($numeros2[2]);
print_r($numeros2);
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 9: Crea una matriz y luego copia sus valores a otra variable.</h3>";
$colores = ["azul", "rojo", "verde", "amarillo", "naranja"];
$coloresCopia = $colores;

print_r($colores);
echo "<br>";
print_r($coloresCopia);
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 10: Define una constante con el valor de la velocidad de la luz en metros por segundo y úsala para mostrarla en pantalla.</h3>";
define("VELOCIDADLUZ", 299792458);
echo "<p>La velocidad de la luz es " . VELOCIDADLUZ . " metros por segundo</p>";
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 11: Crea una constante para el nombre de una aplicación web y muestra su valor en un mensaje.</h3>";
define("CALCULADORAWEB", "CalculateJS");
echo "<p>El nombre de la app es " . CALCULADORAWEB . "</p>";
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 12: Usa la constante predefinida PHP_VERSION para mostrar la versión actual de PHP en la que se está ejecutando el script.</h3>";
echo "<p>La versión actual de PHP es " . PHP_VERSION . "</p>";
echo "<p>----------------------------</p>";

echo "<h3>Ejercicio 13: Crea un script que use get_defined_constants() para mostrar todas las constantes predefinidas disponibles en tu entorno PHP.</h3>";
print_r(get_defined_constants());
