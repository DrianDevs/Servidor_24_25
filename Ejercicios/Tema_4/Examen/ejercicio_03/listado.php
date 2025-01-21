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
    <title>Listado de torneos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de torneos</h1>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
        Recuerda:
        - Conéctate a la base de datos
        - Prepara la consulta a ejecutar para mostrar los torneos
        -->

    <?php
    try {
        $conexion = conectarPDO($database);

        $consulta = $conexion->prepare("SELECT torneos.id, torneos.nombre, torneos.ciudad, superficies.nombre AS 'superficie' FROM torneos JOIN superficies ON torneos.superficie_id = superficies.id ORDER BY torneos.id;");
        $consulta->execute();

        $conexion = null;
    } catch (PDOException $e) {
        echo "Error al hacer la consulta: " . $e->getMessage();
    }
    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Cuidad</th>
            <th>Superficie</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!--  
                ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR LOS DATOS
            -->
            <?php
            while ($torneo = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                //echo "<td>{$torneo->id}</td>";
                echo "<td>{$torneo->nombre}</td>";
                echo "<td>{$torneo->ciudad}</td>";
                echo "<td>{$torneo->superficie}</td>";
                echo '<td><a href="modificar.php?idTorneo=' . $torneo->id . '" class="estilo_enlace">&#9998</a></td>';
                echo "</tr>";
            }

            ?>
            <!--  
                ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR LOS DATOS
            -->
        </tbody>
    </table>

    <!--  
                ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR LOS DATOS
            -->
</body>

</html>