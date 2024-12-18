<?php
class CintaVideo extends Soporte
{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
        $this->alquilar = false;
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo "<br>Duración: " . $this->duracion . " minutos";
    }
}


?>