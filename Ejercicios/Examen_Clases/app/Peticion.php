<?php
class Peticion
{
    private $clase;
    private $dia;
    private $accion;

    public function __construct()
    {

    }

    /**
     * Get the value of clase
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set the value of clase
     *
     * @return  self
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get the value of dia
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set the value of dia
     *
     * @return  self
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get the value of accion
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set the value of accion
     *
     * @return  self
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }
}

?>