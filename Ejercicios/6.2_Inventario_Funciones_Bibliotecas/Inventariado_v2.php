<?php

// Definir arrays para el inventario actual, proveedor A y proveedor B
$inventario_actual = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
    ["producto" => "Monitor", "precio" => 100, "categoria" => "Electrónica", "cantidad" => 3],
    ["producto" => "Silla", "precio" => 80, "categoria" => "Muebles", "cantidad" => 5],
];

// VOY CONFIRMANDO QUE LA PROGRAMACIÓN ES CORRECTA//
//echo "<pre>"; print_r($inventario_actual); echo "</pre>";
$proveedor_a = [
    ["producto" => "Ratón", "precio" => 10, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 25, "categoria" => "Iluminación", "cantidad" => 15],
    ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
];
// VOY CONFIRMANDO QUE LA PROGRAMACIÓN ES CORRECTA//
//echo "<pre>"; print_r($proveedor_a); echo "</pre>";

$proveedor_b = [
    ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
    ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
];
// VOY CONFIRMANDO QUE LA PROGRAMACIÓN ES CORRECTA//
//echo "<pre>"; print_r($proveedor_b); echo "</pre>";


//Funcion que compara dos arrays por la columna pasada por parametro. Devuelve la diferencia en forma de array
function compararMatricesPorCategoria(array $array1, array $array2, string $categoria)
{
    $categoriaArray1 = array_column($array1, $categoria);
    $categoriaArray2 = array_column($array2, $categoria);
    return array_diff($categoriaArray1, $categoriaArray2);
}

$diferencias_proveedor_a = compararMatricesPorCategoria($inventario_actual, $proveedor_a, 'producto');
$diferencias_proveedor_b = compararMatricesPorCategoria($inventario_actual, $proveedor_b, 'producto');

echo "<pre>";
print_r(nl2br("Imprimo por pantalla las diferencias del inventario actual con el proveedor_a \n"));
print_r($diferencias_proveedor_a);
echo "</pre>";
echo "<pre>";
print_r(nl2br("Imprimo por pantalla las diferencias del inventario actual con el proveedor_b \n"));
print_r($diferencias_proveedor_b);
echo "</pre>";
echo "<p>----------------------</p>";



// Funcion que recibe 3 arrays y los une. Devuelve un array con la union.

function unirMatrices(array $array1, array $array2, array $array3)
{
    return array_merge($array1, $array2, $array3);
}


$inventario_unido = unirMatrices($inventario_actual, $proveedor_a, $proveedor_b);
echo "<pre>";
print_r(nl2br("Inventarios unidos sin eliminar duplicados \n"));
print_r($inventario_unido);
echo "</pre>";
echo "<p>----------------------</p>";


// Funcion que cuenta productos por categoría pasadas por parametro
function contarPorCategorias(array $array1, string $categoria)
{
    $categorias = array_column($array1, $categoria);
    return array_count_values($categorias);
}

$conteo_categorias = contarPorCategorias($inventario_unido, 'categoria');
echo "<pre>";
print_r(nl2br("Conteo de categorías \n"));
print_r($conteo_categorias);
echo "</pre>";



// Extraer los precios

function extraerPrecios(array $array1, string $columna)
{
    return array_column($array1, $columna);
}
;
$precios = extraerPrecios($inventario_unido, 'precio');

// Ordenar los precios y aplicar ese orden al array de productos unidos
sort($precios);
$array_ordenado = array();
foreach ($precios as $precio) {
    foreach ($inventario_unido as $elemento) {
        if ($elemento['precio'] == $precio) {
            $array_ordenado[] = $elemento;
            break;
        }
    }
}
// Imprimir el array ordenado por precio , aun con todos los elementos sin agrupar
//echo "<pre>"; print_r(nl2br("Imprimir el array ordenado \n"));print_r($array_ordenado); echo "</pre>";

// Eliminar productos duplicados
$resultadoProductosEliminados = [];
foreach ($inventario_unido as $item) {
    $clave = $item['producto'] . '|' . $item['categoria']; // Crear una clave única por producto y categoría

    if (!isset($resultadoProductosEliminados[$clave])) {
        $resultadoProductosEliminados[$clave] = [
            'producto' => $item['producto'],
            'categoria' => $item['categoria'],
            'total_precio' => 0,
            'total_cantidad' => 0,
        ];
    }

    $resultadoProductosEliminados[$clave]['total_precio'] += $item['precio'] * $item['cantidad'];
    $resultadoProductosEliminados[$clave]['total_cantidad'] += $item['cantidad'];
}
foreach ($resultadoProductosEliminados as $clave => $datos) {
    $resultadoProductosEliminados[$clave]['precio_promedio'] = $datos['total_precio'] / $datos['total_cantidad'];
    unset($resultadoProductosEliminados[$clave]['total_precio']);

}
$resultadoProductosEliminados = array_values($resultadoProductosEliminados); // Reindexar el array
//Imprimo el array acumulado eliminando duplicados, sumando cantidades y promediando precios
//echo "<pre>"; print_r(nl2br("Imprimo por pantalla el resultado de acceder acumular en una única matriz todo el inventariado \n"));var_dump($resultadoProductosEliminados); echo "</pre>";

// Dividir en secciones
$secciones_inventario = array_chunk($resultadoProductosEliminados, 2);
//echo "<pre>"; print_r(nl2br("Secciones \n"));print_r($secciones_inventario ); echo "</pre>";


// Generar informe
$informe_inventario = [];
foreach ($resultadoProductosEliminados as $item) {
    $informe_inventario[$item['producto']] = [
        "precio" => $item['precio_promedio'],
        "cantidad" => $item['total_cantidad'],
        "categoria" => $item['categoria'],
    ];
}


// Mostrar resultados
echo "<pre>Diferencias con Proveedor A: ";
print_r($diferencias_proveedor_a);
echo "</pre>";

echo "<pre>Diferencias con Proveedor B: ";
print_r($diferencias_proveedor_b);
echo "</pre>";

echo "<pre>Inventario Unido sin eliminar duplicados: ";
print_r($inventario_unido);
echo "</pre>";

echo "<pre>Conteo de productos por categoría: ";
print_r($conteo_categorias);
echo "</pre>";

echo "<pre>Inventario Único eliminando duplicados , sumando cantidades y promediando precios: ";
print_r($resultadoProductosEliminados);
echo "</pre>";

echo "<pre>Secciones del Inventario: ";
print_r($secciones_inventario);
echo "</pre>";

echo "<pre>Informe del Inventario final: ";
print_r($informe_inventario);
echo "</pre>";

?>