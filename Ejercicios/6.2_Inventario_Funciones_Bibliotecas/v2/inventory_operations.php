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
?>