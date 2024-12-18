<?php
abstract class Vehiculo
{
    private $marca;
    private $modelo;
    private $anio;

    abstract public function calcularImpuesto();


}
?>