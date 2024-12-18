<?php

class EmpleadoTiempoCompleto extends Empleado
{
    public function calcularSueldo()
    {
        return $this->salario;
    }
}

?>