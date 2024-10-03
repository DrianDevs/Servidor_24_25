<?php
// Matriz de productos
$productos = [
    [
        "nombre" => "Lápiz",
        "cantidad" => 1001,
        "precio_unitario" => 0.99
    ],
    [
        "nombre" => "Goma",
        "cantidad" => 20,
        "precio_unitario" => 0.49
    ],
    [
        "nombre" => "Cuaderno",
        "cantidad" => 10,
        "precio_unitario" => 7.99
    ]
];

// Constantes
define('DESCUENTO_PEQUENO', 0.1);
define('LIMITE_DESCUENTO', 50);
define('LIMITE_COMPRA_GRANDE', 100);


//Producto 1
$totalSinDescuento = 0;
$totalConDescuento = 0;
$descuento = 0;

$totalSinDescuento = $productos[0]['cantidad'] * $productos[0]['precio_unitario'];
if ($totalSinDescuento > LIMITE_DESCUENTO) {
    $descuento = $totalSinDescuento * DESCUENTO_PEQUENO;
    $totalConDescuento = $totalSinDescuento - $descuento;
}


echo "<h1><strong>Resumen de la compra</strong></h1>";
if ($descuento > 0) {
    echo nl2br("<p>Nombre: {$productos[0]["nombre"]} \n Cantidad: {$productos[0]["cantidad"]} \n Precio unitario: " . number_format($productos[0]["precio_unitario"], 2) . "€\n Total sin descuento: " . number_format($totalSinDescuento, 2) . "€ \n Total con descuento: " . number_format($totalConDescuento, 2) . "€ \n");
} else {
    echo nl2br("<p>Nombre: {$productos[0]["nombre"]} \n Cantidad: {$productos[0]["cantidad"]} \n Precio unitario: " . number_format($productos[0]["precio_unitario"], 2) . "€\n Total : " . number_format($totalSinDescuento, 2) . "€\n");
}



if ($totalSinDescuento > LIMITE_COMPRA_GRANDE) {
    echo "<p>Es una compra <strong>GRANDE</strong> </p>";
} else {
    echo "<p>Es una compra <strong>NORMAL</strong> </p>";
}

echo "<p>---------------------------------</p>";

//Producto 2
$totalSinDescuento = 0;
$totalConDescuento = 0;
$descuento = 0;

$totalSinDescuento = $productos[1]['cantidad'] * $productos[1]['precio_unitario'];
if ($totalSinDescuento > LIMITE_DESCUENTO) {
    $descuento = $totalSinDescuento * DESCUENTO_PEQUENO;
    $totalConDescuento = $totalSinDescuento - $descuento;
}


if ($descuento > 0) {
    echo nl2br("<p>Nombre: {$productos[1]["nombre"]} \n Cantidad: {$productos[1]["cantidad"]} \n Precio unitario: " . number_format($productos[1]["precio_unitario"], 2) . "€\n Total sin descuento: " . number_format($totalSinDescuento, 2) . "€ \n Total con descuento: " . number_format($totalConDescuento, 2) . "€ \n");
} else {
    echo nl2br("<p>Nombre: {$productos[1]["nombre"]} \n Cantidad: {$productos[1]["cantidad"]} \n Precio unitario: " . number_format($productos[1]["precio_unitario"], 2) . "€\n Total : " . number_format($totalSinDescuento, 2) . "€\n");
}



if ($totalSinDescuento > LIMITE_COMPRA_GRANDE) {
    echo "<p>Es una compra <strong>GRANDE</strong> </p>";
} else {
    echo "<p>Es una compra <strong>NORMAL</strong> </p>";
}

echo "<p>---------------------------------</p>";

//Producto 3
$totalSinDescuento = 0;
$totalConDescuento = 0;
$descuento = 0;

$totalSinDescuento = $productos[2]['cantidad'] * $productos[2]['precio_unitario'];
if ($totalSinDescuento > LIMITE_DESCUENTO) {
    $descuento = $totalSinDescuento * DESCUENTO_PEQUENO;
    $totalConDescuento = $totalSinDescuento - $descuento;
}


//Incluidas conversiones explicitas.
if ($descuento > 0) {
    echo nl2br("<p>Nombre: {$productos[2]["nombre"]} \n Cantidad: " . (float) $productos[2]["cantidad"] . " \n Precio unitario: " . (string) number_format($productos[2]["precio_unitario"], 2) . "€\n Total sin descuento: " . (string) number_format($totalSinDescuento, 2) . "€ \n Total con descuento: " . (string) number_format($totalConDescuento, 2) . "€ \n");
} else {
    echo nl2br("<p>Nombre: {$productos[2]["nombre"]} \n Cantidad: " . (float) $productos[2]["cantidad"] . "\n Precio unitario: " . (string) number_format($productos[2]["precio_unitario"], 2) . "€\n Total : " . (string) number_format($totalSinDescuento, 2) . "€\n");
}



if ($totalSinDescuento > LIMITE_COMPRA_GRANDE) {
    echo "<p>Es una compra <strong>GRANDE</strong> </p>";
} else {
    echo "<p>Es una compra <strong>NORMAL</strong> </p>";
}

echo "<p>---------------------------------</p>";
