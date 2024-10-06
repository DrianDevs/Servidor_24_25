<?php
$inventarioActual = [
    ['producto' => 'Teclado', 'precio' => 20, 'categoria' => 'Electrónica', 'cantidad' => 4],
    ['producto' => 'Ratón', 'precio' => 15, 'categoria' => 'Electrónica', 'cantidad' => 10],
    ['producto' => 'Monitor', 'precio' => 100, 'categoria' => 'Electrónica', 'cantidad' => 3],
    ['producto' => 'Silla', 'precio' => 80, 'categoria' => 'Muebles', 'cantidad' => 5]
];

$inventarioProveedorA = [
    ['producto' => 'Ratón', 'precio' => 10, 'categoria' => 'Electrónica', 'cantidad' => 20],
    ['producto' => 'Lámpara', 'precio' => 25, 'categoria' => 'Iluminación', 'cantidad' => 15],
    ['producto' => 'Escritorio', 'precio' => 50, 'categoria' => 'Muebles', 'cantidad' => 2]
];

$inventarioProveedorB = [
    ['producto' => 'Monitor', 'precio' => 92, 'categoria' => 'Electrónica', 'cantidad' => 8],
    ['producto' => 'Auriculares', 'precio' => 30, 'categoria' => 'Electrónica', 'cantidad' => 20],
    ['producto' => 'Lámpara', 'precio' => 20, 'categoria' => 'Iluminación', 'cantidad' => 5]
];

//Comparar inventarios
$actualProductos = [];
foreach ($inventarioActual as $producto) {
    $actualProductos[] = $producto['producto'];
}

$proveedorAProductos = [];
foreach ($inventarioProveedorA as $producto) {
    $proveedorAProductos[] = $producto['producto'];
}

$proveedorBProductos = [];
foreach ($inventarioProveedorB as $producto) {
    $proveedorBProductos[] = $producto['producto'];
}

$diferenciasA = array_diff($actualProductos, $proveedorAProductos);
$diferenciasB = array_diff($actualProductos, $proveedorBProductos);

echo "<pre>";
echo "<p>Productos del inventario actual que no existen en el inventario del proveedor A</p>";
print_r($diferenciasA);
echo "</pre>";

echo "<pre>";
echo "<p>Productos del inventario actual que no existen en el inventario del proveedor B</p>";
print_r($diferenciasB);
echo "</pre>";

echo "<p>-------------------------</p>";

//Unir inventarios y eliminar duplicados 

//Union de solo los arrays de productos, de 1 sola dimension
$inventario_unido = array_merge($actualProductos, $proveedorAProductos, $proveedorBProductos);
$inventario_unido = array_unique($inventario_unido);
echo "<pre>";
echo "<p>Productos unicos</p>";
print_r($inventario_unido);
echo "</pre>";


//Union de los arrays de inventarios, multidimensionales
$inventario_unido = array_merge_recursive($inventarioActual, $inventarioProveedorA, $inventarioProveedorB);

$inventario_unido_unico = []; //La funcion array_unique no funciona con arrays multidimensionales, asi que lo hago manualmente con un bucle for
foreach ($inventario_unido as $producto) {
    $encontrado = false;
    foreach ($inventario_unido_unico as $producto_unico) {
        if ($producto['producto'] == $producto_unico['producto'] && $producto['categoria'] == $producto_unico['categoria']) {
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $inventario_unido_unico[] = $producto;
    }
}

echo "<pre>";
echo "<p>Inventarios unidos sin duplicados</p>";
print_r($inventario_unido_unico);
echo "</pre>";


echo "<p>-------------------------</p>";

//Contar productos por categoria

$categorias_contadas = array_count_values(array_column($inventario_unido_unico, 'categoria'));

echo "<pre>";
echo "<p>Categorias contadas</p>";
print_r($categorias_contadas);
echo "</pre>";


echo "<p>-------------------------</p>";

//Ordenar inventario por precio

$precios = array_column($inventario_unido_unico, 'precio');
asort($precios);


$inventario_ordenado = [];
foreach ($precios as $key => $precio) {
    $inventario_ordenado[] = $inventario_unido_unico[$key];
}

echo "<pre>";
echo "<p>Inventario ordenado por precios</p>";
print_r($inventario_ordenado);
echo "</pre>";

echo "<p>-------------------------</p>";

//Dividir en secciones

$secciones = array_chunk($inventario_unido_unico, 2);

echo "<pre>";
echo "<p>Inventario dividido en secciones de dos</p>";
print_r($secciones);
echo "</pre>";

echo "<p>-------------------------</p>";

//Buscar producto por nombre

$productoBuscar = "Auriculares";
$contador = 0;

foreach ($inventario_unido_unico as $producto) {
    if (strtolower($producto["producto"]) === strtolower($productoBuscar)) {
        $contador++;
    }
}

if ($contador === 0) {
    echo "<p>Producto no encontrado</p>";
} else {
    echo '<p>Producto encontrado: ' . $producto['producto'] . '</p>';
    echo '<p>Se encontraron ' . $contador . ' ocurrencias</p>';
}

echo "<p>-------------------------</p>";

//Reindexar el inventario

$elementos_vacios = array_fill(0, 3, array(
    'producto' => 'Ordenador',
    'precio' => 0,
    'categoria' => 'Electronica',
    'cantidad' => 0
));


$inventario_unido_unico = array_merge($inventario_unido_unico, $elementos_vacios);
$inventario_reindexado = array_values($inventario_unido_unico);


echo "<pre>";
echo "<p>Inventario rellenado y reindexado</p>";
print_r($inventario_reindexado);
echo "</pre>";

echo "<p>-------------------------</p>";

//Informe final 

echo "<h2>Informe de inventarios</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";


echo "<thead>";
echo "<tr>";
echo "<th>Producto</th>";
echo "<th>Precio</th>";
echo "<th>Categoría</th>";
echo "<th>Cantidad</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($inventario_unido_unico as $producto) {
    echo "<tr>";
    echo "<td>" . $producto['producto'] . "</td>";
    echo "<td>$" . $producto['precio'] . "</td>";
    echo "<td>" . $producto['categoria'] . "</td>";
    echo "<td>" . $producto['cantidad'] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>