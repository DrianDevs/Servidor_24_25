<?php

namespace Driandevs\ProyectoVideoclub;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\IntrospectionProcessor;

class Cliente
{
    public string $nombre;
    private int $numero;
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    private int $maxAlquilerConcurrente;
    private $usuario;
    private $password;
    private Logger $logger;

    public function __construct($nombre, $numero, $usuario, $password, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        $this->logger = new Logger('VideoclubLogger');

        $handler = new RotatingFileHandler(__DIR__ . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'miLog.log', 0, Logger::DEBUG);
        $this->logger->pushHandler($handler);
        echo __DIR__ . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'miLog.log';

        // Manejador de salida de error
        $errorHandler = new StreamHandler('php://stderr', Logger::DEBUG);
        $this->logger->pushHandler($errorHandler);

        // Procesador de introspección
        $this->logger->pushProcessor(new IntrospectionProcessor(Logger::DEBUG));
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen()
    {
        echo "<br>Nombre: " . $this->nombre;
        echo "<br>Cantidad de alquileres:" . count($this->soportesAlquilados);
    }

    public function tieneAlquileres(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporteAlquilado) {
            if ($soporteAlquilado->numero == $s->numero) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool
    {
        if (!$this->tieneAlquileres($s) && $this->numSoportesAlquilados < $this->maxAlquilerConcurrente) {
            $this->numSoportesAlquilados++;
            array_push($this->soportesAlquilados, $s);
            $s->alquilar = true;
            $s->muestraResumen();
            echo "<br>Alquilado soporte a: $this->nombre<br>";
            return true;
        } else if ($this->tieneAlquileres($s)) {
            echo "<br>El cliente ya tiene alquilado el soporte $s->titulo <br>";
            return false;
        } else if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "<br>Este cliente ya tiene el máximo de alquileres permitidos<br>";
            return false;
        } else {
            echo "<br>No es posible alquilar.<br>";
            return false;
        }
    }

    public function devolver(int $numSoporte): bool
    {
        for ($i = 0; $i < count($this->soportesAlquilados); $i++) {
            if ($this->soportesAlquilados[$i]->numero == $numSoporte) {
                $this->soportesAlquilados[$i]->alquilar = false;
                unset($this->soportesAlquilados[$i]);
                $this->numSoportesAlquilados--;


                echo "<br>Se ha devuelto el soporte correctamente.";
                return true;
            }
        }
        echo "<br>No se encontró el soporte en los alquileres";
        return false;
    }

    public function listaAlquileres()
    {
        echo "<br>El cliente tiene " . $this->numSoportesAlquilados . " soporte alquilados";
        foreach ($this->soportesAlquilados as $soporte) {
            echo "<pre>";
            print_r($soporte);
            echo "</pre>";
        }
    }

    public function getAlquileres()
    {
        foreach ($this->soportesAlquilados as $soporte) {
            echo "<pre>";
            print_r($soporte);
            echo "</pre>";
        }
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
}
