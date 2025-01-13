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
    <title>Alta nuevo curso</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Alta de un nuevo curso</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$curso = "";
    	$grupos = "";
    	$plazas = "";
    	$itinerario = "";

    	if (count($_POST) > 0) {
		    
		    $comprobarValidacion = true;
		    
		    // Obtenemos el campo del nombre del curso, número de grupos, plazas e itinerario
		    $curso = obtenerValorCampo("nombre");
			$grupos = obtenerValorCampo("grupos");
			$plazas = obtenerValorCampo("plazas");
			$itinerario = obtenerValorCampo("itinerario");
			$limiteInferiorPlazas = 18;
			$limiteSuperiorPlazas = 30;
		    
	    	//-----------------------------------------------------
	        // Validaciones
	        //-----------------------------------------------------
	        // Nombre del curso
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
  	?>

  	<?php
  		if (!$comprobarValidacion || count($errores) > 0):
  
  	?>
  		<form action="<?php print htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
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
	            <!-- Campo itinerario del curso  -->
	            <select id="itinerario" name="itinerario">
	            	<option value="">Seleccione Itinerario</option>
	            <?php
	            	$conexion = conectar_pdo($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM itinerarios";
	            	
	            	$resultado = resultado_consulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $itinerario ? "selected" : "" ?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  					
  					$consulta = null;

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
			$insert = "insert into cursos (nombre, plazas, grupos, itinerario_id) values (:nombre, :plazas, :grupos, :itinerario)";

			// preparar la consulta
			$consulta = $conexion->prepare($insert);

			$consulta->bindParam(':nombre', $curso); 
			$consulta->bindParam(':plazas', $plazas);
			$consulta->bindParam(':grupos', $grupos);
			$consulta->bindParam(':itinerario', $itinerario); 
		 
			// ejecutar la consulta 
			if (!$consulta->execute()) {
    			print "Falló la ejecución: (" . $consulta->errno . ") " . $consulta->error;
			}

			$consulta = null;

			$conexion = null;
        	
        	// redireccionamos al listado de departamentos
  			header("Location: listado.php");
  			
    	endif;
    ?>
    
</body>
</html>