<?php
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar un torneo</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
	<h1>Modificar un torneo</h1>

	<!--  
			ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
			Recuerda:
			- Comprueba que nos ha llegado el dato necesario (idTorneo) de la página "listado"
			- Conéctate a la BBDD y comprueba que el dato existe.
			- Si existe, será único, por lo que podrás obtener los datos directamente.
			- No olvides hacer las validaciones necesarias para validar los datos que modificamos del torneo

		-->

	<?php
	$errores = [];
	$nombreTorneo = $ciudad = $superficieId = "";

	//Comprobamos si se ha enviado el formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$idTorneo = obtenerValorCampo('id');
		$nombreTorneo = obtenerValorCampo('nombre_torneo');
		$ciudad = obtenerValorCampo('ciudad');
		$superficieId = obtenerValorCampo('superficie_id');

		// Validar nombre del torneo
		if (!validarLongitudCadena($nombreTorneo, 3, 60)) {
			$errores[] = "El nombre del torneo debe tener entre 3 y 60 caracteres.";
		}

		// Validar ciudad
		if (!validarLongitudCadena($ciudad, 3, 60)) {
			$errores[] = "La ciudad debe tener entre 3 y 60 caracteres.";
		}

		// Si no hay errores, actualizar el torneo en la base de datos
		if (empty($errores)) {
			try {
				$conexion = conectarPDO($database);

				$consulta = $conexion->prepare("UPDATE torneos SET nombre = :nombre_torneo, ciudad = :ciudad, superficie_id = :superficie_id WHERE id = :id_torneo");
				$consulta->bindParam(':nombre_torneo', $nombreTorneo, PDO::PARAM_STR);
				$consulta->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
				$consulta->bindParam(':superficie_id', $superficieId, PDO::PARAM_INT);
				$consulta->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
				$consulta->execute();

				echo "<h1>Torneo actualizado correctamente</h1>";
			} catch (PDOException $e) {
				echo "Error al actualizar el torneo: " . $e->getMessage();
			}
		}
	} else {
		// Obtener el id del torneo por GET
		$idTorneo = $_GET['idTorneo'];

		// Redirigir a la página de listado si no se recibe el id o no es válido
		if (empty($idTorneo) || !validarEnteroRango($idTorneo, 1, PHP_INT_MAX)) {
			header("Location: listado.php");
			exit();
		}

		// Consulta para obtener la información del torneo por id
		try {
			$conexion = conectarPDO($database);

			$consulta = $conexion->prepare("SELECT id, nombre, ciudad, superficie_id FROM torneos WHERE id = :id_torneo");
			$consulta->bindParam(':id_torneo', $idTorneo, PDO::PARAM_INT);
			$consulta->execute();

			// Verificar si el torneo existe
			if ($consulta->rowCount() === 0) {
				header("Location: listado.php");
				exit();
			}

			// Obtener los datos del torneo
			$torneo = $consulta->fetch(PDO::FETCH_ASSOC);
			$nombreTorneo = $torneo['nombre'];
			$ciudad = $torneo['ciudad'];
			$superficieId = $torneo['superficie_id'];
		} catch (PDOException $e) {
			echo "Error al hacer la consulta: " . $e->getMessage();
		}
	}
	?>







	<!--  
			ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
			Recuerda:
			- Si hay errores, los mostramos
		-->
	<!-- Formulario -->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo htmlspecialchars($idTorneo) ?>">
		<p>
			<!-- Campo nombre del torneo -->
			<input type="text" name="torneo" placeholder="Nombre torneo"
				value="<?php echo htmlspecialchars($nombreTorneo) ?>">
			<span style="color: red">
				<!-- ESCRIBA AQUI EL CÓDIGO PHP para mostrar el error -->

			</span>
		</p>
		<p>
			<!-- Campo ciudad del torneo -->
			<input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo htmlspecialchars($ciudad) ?>">
			<span style="color: red">
				<!-- ESCRIBA AQUI EL CÓDIGO PHP para mostrar el error -->

			</span>
		</p>
		<p>
			<!-- Campo superficie -->


			<?php

			$superficies = [];

			try {
				$conexion = conectarPDO($database);

				$consulta = $conexion->prepare("SELECT DISTINCT torneos.superficie_id, superficies.nombre FROM torneos JOIN superficies ON torneos.superficie_id = superficies.id;");
				$consulta->execute();

				while ($superficie = $consulta->fetch(PDO::FETCH_ASSOC)) {
					array_push($superficies, $superficie['nombre']);
				}

				$conexion = null;
			} catch (PDOException $e) {
				echo "Error al hacer la consulta: " . $e->getMessage();
			}
			?>







			<select id="superficie" name="superficie">
				<option value="">Seleccione Superficie</option>
				<!-- ESCRIBA AQUI EL CÓDIGO PHP PARA OBTENER LAS SUPERFICIES DE LA BBDD -->



				<option value="<?php echo $superficies[0] ?>" <?php /*ESCRIBA AQUI EL CÓDIGO PHP*/ ?> "selected" : "" ?>
					<?php echo $superficies[0] ?>
				</option>

				<option value="<?php echo $superficies[1] ?>" <?php /*ESCRIBA AQUI EL CÓDIGO PHP*/ ?> "selected" : "" ?>
					<?php echo $superficies[1] ?>
				</option>

				<option value="<?php echo $superficies[2] ?>" <?php /*ESCRIBA AQUI EL CÓDIGO PHP*/ ?> "selected" : "" ?>
					<?php echo $superficies[2] ?>
				</option>

				<!-- ESCRIBA AQUI EL CÓDIGO PHP -->

			</select>
			<span style="color: red">
				<!-- ESCRIBA AQUI EL CÓDIGO PHP para mostrar el error -->
			</span>
		</p>
		<p>
			<!-- Botón submit -->
			<input type="submit" value="Guadar">
		</p>
	</form>

	<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO. 
						Recuerda:
						- Conéctate a la BBDD.
						- Prepara la consulta para modificar el torneo. 
						- Ejecuta la consulta de modificación.
						- Vuelve a "listados"
					-->

</body>

</html>