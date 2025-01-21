<?php
/*
require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Crear un logger
$logger = new Logger('app');
$logger->pushHandler(new StreamHandler('logs/app.log', Logger::DEBUG));

// Crear un procesador para añadir el ID del usuario
$logger->pushProcessor(function ($record) {
    $record['extra']['user_id'] = 123;  // Añadir información adicional
    return $record;
});

// Generar un mensaje de prueba
$logger->info('Este es un mensaje informativo');
$logger->error('Este es un mensaje de error crítico');
*/

require '../vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\HtmlFormatter;
//use Monolog\Formatter\JsonFormatter;
use Monolog\Processor\IntrospectionProcessor;

// Crear el Logger
$log = new Logger("MiLogger");

// Configurar el manejador de archivos rotativos (logs)
//$rfh = new RotatingFileHandler("logs/milog.json", Logger::DEBUG);
$rfh = new RotatingFileHandler("logs/milog.html", Logger::DEBUG);

// Asignar el formateador al manejador
//$rfh->setFormatter(new JsonFormatter());
$rfh->setFormatter(new HtmlFormatter());

$log->pushProcessor(new IntrospectionProcessor());

// Añadir el manejador al logger
$log->pushHandler($rfh);

// Probar el logger
$log->info("Mensaje de prueba", ['usuario' => 'Juan', 'accion' => 'iniciar_sesion']);
