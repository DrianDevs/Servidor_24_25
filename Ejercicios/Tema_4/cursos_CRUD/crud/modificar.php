<!--  

    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

-->
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
    <!--  

    	ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

	-->
  		<form action="<?php print htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	
	    	<p>
	            <!-- Campo nombre del curso -->
	            <input type="text" name="nombre" placeholder="Curso"> 
	            <!--  

				    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

				-->
	        </p>
	        <p>
	            <!-- Campo número de grupos del curso -->
	            <input type="number" name="grupos" placeholder="Número de grupos">
	           	<!--  

				    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

				-->
	        </p>
	        <p>
	            <!-- Campo número de plazas del curso -->
	            <input type="number" name="plazas" placeholder="Número de plazas">
	            <!--  

				    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

				-->
	        </p>
	        <p>
	            <!-- Campo itinerario del curso -->
	            <select id="itinerario" name="itinerario">
	            	<option value="">Seleccione Itinerario</option>
	            	<!--  

					    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

					-->
  				</select>
  				
	           	<!--  

				    ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

				-->
	        </p>
	        <p>
	            <!-- Botón submit -->
	            <input type="submit" value="Guadar">
	        </p>
	    </form>
    <!--  

		ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

	-->
    
</body>
</html>