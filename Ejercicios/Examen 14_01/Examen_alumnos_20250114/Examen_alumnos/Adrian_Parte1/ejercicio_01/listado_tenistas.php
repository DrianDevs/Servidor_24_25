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
    <title>Listado de tenistas</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <h1>Listado de tenistas con número de torneos ganados</h1>

    <!--  

        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
        Recuerda:
        - Realiza la conexion a la base de datos a través de una función.
        - Realiza la consulta a ejecutar en la base de datos en una variable
        - Obten el resultado de ejecutar la consulta para poder recorrerlo.
      -->

    <?php

    try {
        $conexion = conectarPDO($database);

        $consulta = $conexion->prepare("SELECT tenistas.nombre, tenistas.apellidos, tenistas.id, tenistas.altura, tenistas.mano, tenistas.anno_nacimiento, COUNT(titulos.tenista_id) AS torneos_ganados FROM tenistas LEFT JOIN titulos ON tenistas.id = titulos.tenista_id GROUP BY tenistas.id ORDER BY torneos_ganados DESC");
        $consulta->execute();

        $conexion = null;
    } catch (PDOException $e) {
        echo "Error al hacer la consulta: " . $e->getMessage();
    }
    ?>


    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Altura (cm)</th>
            <th>Año de nacimiento</th>
            <th>Mano</th>
            <th>Número de torneos ganados</th>
        </thead>
        <tbody>
            <!--  

            ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

            -->

            <?php
            while ($tenista = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                //echo "<td>{$tenista['id']}</td>";
                echo "<td>{$tenista['nombre']}</td>";
                echo "<td>{$tenista['apellidos']}</td>";
                echo "<td>{$tenista['altura']}</td>";
                echo "<td>{$tenista['anno_nacimiento']}</td>";
                echo "<td>{$tenista['mano']}</td>";

                if ($tenista['torneos_ganados'] !== 0) {
                    //echo "<td>{$tenista['torneos_ganados']}</td>";
                    echo "<td><a href='listado_torneos_ganados.php?id_tenista=" . $tenista['id'] . "'>{$tenista['torneos_ganados']}</a></td>";
                } else {
                    echo "<td>{$tenista['torneos_ganados']}</td>";
                }

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <!--  

        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

    -->

</body>

</html>