<?php
require_once 'coche.php';

$coche = new Coche('Kia', 'Picanto');
$coche->acelerar(50);
echo "<p>Velocidad actual: " . $coche->getVelocidad() . " km/h</p>";
$coche->frenar(20);
echo "<p>Velocidad actual: " . $coche->getVelocidad() . " km/h</p>";
$coche->frenar(1000);
echo "<p>Velocidad actual: " . $coche->getVelocidad() . " km/h</p>";
$coche->acelerar(1000);
echo "<p>Velocidad actual: " . $coche->getVelocidad() . " km/h</p>";
?>