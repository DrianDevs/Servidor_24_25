<?php

$tienda = array(
    "producto" => array(
        0 => "Teclado",
        1 => "Raton",
        2 => "Monitor",
        3 => "Silla"
    ),
    "precio" => array(
        0 => 20,
        1 => 15,
        2 => 100,
        3 => 80
    ),
    "categoria" => array(
        0 => "Electronica",
        1 => "Electronica",
        2 => "Electronica",
        3 => "Muebles"
    )
);
$proveedor_a = array(
    "producto" => array(
        0 => "Raton",
        1 => "Lampara",
        2 => "Escritorio",
    ),
    "precio" => array(
        0 => 10,
        1 => 25,
        2 => 50,
    ),
    "categoria" => array(
        0 => "Electronica",
        1 => "Iluminacion",
        2 => "Muebles",
    )
);
$provedor_b = array(
    "producto" => array(
        0 => "Monitor",
        1 => "Auriculares",
        2 => "Lampara",
    ),
    "precio" => array(
        0 => 92,
        1 => 30,
        2 => 20,
    ),
    "categoria" => array(
        0 => "Electronica",
        1 => "Electronica",
        2 => "Iluminacion",
    )
);
/*
echo "<pre>";
print_r($tienda);
echo "</pre>";
echo "<pre>";
print_r($proveedor_a);
echo "</pre>";
echo "<pre>";
print_r($provedor_b);
echo "</pre>";
*/

echo "<p>Diferencia</p>";
echo "<p>---------------------------------</p>";
$diferencia = array_diff_key($tienda, $proveedor_a, $provedor_b);
echo "<pre>";
print_r($diferencia);
echo "</pre>";



//Comparar inventarios de diferentes proveedores.
//Unir y organizar las listas de productos.
//Eliminar productos duplicados.
//Contar cuántos productos hay de cada categoría
//Ordenar los productos por precio.
//Dividir el inventario de la tienda en secciones de 2 elementos cada uno
//Buscar y contar elementos en los arrays-->Buscar un producto específico en el inventario (por nombre)
//Reindexar inventario y mostrar los nuevos índices
//Dividir el inventario en secciones más manejables.
//Generar un informe estadístico del inventario actual (con claves como nombres de productos).

/*
Comparar inventarios (array_diff, array_diff_assoc, array_diff_key).
Unir inventarios (array_merge, array_merge_recursive).
Contar productos por categorías (array_count_values).
Ordenar productos por precio (asort, arsort).
Eliminar productos duplicados (array_unique).
Rellenar el inventario con nuevos productos (array_fill, range).
Dividir en secciones (array_chunk).
Generar informes.
*/

?>