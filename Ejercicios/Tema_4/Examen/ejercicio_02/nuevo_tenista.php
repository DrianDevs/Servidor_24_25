<?php
require_once("../utiles/config.php");
require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta nuevo tenista</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
	<h1>Alta de un nuevo tenista</h1>

	<!--  
		ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
		Recuerda:
		- Crea las variables que vas a utilizar para recibir los datos del formulario y validar los datos recibidos.
		- Comprobar si hemos accedido por POST ($_SERVER["REQUEST_METHOD"] == "POST").
		- Usa la función "obtenerValorCampo" con los datos recibidos.
		- Validar: Nombre, apellidos, altura...y crea los mensajes en caso de que no cumplan los requisitos.
		- Mostrar el formulario y errores si hay.

	-->


	<?php
	$errores = [];
	$nombre = $apellidos = $altura = $mano = $anno_nacimiento = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['torneo'])) {
		$nombre = obtenerValorCampo('nombre');
		$apellidos = obtenerValorCampo('apellidos');
		$altura = obtenerValorCampo('altura');
		$mano = obtenerValorCampo('mano');
		$anno_nacimiento = obtenerValorCampo('anno_nacimiento');

		if (!validarLongitudCadena($nombre, 3, 50)) {
			$errores['nombre'] = "El nombre debe tener entre 3 y 50 caracteres.";
		}

		if (!validarLongitudCadena($apellidos, 5, 100)) {
			$errores['apellidos'] = "Los apellidos deben tener entre 5 y 100 caracteres.";
		}

		if (!validarEnteroRango($altura, 120, 250)) {
			$errores['altura'] = "La altura debe ser un número entero entre 120 y 250.";
		}

		if (!in_array($mano, ['Diestro', 'Zurdo'])) {
			$errores['mano'] = "La mano debe ser 'derecha' o 'izquierda'.";
		}

		// Si no hay errores, insertar el tenista en la base de datos
		if (empty($errores)) {
			try {
				$conexion = conectarPDO($database);

				$consulta = $conexion->prepare("INSERT INTO tenistas (nombre, apellidos, altura, mano, anno_nacimiento) VALUES (:nombre, :apellidos, :altura, :mano, :anno_nacimiento)");
				$consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$consulta->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
				$consulta->bindParam(':altura', $altura, PDO::PARAM_INT);
				$consulta->bindParam(':mano', $mano, PDO::PARAM_STR);
				$consulta->bindParam(':anno_nacimiento', $anno_nacimiento, PDO::PARAM_INT);
				$consulta->execute();

				echo "<h1>Tenista insertado correctamente</h1>";
			} catch (PDOException $e) {
				echo "Error al insertar el tenista: " . $e->getMessage();
			}
		}
	}
	?>

	<!-- Formulario -->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<p>
			<!-- Campo nombre del tenista -->
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" value="">
			<span style="color: red">
				<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN EL NOMBRE
					-->

				<?php
				if (isset($errores['nombre'])) {
					echo $errores['nombre'];
				}
				?>
			</span>
		</p>
		<p>
			<!-- Campo apellidos del tenista -->
			<label for="apellidos">Apellidos:</label>
			<input type="text" id="apellidos" name="apellidos" value="">
			<span style="color: red">
				<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LOS APELLIDOS
					-->

				<?php
				if (isset($errores['apellidos'])) {
					echo $errores['apellidos'];
				}
				?>
			</span>
		</p>
		<p>
			<!-- Campo altura del tenista -->
			<label for="altura">Altura:</label>
			<input type="text" id="altura" name="altura" value=""> cm
			<span style="color: red">
				<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LA ALTURA
					-->


				<?php
				if (isset($errores['altura'])) {
					echo $errores['altura'];
				}
				?>
			</span>
		</p>
		<p>
			<!-- Campo año de nacimiento del tenista -->
			<label for="anno_nacimiento">Año del nacimiento:</label>
			<input type="text" id="anno_nacimiento" name="anno_nacimiento" value="">

		</p>
		<p>
			<!-- Campo mano del tenista -->
			Seleccione mano:
			<input type="radio" id="mano1" name="mano" value="Diestro" />
			<label for="mano1">Diestro</label>
			<input type="radio" id="mano2" name="mano" value="Zurdo" />
			<label for="mano2">Zurdo</label>
			<span style="color: red">
				<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LA MANO
					-->

				<?php
				if (isset($errores['mano'])) {
					echo $errores['mano'];
				}
				?>
			</span>
		</p>

		<fieldset>
			<legend>Título</legend>
			<p>
				<select id="torneo" name="torneo">
					<option value="">Seleccione Torneo</option>
					<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA RELLENAR EL SELECT DE LOS TORNEOS TAL Y COMO SE SOLICITA
						-->

					<?php
					try {
						$conexion = conectarPDO($database);

						$consulta = $conexion->prepare("SELECT nombre FROM torneos");
						$consulta->execute();

						while ($torneo = $consulta->fetch(PDO::FETCH_OBJ)) {
							echo "<option value'{$torneo->nombre}'>{$torneo->nombre}</option>";
						}

						$conexion = null;
					} catch (PDOException $e) {
						echo "Error al hacer la consulta: " . $e->getMessage();
					}
					?>

				</select>
				<span style="color: red">
					<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN NOMBRE DEL TORNEO
						-->
				</span>
			</p>
			<p>
				<select id="anno" name="anno">
					<option value="">Seleccione Año</option>
					<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA RELLENAR EL SELECT DE LOS AÑOS TAL Y COMO SE SOLICITA
						-->

					<?php

					for ($i = 1968; $i <= 2024; $i++) {
						echo "<option value='$i'>$i</option>";
					}


					?>

				</select>
				<span style="color: red">
					<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN EL AÑO DEL TORNEO
						-->
				</span>
			</p>
		</fieldset>

		<p>
			<!-- Botón submit -->
			<input type="submit" value="Guadar">
			<!-- Botón borrar -->
			<input type="reset" value="Borrar">
		</p>
	</form>

	<!--  
						ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO. Recuerda:
						- Conéctate a la BBDD.
						- Prepara la consulta para insertar al nuevo jugador. 
						- Ejecuta la consulta de inserción.
						- A continuación, si ha ganado algún título, hay que insertarlo en la tabla "titulos"
						-->

</body>

</html>