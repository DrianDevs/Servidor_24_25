<?php

require_once __DIR__ . '/vendor/autoload.php';
use Monologos\HolaMonolog;
use Monolog\Logger;

$holamonolog = new HolaMonolog(new Logger('MiLog'), 8);
$holamonolog->saludar();
$holamonolog->despedir();
?>