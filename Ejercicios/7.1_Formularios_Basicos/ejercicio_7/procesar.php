<?php
// Obtener los valores del formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$altura = $_POST['altura'];
$activo = $_POST['activo'];

// Comprobaciones de tipo
if (!is_string($nombre)) {
    echo 'El nombre no es una cadena';
    echo "<br>";
}

if (!is_int($edad) || $edad < 0) {
    echo 'La edad no es un número entero válido';
    echo "<br>";
}

if (!is_float($altura) || $altura < 0) {
    echo 'La altura no es un número flotante válido';
    echo "<br>";
}

if (!is_bool($activo)) {
    echo 'El activo no es un booleano';
    echo "<br>";
}

// Imprimir los valores y sus tipos
echo "Nombre: $nombre (tipo: " . gettype($nombre) . ")";
echo "Edad: $edad (tipo: " . gettype($edad) . ")";
echo "Altura: $altura (tipo: " . gettype($altura) . ")";
echo "Activo: $activo (tipo: " . gettype($activo) . ")";
?>