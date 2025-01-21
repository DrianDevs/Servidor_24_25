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
    <title>Listado de torneos del tenista</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <h1>Listado de torneos ganados por un tenista</h1>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO
        Recuerda:
        - Comprobar si en la URL tenemos un parámetro que identifique al tenista.
        - Realiza la conexion a la base de datos a través de una función.
        - Realiza la consulta a ejecutar en la base de datos.
        - Ejecuta la consulta y, si no se obtiene resultado, vuelve al listado original. En caso contrario, habrá 1 resultado, con nombre y apellido.
        - Prepara la consulta a ejecutar para obtener todos los torneos y los años en los que se ha ganado.
        - Puedes hacerlo como quieras, pero una opción es guardarlo en una estructura clave valor en la que la clave es el nombre del torneo y el valor es un array con los distintos años en los que se ha ganado.
    -->

    <?php
    try {
        $conexion = conectarPDO($database);

        $tenista_id = $_GET['id_tenista'];

        //Hacemos una consulta para comprobar si el id del tenista existe
        $consulta_tenista = $conexion->prepare("SELECT nombre, apellidos FROM tenistas WHERE id = :tenista_id");
        $consulta_tenista->bindParam(':tenista_id', $tenista_id, PDO::PARAM_INT);
        $consulta_tenista->execute();

        //Si se ha encontrado, seguimos con la consulta de torneos, si no, abortamos
        if ($consulta_tenista->rowCount() > 0) {
            $tenista = $consulta_tenista->fetch(PDO::FETCH_ASSOC);
            $nombre_completo = $tenista['nombre'] . ' ' . $tenista['apellidos'];    //Guardo el nombre y apellido para mostrarlo luego
    
            // Consulta de los torneos ganados por el tenista
            $consulta = $conexion->prepare("SELECT torneos.nombre AS torneo, torneos.ciudad AS ciudad, titulos.anno AS anno FROM titulos JOIN torneos ON titulos.torneo_id = torneos.id WHERE titulos.tenista_id = :tenista_id ORDER BY anno ASC");
            $consulta->bindParam(':tenista_id', $tenista_id, PDO::PARAM_INT);
            $consulta->execute();
        } else {
            //Redirigir al listado_tenistas si el id no existe
            header("Location: listado_tenistas.php");
            exit();
        }

        $conexion = null;
    } catch (PDOException $e) {
        echo "Error al hacer la consulta: " . $e->getMessage();
    }
    ?>

    <h2> <!-- ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA PINTAR EL NOMBRE Y APELLIDO DEL TENISTA-->
        <?php echo "<p>Listado de torneos ganados por {$nombre_completo}</p>"; ?>

    </h2>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
    -->
    <div>
        <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO
        - Si lo has guardado en una estructura clave valor, recorrerla para mostrar los datos solicitados.
    -->

        <?php
        echo "<table border='1'>";
        echo "<tr><th>Torneo</th><th>Ciudad</th><th>Año</th></tr>";

        while ($torneo = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$torneo['torneo']}</td>";
            echo "<td>{$torneo['ciudad']}</td>";
            echo "<td>{$torneo['anno']}</td>";
            echo "</tr>";
        }
        ?>

    </div>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado_tenistas.php">Volver al listado de tenistas</a>
        </div>
    </div>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
    -->
</body>

</html>