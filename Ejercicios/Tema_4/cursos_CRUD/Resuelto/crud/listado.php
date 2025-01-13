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
    <title>Listado de curso</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Listado de cursos usando fetch (PDO::FETCH_BOUND)</h1>

    <?php
        $conexion = conectar_pdo($host, $user, $password, $bbdd);

        $consulta = "SELECT c.id id, c.nombre curso, i.nombre itinerario, grupos, plazas FROM cursos c INNER JOIN itinerarios i ON i.id = c.itinerario_id";

        $resultado = resultado_consulta($conexion, $consulta);

        $resultado->bindColumn(1, $id);
        $resultado->bindColumn(2, $curso); 
        $resultado->bindColumn(3, $itinerario);
        $resultado->bindColumn(4, $grupos);
        $resultado->bindColumn(5, $plazas);

    ?>
        <table border="1" cellpadding="10">
            <thead>
                <th>Curso</th>
                <th>Itinerario</th>
                <th>Grupos</th>
                <th>Plazas</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                    // para mostrar todos los datos
                    while ($row = $resultado->fetch(PDO::FETCH_BOUND)):
                ?>
                    <tr>
                        <td><?php echo $curso; ?></td>
                        <td><?php echo $itinerario; ?></td>
                        <td><?php echo $grupos; ?></td>
                        <td><?php echo $plazas; ?></td>
                        <td><a href="modificar.php?idCurso=<?php echo $id; ?>" class="estilo_enlace">&#9998</a> <a  href="borrar.php?idCurso=<?php echo $id; ?>" class="confirmacion_borrar">&#128465</a></td>
                    </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
        <div class="contenedor">
            <div class="enlaces">
                <a href="nuevo.php">Nuevo Curso</a>
            </div>
        </div>

    
    <?php
        $resultado = null;

        $conexion = null;
    ?>
    <script type="text/javascript">    
        var elementos = document.getElementsByClassName("confirmacion_borrar");
        var confirmFunc = function (e) {
            if (!confirm('Está seguro de que desea borrar este regitro?')) e.preventDefault();
        };
        for (var i = 0, l = elementos.length; i < l; i++) {
            elementos[i].addEventListener('click', confirmFunc, false);
        }
    </script>
</body>
</html>