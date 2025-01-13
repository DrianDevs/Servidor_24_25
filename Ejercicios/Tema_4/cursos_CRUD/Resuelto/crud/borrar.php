<?php
    // Inclusión de funciones
    require_once("../funciones.php");

    if (count($_REQUEST) > 0) {

	    if (isset($_REQUEST["idCurso"])) {
	    	$idCurso = $_REQUEST["idCurso"];

	    	$conexion = conectar_pdo($host, $user, $password, $bbdd);

			// consulta a ejecutar
			$delete = "DELETE FROM cursos where id = ?";

			// preparar la consulta
			$consulta = $conexion->prepare($delete);
			
			$consulta->bindParam(1, $idCurso); 

			// ejecutar la consulta 
			try {
				$consulta->execute();
				$exito = true;
			} catch (PDOException $exception) {
				$exito = false;
			}
			
			$consulta = null;

			$conexion = null;

        	if ($exito) {
        		print "<h2>Curso eliminado con éxito.</h2>";
        	} else {
        		print "<h2>No se ha podido eliminar el curso ya que tiene alumnos asociados.</h2>";
        	}
        	
	    	header("refresh:3;url=listado.php");
	    	exit();

	    } else {
		
			// redireccionamos al listado de cursos si se nos llega el id del curso
	  		header("Location: listado.php");
	  		exit();
    	
		}
	} else {
		
		// redireccionamos al listado de cursos si se accede directamente
  		header("Location: listado.php");
  		exit();
    	
	}
?>