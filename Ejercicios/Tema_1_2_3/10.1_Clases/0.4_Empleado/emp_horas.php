<?php

class EmpleadoPorHoras extends Empleado
{
    protected $horasTrabajadas;
    public function __construct(
        $nombre,
        $apellido,
        $salario,
        $horasTrabajadas
    ) {
        parent::__construct($nombre, $apellido, $salario);
        $this->horasTrabajadas = $horasTrabajadas;
    }
    public function calcularSueldo()
    {
        return $this->salario * $this->horasTrabajadas;
    }
}

?>