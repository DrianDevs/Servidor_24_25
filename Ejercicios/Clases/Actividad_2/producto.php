<?php
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($id, $nombre, $precio, $stock = 0)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function disminuirStock($cantidad)
    {
        if ($this->stock - $cantidad >= 0) {
            $this->stock -= $cantidad;
            return true;
        } else {
            return false;
        }
    }
}


?>