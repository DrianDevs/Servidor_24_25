<?php
    // Inclusión de funciones
    require_once("../funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar un curso</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Modificación de un curso</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$idCurso = 0;
    	$limiteInferiorPlazas = 15;
    	$limiteSuperiorPlazas = 28;
    	
    	if (count($_REQUEST) > 0) {

    		if (isset($_REQUEST["idCurso"])) {
            	$idCurso = $_REQUEST["idCurso"];

            	//Obtenemos los datos del curso
            	$conexion = conectar_pdo($host, $user, $password, $bbdd);

        		// consulta a ejecutar
        		$select = "SELECT nombre, grupos, plazas, itinerario_id FROM cursos WHERE id = ?";

		        // preparar la consulta
		        $consulta = $conexion->prepare($select);

		        // parámetro
		        $consulta->bindParam(1, $idCurso); 

		        // ejecutar la consulta 
		        $consulta->execute();

		        // Obtenemos el resultado
		        $registro = $consulta->fetch();
		        
		        $curso = $registro['nombre'];
		        $grupos = $registro['grupos'];
		        $plazas = $registro['plazas'];
		        $itinerario = $registro['itinerario_id'];
		        
		        $consulta = null;

		        $conexion = null;

            } else {
		    
			    $comprobarValidacion = true;
			    
			    // Obtenemos el campo del nombre del curso, número de grupos, plazas e itinerario
			    $idCurso = obtenerValorCampo("id");
			    $curso = obtenerValorCampo("nombre");
			    $grupos = obtenerValorCampo("grupos");
			    $plazas = obtenerValorCampo("plazas");
			    $itinerario = obtenerValorCampo("itinerario");
			    
		    	//-----------------------------------------------------
		        // Validaciones
		        //-----------------------------------------------------
		        // Nombre del curso
		        if (!validar_requerido($curso)) {
		            $errores["curso"] = "El nombre del curso es obligatorio.";
		        } 

		        // Número de grupos del curso
		        if (!validar_entero_positivo($grupos)) {
		            $errores["grupos"] = "El número de grupos debe ser un número entero positivo.";
		        } 

		        // Número de plazas del curso
		        if (!validar_entero_limites($plazas, $limiteInferiorPlazas, $limiteSuperiorPlazas)) {
		            $errores["grupos"] = "El número de plazas debe ser un número comprendido entre $limiteInferiorPlazas y $limiteSuperiorPlazas.";
		        } 

		        // Nombre del itineario
		        if (!validar_requerido($itinerario)) {
		            $errores["itinerario"] = "El nombre del itinerario es obligatoria.";
		        }
			}
		    
    	} else {

    		// redireccionamos al listado de sedes si se accede directamente
  			header("Location: listado.php");
  			exit();
    	}
  	?>

  	<?php
  		if (!$comprobarValidacion || count($errores) > 0):
  
  	?>
  		<form action="<?php print htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	<input type="hidden" name="id" value="<?php echo $idCurso?>">
	    	<p>
	            <!-- Campo nombre del curso -->
	            <input type="text" name="nombre" placeholder="Curso" value="<?php echo $curso ?>">
	            <?php
	            	if (isset($errores["curso"])):
	            ?>
	            	<p class="error"><?php echo $errores["curso"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo número de grupos del curso -->
	            <input type="number" name="grupos" placeholder="Número de grupos" value="<?php echo $grupos ?>">
	            <?php
	            	if (isset($errores["grupos"])):
	            ?>
	            	<p class="error"><?php echo $errores["grupos"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo número de plazas del curso -->
	            <input type="number" name="plazas" placeholder="Número de plazas" value="<?php echo $plazas ?>">
	            <?php
	            	if (isset($errores["plazas"])):
	            ?>
	            	<p class="error"><?php echo $errores["plazas"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo itinerario del curso -->
	            <select id="itinerario" name="itinerario">
	            	<option value="">Seleccione Itinerario</option>
	            <?php
	            	$conexion = conectar_pdo($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM itinerarios";
	            	
	            	$resultado = resultado_consulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>"  <?php echo $row["id"] == $itinerario ? "selected" : "" ?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  				
					$resultado = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["itinerario"])):
	            ?>
	            	<p class="error"><?php echo $errores["itinerario"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Botón submit -->
	            <input type="submit" value="Guadar">
	        </p>
	    </form>
  	<?php
  		else:
  			$conexion = conectar_pdo($host, $user, $password, $bbdd);

			// consulta a ejecutar
			$insert = "update cursos set nombre = :nombre, grupos = :grupos, plazas = :plazas, itinerario_id = :itinerario WHERE id = :idCurso";

			// preparar la consulta
			$consulta = $conexion->prepare($insert);

			$consulta->bindParam(':nombre', $curso); 
			$consulta->bindParam(':grupos', $grupos);
			$consulta->bindParam(':plazas', $plazas);
			$consulta->bindParam(':itinerario', $itinerario); 
			$consulta->bindParam(':idCurso', $idCurso); 
		
			// ejecutar la consulta 

			if (!$consulta->execute()) {
    			print "Falló la ejecución: (" . $consulta->errno . ") " . $consulta->error;
			}

			$consulta = null;

			$conexion = null;

        	// redireccionamos al listado de cursos
  			header("Location: listado.php");
  			
    	endif;
    ?>
    
</body>
</html>