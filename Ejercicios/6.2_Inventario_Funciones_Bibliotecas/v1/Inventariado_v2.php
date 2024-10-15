<?php

// Funcion para obtener los productos de un inventario
function obtenerProductos($inventario) {
    return array_column($inventario, 'producto');
}

// Funcion para comparar dos inventarios
function compararInventarios($inventario1, $inventario2) {
    $productosInv1 = obtenerProductos($inventario1);
    $productosInv2 = obtenerProductos($inventario2);
    return array_diff($productosInv1, $productosInv2);
}

// Funcion para unir dos inventarios
function unirInventarios($inventario1, $inventario2) {
    return array_merge($inventario1, $inventario2);
}


// Funcion para contar productos por categoria
function contarPorCategoria($inventario_unido) {
    $categorias = array_column($inventario_unido, 'categoria');
    return array_count_values($categorias);
}

// Funcion para ordenar inventarios por precio
function ordenarPorPrecio($inventario) {
    $precios = array_column($inventario, 'precio');
    sort(array: $precios);
    $inventarioOrdenado = [];
    foreach ($precios as $precio) {
        foreach ($inventario as $elemento) {
            if ($elemento['precio'] == $precio) {
                $inventarioOrdenado[] = $elemento;
                break;
            }
        }
    }
    return $inventarioOrdenado;
}

// Función que elimina productos duplicados, suma cantidades y promedia los precios
function eliminarDuplicados($inventario) {
    $resultadoProductosEliminados = [];
    foreach ($inventario as $item) {
        $clave = $item['producto'] . '|' . $item['categoria'];

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

    return array_values($resultadoProductosEliminados); // Reindexar el array
}

// Función para dividir el inventario en secciones
function dividirInventarioEnSecciones($inventario, $num) {
    return array_chunk($inventario, $num);
}

// Función para generar un informe del inventario
function generarInforme($inventario) {
    $informe_inventario = [];
    foreach ($inventario as $item) {
        $informe_inventario[$item['producto']] = [
            "precio" => $item['precio_promedio'],
            "cantidad" => $item['total_cantidad'],
            "categoria" => $item['categoria'],
        ];
    }
    return $informe_inventario;
}

// Definir arrays para el inventario actual, proveedor A y proveedor B
$inventario_actual = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
    ["producto" => "Monitor", "precio" => 100, "categoria" => "Electrónica", "cantidad" => 3],
    ["producto" => "Silla", "precio" => 80, "categoria" => "Muebles", "cantidad" => 5],
];

$proveedor_a = [
    ["producto" => "Ratón", "precio" => 10, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 25, "categoria" => "Iluminación", "cantidad" => 15],
    ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
];

$proveedor_b = [
    ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
    ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
];

// Llamada a las funciones
$diferencias_proveedor_a = compararInventarios($inventario_actual, $proveedor_a);
$diferencias_proveedor_b = compararInventarios($inventario_actual, $proveedor_b);

$inventario_unido = unirInventarios($inventario_actual, $proveedor_a);
$inventario_unido = unirInventarios($inventario_unido, $proveedor_b);

$conteo_categorias = contarPorCategoria($inventario_unido);
$inventario_ordenado = ordenarPorPrecio($inventario_unido);
$inventario_sin_duplicados = eliminarDuplicados($inventario_unido);
$secciones_inventario = dividirInventarioEnSecciones($inventario_sin_duplicados, 2);
$informe_inventario = generarInforme($inventario_sin_duplicados);



// Mostrar resultados
echo "<pre>Diferencias con Proveedor A: "; print_r($diferencias_proveedor_a); echo "</pre>";

echo "<pre>Diferencias con Proveedor B: "; print_r($diferencias_proveedor_b); echo "</pre>";

echo "<pre>Inventario Unido sin eliminar duplicados: "; print_r($inventario_unido); echo "</pre>";

echo "<pre>Conteo de productos por categoría: "; print_r($conteo_categorias); echo "</pre>";

echo "<pre>Inventario Único eliminando duplicados, sumando cantidades y promediando precios: "; print_r($inventario_sin_duplicados); echo "</pre>";

echo "<pre>Secciones del Inventario: "; print_r($secciones_inventario); echo "</pre>";

echo "<pre>Informe del Inventario final: "; print_r($informe_inventario); echo "</pre>";

?>