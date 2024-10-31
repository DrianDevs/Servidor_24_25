<?php
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);

session_start();

$productos = array(
    array('id' => 1, 'nombre' => 'Producto 1', 'precio' => 10.99),
    array('id' => 2, 'nombre' => 'Producto 2', 'precio' => 9.99),
    array('id' => 3, 'nombre' => 'Producto 3', 'precio' => 12.99),
    array('id' => 4, 'nombre' => 'Producto 4', 'precio' => 8.99),
    array('id' => 5, 'nombre' => 'Producto 5', 'precio' => 11.99)
);


echo "<h1>Selecciona un producto</h1>";
echo "<ul>";
foreach ($productos as $producto) {
    echo "<li>";
    echo "<a href='carrito.php?action=add&id=" . $producto['id'] . "'>" . $producto['nombre'] . "</a>";
    echo "</li>";
}
echo "</ul>";

?>