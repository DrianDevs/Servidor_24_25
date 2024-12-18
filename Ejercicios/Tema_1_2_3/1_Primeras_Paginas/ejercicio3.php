<?php
$red = rand(0, 255);
$green = rand(0, 255);
$blue = rand(0, 255);
$color = "rgb($red, $green, $blue)";

$h1 = "<h1 style='color: $color;'>Hola</h1>";
echo $h1;
echo $color;
