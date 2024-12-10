<?php
class Videoclub
{
    private string $nombre;
    private array $productos = [];
    private int $numProductos = 0;
    private array $socios = [];
    private int $numSocios = 0;
    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $soporte)
    {
        array_push($this->productos, $soporte);
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $numero = count($this->productos) + 1;
        $cintavideo = new CintaVideo($titulo, $numero, $precio, $duracion);
        $this->incluirProducto($cintavideo);

        return $this; //Si se devuelve this, se permite el encadenamiento de métodos a partir de este
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $numero = count($this->productos) + 1;
        $dvd = new Dvd($titulo, $numero, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);

        return $this;
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $numero = count($this->productos) + 1;
        $juego = new Juego($titulo, $numero, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);

        return $this;
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3, $usuario, $password)
    {
        $numero = count($this->socios) + 1;
        $socio = new Cliente($nombre, $numero, $maxAlquileresConcurrentes, $usuario, $password);

        array_push($this->socios, $socio);
        $this->numSocios++;

        return $this;
    }

    public function listarProductos()
    {
        echo "<p>--------------- Mostrando todos los productos : ---------------";
        foreach ($this->productos as $producto) {
            echo "<pre>";
            print_r($producto);
            echo "</pre>";
        }
        return $this->productos;
    }

    public function listarSocios()
    {
        echo "<p>--------------- Mostrando todos los socios : ---------------";
        foreach ($this->socios as $socio) {
            echo "<pre>";
            print_r($socio);
            echo "</pre>";
        }
        return $this->socios;
    }

    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        $cliente = $this->socios[$numeroCliente - 1]; //-1 ya que el indice del cliente es 1 menos que su numero
        $soporte = $this->productos[$numeroSoporte - 1];
        $cliente->alquilar($soporte);
        return $this;
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
    {
        $alquilar = true;
        foreach ($numerosProductos as $numProducto) {
            for ($i = 0; $i < count($this->productos); $i++) {
                if ($this->productos[$i]->numero === $numProducto && $this->productos[$i]->alquilar === true) {
                    $alquilar = false;
                }
            }
        }
        if ($alquilar) {
            foreach ($numerosProductos as $numProducto) {
                $this->alquilaSocioProducto($numSocio, $numProducto);
                $this->numProductosAlquilados++;
                $this->numTotalAlquileres++;
            }
        } else {
            echo "<p>No se ha podido alquilar alguno de los productos, ya que ya está alquilado.</p>";
        }

    }

    public function actualizarSocio()
    {
        //Falta el cuerpo
    }

    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

    public function getSocios()
    {
        return $this->socios;
    }
}
?>