<?php
abstract class Empleado
{
    private $nombre;
    private $apellido;
    private $salario;
    abstract public function calcularSueldo();
}
?>