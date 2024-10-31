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


if (isset($_GET['action']) && $_GET['action'] == 'add') {
    echo "<a href='index.php'>Continuar compra</a>";
    $id = $_GET['id'];

    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]++;
    } else {
        $_SESSION['carrito'][$id] = 1;
    }
}

if (isset($_POST['comprar'])) {
    $total = 0;

    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        foreach ($productos as $producto) {
            if ($producto['id'] == $id) {
                $total += $producto['precio'] * $cantidad;
            }
        }
    }

    echo "<br><br>";
    echo "Compra realizada con éxito. Total: $" . $total;

    $_SESSION['carrito'] = array();
} else {
    echo "<h1>Carrito de la compra</h1>";
    echo "<ul>";
    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        foreach ($productos as $producto) {
            if ($producto['id'] == $id) {
                echo "<li>";
                echo $producto['nombre'] . " x " . $cantidad . " = $" . $producto['precio'] * $cantidad;
                echo "</li>";
            }
        }
    }
    echo "</ul>";
    echo "<form action='' method='post'>";
    echo "<input type='submit' name='comprar' value='Finalizar compra'>";
    echo "</form>";
}

?>