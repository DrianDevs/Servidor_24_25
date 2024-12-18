<?php
class Coche
{
    private $marca;
    private $modelo;
    private $velocidad;

    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = 0;
    }

    public function acelerar($cantidad)
    {
        $this->velocidad += $cantidad;
    }

    public function frenar($cantidad)
    {
        if ($this->velocidad - $cantidad >= 0) {
            $this->velocidad -= $cantidad;
        } else {
            $this->velocidad = 0;
        }
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }
}
?>