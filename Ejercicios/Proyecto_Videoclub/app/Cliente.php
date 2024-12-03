<?php
require_once("../autoload.php");
class Cliente
{
    public string $nombre;
    private int $numero;
    public array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    private int $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
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
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte->getNumero() === $s->getNumero()) {
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

            echo "<br>Se ha alquilado correctamente.";
            return true;
        } else {
            echo "<br>No es posible alquilar.";
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
        echo "<br>No se ha podido devolver el soporte.";
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
}
?>