<?php
// Convertir la clase a No Abstracta para hacer funcionar inicio.php
abstract class Soporte implements Resumible
{
    public $titulo;
    public $numero;
    private $precio;
    private const IVA = 0.21;
    public $alquilar;

    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
        $this->alquilar = false;
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
        echo "<br><br>";
        echo $this->titulo;
        echo "<br>";
        echo $this->precio . " € (IVA no incluido)";
    }
}
