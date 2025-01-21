<?php
require 'vendor/autoload.php'; // Incluye Monolog y sus dependencias

use Driandevs\App\ProductoManager;
//require '../app/ProductoManager.php';


// Crear una instancia del gestor de productos
$productoManager = new ProductoManager();

// Intentar buscar un producto que no existe
$productoManager->buscarProducto(123);

// Crear un producto nuevo
$productoManager->crearProducto("Laptop", 999.99);
