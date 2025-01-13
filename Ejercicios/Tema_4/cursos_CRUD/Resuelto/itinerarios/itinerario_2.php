<?php
 
  // Inclusión del fichero de funciones
  require_once("../funciones.php");

  $conexion = conectar_mysqli($host, $user, $password, $bbdd);

  // Recogemos los datos
  $id = obtenerValorCampo("id");
  $itinerario = urldecode(obtenerValorCampo("itinerario"));

  // Validamos el itinerario
  if ($itinerario == "") {
    header("Location: itinerario_1.php");
    exit();
  } 
  

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Itinerario - Cursos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Cursos de <?php echo $itinerario?></h1>

  <div>
    <table border="1" cellpadding="10">
      <thead>
        <th>Nombre</th>
        <th>Número de grupos</th>
        <th>Número de alumnos</th>
      </thead>
      <tbody>
        <?php
          // Obtenemos los cursos para ese itinerario con una consulta preparada
          $consultaCursos = "SELECT  count(a.id) as alumnos, c.nombre, grupos from Alumnos as a INNER JOIN cursos c on c.id = a.curso_id where c.itinerario_id = $id group by a.curso_id";
    
          $resultado = resultado_consulta($conexion, $consultaCursos);

          // Ahora vamos a utilizar el fetch y obtenemos los datos como un objeto
          while($row = $resultado->fetch_object()):
        ?>
          <tr>
            <td><?php echo $row->nombre ?></td>
            <td align="center"><?php echo $row->grupos ?></td>
            <td align="center"><?php echo$row->alumnos ?></td>
          </tr>
        <?php
          endwhile;

          $resultado->free();

          $conexion->close();
        ?>
      </tbody>
    </table>
    <p>
      <a href="itinerario_1.php">Volver</a>
    </p>
  </div>
</body>
</html>
