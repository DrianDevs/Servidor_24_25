<?php
  // Inclusión de funciones
  require_once("../funciones.php");

  // Inicio de la sesión
  session_name("sesion-itinerarios");
  session_start();

  $conexion = conectar_mysqli($host, $user, $password, $bbdd);

  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Itinerarios - Cursos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Itinerarios Formativos</h1>

  <div>
    <table border="1" cellpadding="10">
      <thead>
        <th>Itinerario</th>
        <th>Número de Cursos</th>
      </thead>
      <tbody>
        <?php
         
          // Obtenemos los itinerarios formativos con el número de cursos
          $consultaItinearios = "SELECT i.id as id, count(c.id) as cursos, i.nombre as nombre from cursos as c INNER JOIN itinerarios i on i.id= c.itinerario_id group by c.itinerario_id";

          // Ejecutamos la consulta para mostrar los itinearios
          $resultado = resultado_consulta($conexion, $consultaItinearios);
         
          // Ahora vamos a utilizar el fetch y obtenemos los datos como un objeto
          while($row = $row = $resultado->fetch_object()):
        ?>
            <tr>
              <td><?php echo $row->nombre?></td>
              <td align="center"><a href="itinerario_2.php?id=<?php echo $row->id?>&itinerario=<?php echo urlencode($row->nombre)?>\"><?php echo $row->cursos?></a></td>
            </tr>
        <?php
          endwhile;
      
          liberar_resultado($resultado);

          cerrar_conexion($conexion)
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
