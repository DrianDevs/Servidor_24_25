<?php

	// Definición de variables
	$host = "localhost";
	$user = "dwes_tarde";
	$password = "dwes_2223";
	$bbdd = "dwes_tarde_itinerarios_formativos";


	/**
	 * FUNCIONES DE VALIDACIÓN
	**/

	/**
     * Método que devuelve valor de una clave del REQUEST limpia o cadena vacía si no existe
     * @param {string} - Clave del REQUEST de la que queremos obtener el valor
     * @return {string}
    **/
    function obtenerValorCampo(string $campo): string{
        if (isset($_REQUEST[$campo])){
            $valor = trim(htmlspecialchars($_REQUEST[$campo], ENT_QUOTES, "UTF-8"));
        }else{
            $valor = "";
        }
        return $valor;
    }

    /**
	 * Método que valida si un texto no está vacío
	 * @param {string} - Texto a validar
	 * @return {boolean}
	**/
	function validar_requerido(string $texto): bool
	{
		return !(trim($texto) == "");
	}
	
	/**
	 * Método que valida si es un número entero 
	 * @param {string} - Número a validar
	 * @return {bool}
	**/
    function validar_entero_limites(string $numero, int $limiteInferior , int $limiteSuperior): bool
    {
        return (filter_var($numero, FILTER_VALIDATE_INT,  ["options" => ["min_range" => $limiteInferior, "max_range" => $limiteSuperior]]) === FALSE) ? False : True;
    }

    /**
     * Método que valida si es un número entero positivo 
     * @param {string} - Número a validar
     * @return {bool}
    **/
    function validar_entero_positivo(string $numero): bool
    {
        return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE || $numero <= 0) ? False : True;
    }

	/**
	 * FIN FUNCIONES DE VALIDACIÓN
	**/

	/**
	 * FUNCIONES TRABAJAR CON BBDD
	**/
	function conectar_mysqli($host, $user, $password, $dbname) {

		// Conexión a la base de datos con MySQLi
  		try {
    		$conexionMySQLi = new mysqli ($host, $user, $password, $dbname);
  		} catch (mysqli_sql_exception $e) {
    		print "<p>Error: No puede conectarse con la base de datos.</p>";
    		print "<p>Error: ".$e->getMessage()."</p>";
    		exit();
  		}

		return $conexionMySQLi;
	}

	function conectar_pdo($host, $user, $password, $bbdd) {

        try {
          $mysql="mysql:host=$host;dbname=$bbdd;charset=utf8";
          $conexion = new PDO($mysql, $user, $password);
          // set the PDO error mode to exception
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        } catch (PDOException $exception) {
           exit($exception->getMessage());
        }
        return $conexion;
       
    }

	function cerrar_conexion ($conexion){
		$conexion->close();
	}

	function resultado_consulta ($conexion, $consulta) {
		$resultado = $conexion->query($consulta);
		return $resultado;
	}

	function liberar_resultado($resultado) {
		$resultado->free();
	}

	function cerrar_consulta($consulta) {
		$consulta->close();
	}
?>