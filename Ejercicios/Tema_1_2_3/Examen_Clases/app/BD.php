<?php
class BD
{
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = array(
            'admin' => 'admin',
            'usuario' => 'usuario'
        );
    }

    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
?>