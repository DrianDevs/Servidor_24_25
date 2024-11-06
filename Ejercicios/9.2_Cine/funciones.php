<?php

// Archivo JSON que almacena los asientos ocupados
define('ARCHIVO_ASIENTOS', 'asientos_ocupados.json');

// Simulamos las películas
$peliculas = [
    1 => 'Interestelar',
    2 => 'Cars',
    3 => 'Titanic'
];

// Simulamos los horarios
$horarios = [
    1 => [
        ['hora' => '10:00 AM', 'id_sesion' => 101],
        ['hora' => '3:00 PM', 'id_sesion' => 102],
        ['hora' => '8:00 PM', 'id_sesion' => 103]
    ],
    2 => [
        ['hora' => '11:00 AM', 'id_sesion' => 201],
        ['hora' => '4:00 PM', 'id_sesion' => 202],
        ['hora' => '9:00 PM', 'id_sesion' => 203]
    ],
    3 => [
        ['hora' => '12:00 PM', 'id_sesion' => 301],
        ['hora' => '5:00 PM', 'id_sesion' => 302],
        ['hora' => '10:00 PM', 'id_sesion' => 303]
    ]
];

/**
 * Función para obtener los horarios de una película dada su ID
 * 
 * @param int $pelicula_id El ID de la película
 * @return array|null Los horarios de la película o null si no existe
 */
function obtenerHorariosPorPelicula($pelicula_id)
{
    global $horarios;  // Usamos el array global de horarios
    return isset($horarios[$pelicula_id]) ? $horarios[$pelicula_id] : null;
}

/**
 * Función para obtener el nombre de una película dado su ID
 * 
 * @param int $pelicula_id El ID de la película
 * @return string|null El nombre de la película o null si no existe
 */
function obtenerNombrePelicula($pelicula_id)
{
    global $peliculas;  // Usamos el array global de películas
    return isset($peliculas[$pelicula_id]) ? $peliculas[$pelicula_id] : null;
}


function obtenerSesionPorId($sesion_id)
{
    global $horarios;

    if (!$horarios) {   //El programa se asegura de que el array de horarios no está vacío para poder recorrerlo
        return null;
    }

    // Recorremos todas las películas
    foreach ($horarios as $pelicula_horarios) {
        // Recorremos los horarios de cada película
        foreach ($pelicula_horarios as $horario) {
            if ($horario['id_sesion'] == $sesion_id) {
                return $horario['hora'];
            }
        }
    }
    return null;

}

/**
 * Función para obtener los asientos ocupados de una sesión
 * 
 * @param int $sesion_id El ID de la sesión
 * @return array Los asientos ocupados en esa sesión
 */
function obtenerAsientosOcupados($sesion_id)
{
    if (file_exists(ARCHIVO_ASIENTOS)) {
        $asientos_ocupados = json_decode(file_get_contents(ARCHIVO_ASIENTOS), true);
        return isset($asientos_ocupados[$sesion_id]) ? $asientos_ocupados[$sesion_id] : [];
    }
    return [];
}

/**
 * Función para marcar un asiento como ocupado
 * 
 * @param int $sesion_id El ID de la sesión
 * @param string $asiento El ID del asiento (por ejemplo, "0-1")
 */
function marcarAsientoOcupado($sesion_id, $asiento)
{
    // Obtener los asientos ocupados actuales
    $asientos_ocupados = obtenerAsientosOcupados($sesion_id);

    // Añadir el nuevo asiento a la lista de ocupados
    if (!in_array($asiento, $asientos_ocupados)) {
        $asientos_ocupados[] = $asiento;
    }

    // Guardar los datos actualizados en el archivo
    $data = json_decode(file_get_contents(ARCHIVO_ASIENTOS), true);
    $data[$sesion_id] = $asientos_ocupados;
    file_put_contents(ARCHIVO_ASIENTOS, json_encode($data));
}

/**
 * Función para liberar uno o varias asientos (en caso de que el usuario cancele la selección)
 * 
 * @param int $sesion_id El ID de la sesión
 * @param string $asiento El/Los ID del asiento
 */
function liberarAsientos($sesion_id, $liberar_asientos)
{
    // Obtener los asientos ocupados actuales
    $asientos_ocupados = obtenerAsientosOcupados($sesion_id);

    // Eliminar el asiento de la lista de ocupados
    foreach ($liberar_asientos as $asiento) {
        $index = array_search($asiento, $asientos_ocupados);
        if ($index !== false) {
            unset($asientos_ocupados[$index]);
        }

        // Guardar los datos actualizados en el archivo
        $data = json_decode(file_get_contents(ARCHIVO_ASIENTOS), true);
        $data[$sesion_id] = array_values($asientos_ocupados);
        file_put_contents(ARCHIVO_ASIENTOS, json_encode($data));
    }
}
?>