<?php

$volumen = round(volumenCilindro(5, 2));
echo $volumen;
$array = [9, 8, 7, 6, 5, 4];
$array = eliminarElementosAleatorios($array, 2);


function volumenCilindro($altura, $radio)
{
    define('PI', 3.1416);
    return pow(PI, 2) * $altura * pow($radio, 2);
}

function suma($numero1, $numero2, $numero3)
{
    return $numero1 + $numero2 + $numero3;
}

function producto($numero1, $numero2, $numero3)
{
    return $numero1 * $numero2 * $numero3;
}


function eliminarElementosAleatorios($array, $numElementos = 1)
{
    for ($i = 0; $i < $numElementos; $i++) {
        $aleatorio = array_rand($array);
        unset($array[$aleatorio]);
    }
    return $array;
}


?>