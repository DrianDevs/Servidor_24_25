<?php

//He usado concatenacion con ".", uso de variables dentro de cadenas, método number_format() y condicionales.

//Declaramos los variables
$producto = "Desatascador";
$cantidad = 3;
$precioUnitario = 30;
$descuento = 0;

//Calculamos el total sin el descuento
$totalSinDescuento = $cantidad * $precioUnitario;

//Comprobamos el precio, y aplicamos el descuento si cumple la condición
if ($totalSinDescuento > 50) {
    $descuento = ($totalSinDescuento * 10) / 100;
}

//Calculamos el precio final
$totalDescuento = $totalSinDescuento - $descuento;

//Si el precio ha sido reducido, mostramos el resumen de la compra con descuento y sin descuento. Si no, no mostramos esa información.
echo "<h1><strong>Resumen de la compra</strong></h1>";
if ($descuento > 0) {
    echo "<p>|| Nombre del producto: <strong>$producto</strong> || Cantidad: <strong>$cantidad</strong> || Precio por unidad: <strong>" . number_format($precioUnitario, 2) . "€ </strong> || Total sin descuento: <strong>" . number_format($totalSinDescuento, 2) . "€</strong> || Total con descuento: <strong>" . number_format($totalDescuento, 2) . "€</strong> ||</p>";
} else {
    echo "<p>|| Nombre del producto: <strong>$producto</strong> || Cantidad: <strong>$cantidad</strong> || Precio por unidad: <strong>" . number_format($precioUnitario, 2) . "</strong> || Total : <strong>" . number_format($totalDescuento, decimals: 2) . "</strong> ||</p>";
}


//Si supera los 100€, se considera una compra grande. 
if ($totalSinDescuento > 100) {
    echo "<p>|| Es una compra <strong>GRANDE</strong> ||</p>";
} else {
    echo "<p>|| Es una compra <strong>NORMAL</strong> ||</p>";
}
