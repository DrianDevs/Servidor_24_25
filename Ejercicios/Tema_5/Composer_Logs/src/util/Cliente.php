<?php

namespace Dwes\Ejemplos\Model;

use Dwes\Ejemplos\Util\LogFactory;
use Monolog\Logger;

class Cliente
{
    private $codigo;
    private Logger $log;
    function __construct($codigo)
    {
        $this->codigo = $codigo;
        $this->log = LogFactory::getLogger();
    }
    /// ... resto del código
}
