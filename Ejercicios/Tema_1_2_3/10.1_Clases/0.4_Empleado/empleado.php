<?php
abstract class Empleado
{
    protected $nombre;
    protected $apellido;
    protected $salario;
    public function __construct($nombre, $apellido, $salario)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->salario = $salario;
    }
    abstract public function calcularSueldo();
    public function getInformacion()
    {
        $propiedades = get_object_vars($this);
        return json_encode($propiedades);
    }
    public function clonarEmpleado()
    {
        return clone $this;
    }
}
?>