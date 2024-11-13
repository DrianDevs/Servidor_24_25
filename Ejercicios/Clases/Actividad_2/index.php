<?php
require_once 'producto.php';

$producto = new Producto(1, 'Camiseta', 19.99, 10);

if ($producto->disminuirStock(5)) {
    echo "Venta realizada con éxito.";
} else {
    echo "No hay suficiente stock.";
}
?>