<?php
namespace Monologos;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;

class HolaMonolog
{
    private Logger $miLog;
    private int $hora = 0;

    public function __construct($miLog, $hora)
    {
        //Logger
        $this->miLog = $miLog;

        $errorHandler = new StreamHandler('php://stderr', Logger::DEBUG);
        $errorHandler->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());

        $handler = new RotatingFileHandler(__DIR__ . '/logs/mi_log.log', 0, \Monolog\Logger::DEBUG);

        $this->miLog->pushHandler($handler);
        $this->miLog->pushHandler($errorHandler);

        //Hora
        if ($hora < 0 || $hora > 24) {
            $this->$miLog->warning('La hora proporcionada no es válida: ' . $hora);
            $this->$hora = 0;
        } else {
            $this->$hora = $hora;
        }
    }

    public function saludar()
    {
        if ($this->hora >= 6 && $this->hora < 12) {
            $this->miLog->info('Buenos días');
        } elseif ($this->hora >= 12 && $this->hora < 18) {
            $this->miLog->info('Buenas tardes');
        } else {
            $this->miLog->info('Buenas noches');
        }
    }

    public function despedir()
    {
        if ($this->hora >= 6 && $this->hora < 12) {
            $this->miLog->info('Hasta más tarde');
        } elseif ($this->hora >= 12 && $this->hora < 18) {
            $this->miLog->info('Hasta luego');
        } else {
            $this->miLog->info('Hasta mañana');
        }
    }
}
?>