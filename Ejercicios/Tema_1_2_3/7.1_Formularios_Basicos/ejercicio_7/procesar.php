<?php
$nombre = $_GET['nombre'];
$edad = $_GET['edad'];
$altura = $_GET['altura'];
$activo = $_GET['activo'];


if (is_string($nombre)) {
    echo 'El nombre es una cadena';
    echo "<br>";
}

if (is_int($edad)) {
    echo 'La edad es un número entero';
    echo "<br>";
}

if (is_float($altura)) {
    echo 'La altura es un número flotante';
    echo "<br>";
}

if (is_bool($activo)) {
    echo 'El activo es un booleano';
    echo "<br>";
}
