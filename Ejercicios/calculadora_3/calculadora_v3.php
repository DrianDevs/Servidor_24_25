<?php
// Matriz de productos
$productos = [
    [
        "nombre" => "Lapiz",
        "cantidad" => 300,
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
define('LIMITE_CANTIDAD_ADICIONAL', 40); //Nueva contante : Representa la cantidad de unidades par recibir un descuento adicional


echo "<h1><strong>Resumen de la compra</strong></h1>";
$numTotalProductos = 0; //Variable que almacena la cantidad total de productos comprados
$total = 0; //Variable que almacena el precio final entre todos los productos

foreach ($productos as $producto) {
    $totalSinDescuento = 0;
    $totalConDescuento = 0;
    $descuento = 0;
    $numTotalProductos += $producto['cantidad'];



    $totalSinDescuento = $producto['cantidad'] * $producto['precio_unitario'];

    if ($totalSinDescuento > LIMITE_DESCUENTO) { // Aplicar el primer descuento si el total supera el límite
        $descuento = $totalSinDescuento * DESCUENTO_PEQUENO;
        $totalConDescuento = $totalSinDescuento - $descuento; // Calcular el total con el primer descuento
    }

    if ($producto['nombre'] === 'Lapiz') { //Si el producto es el lapiz, se aplica la oferta de 2x3 al precio con o sin descuento dependiendo del caso.
        echo "<p>¡OFERTA! > 3x2 en LAPICES. </p>";
        if ($totalConDescuento === 0) {
            $tercio = $totalSinDescuento / 3;
            $totalSinDescuento -= $tercio;
        } else {
            $tercio = $totalConDescuento / 3;
            $totalConDescuento -= $tercio;
        }
        if ($descuento > 0 && $tercio > 0) {
            echo "<p>¡Se ha recibido un descuento adicional junto a la oferta de lapices de 2x3!</p>";
        }
    }


    if ($descuento > 0) { // Formateados los totales con number_format()
        echo nl2br("<p>Nombre del producto: {$producto["nombre"]} \n Cantidad: {$producto["cantidad"]} \n Precio unitario: " . number_format($producto["precio_unitario"], 2) . "€\n Total sin descuento: " . number_format($totalSinDescuento, 2) . "€ \n Total con descuento: " . number_format($totalConDescuento, 2) . "€ \n");
        $total += $totalConDescuento;
    } else {
        echo nl2br("<p>Nombre del producto: {$producto["nombre"]} \n Cantidad: {$producto["cantidad"]} \n Precio unitario: " . number_format($producto["precio_unitario"], 2) . "€\n Total : " . number_format($totalSinDescuento, 2) . "€\n");
        $total += $totalSinDescuento;
    }

    if ($totalSinDescuento > LIMITE_COMPRA_GRANDE) {
        echo "<p>Es una compra <strong>GRANDE</strong> </p>";
    } else {
        echo "<p>Es una compra <strong>NORMAL</strong> </p>";
    }


    $promedio = $total / $producto['cantidad'];  // Calcular el precio promedio por producto
    echo "<p>Promedio por producto: " . number_format($promedio, 2) . "€</p>";

    echo "<p>---------------------------------</p>";

}

echo "<p>Cantidad total de productos: $numTotalProductos</p>";

if ($numTotalProductos % 2 == 0) {
    echo "<p>El número de productos es par</p>";
} else {
    echo "<p>El número de productos es impar</p>";
}
echo "<p>---------------------------------</p>";



if ($numTotalProductos > LIMITE_CANTIDAD_ADICIONAL) { //Aplicar descuento adicional si la cantidad total de productos supera un cierto límite
    echo "<p>¡Se ha recibido un descuento adicional del 5% por superar la cantidad de " . LIMITE_CANTIDAD_ADICIONAL . " unidades!</p>";
    $total *= 0.95;
    $iva = $total * 0.15;    // Calcular el IVA (Impuesto sobre el Valor Añadido)
    $totalAntiguo = $total;
    $total += $iva;         // Calcular el total con impuestos
    echo nl2br("<h2>Total a pagar: \n " . number_format($total, 2) . "€</h2>"); //Usado nl2br
    echo "<p>Total con descuento : " . number_format($totalAntiguo, 2) . "€ + IVA " . number_format($iva, 2) . "€ :</p>";
} else {
    $iva = $total * 0.15;
    $totalAntiguo = $total;  // Calcular el IVA (Impuesto sobre el Valor Añadido)
    $total += $iva;
    echo nl2br("<h2>Total a pagar: \n " . number_format($total, 2) . "€</h2>");
    echo "<p>Total: " . number_format($totalAntiguo, 2) . "€ + IVA " . number_format($iva, 2) . "€ :</p>";
}


?>