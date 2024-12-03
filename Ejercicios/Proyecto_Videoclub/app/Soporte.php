<?php
class Soporte implements Resumible
{
    public $titulo;
    public $numero;
    private $precio;
    private const IVA = 0.21;
    public $alquilar = false;

    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;

    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIVA()
    {
        return $this->precio * (1 + self::IVA);
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function muestraResumen()
    {
        echo "<br>";
        echo $this->titulo;
        echo "<br>";
        echo $this->precio . " € (IVA no incluido)";
    }
}


?>