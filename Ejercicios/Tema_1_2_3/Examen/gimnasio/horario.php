<?php

$clases = [
    1 => 'Yoga',
    2 => 'Zumba',
    3 => 'Crossfit'
];

$horarios = [
    'Yoga' => [
        1 => [
            'dia' => 'lunes',
            'hora' => '19:00',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
        2 => [
            'dia' => 'miercoles',
            'hora' => '08:00',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
        3 => [
            'dia' => 'viernes',
            'hora' => '10:00',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
    ],
    'Zumba' => [
        1 => [
            'dia' => 'martes',
            'hora' => '18:00',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
        2 => [
            'dia' => 'jueves',
            'hora' => '19:30',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
    ],

    'Crossfit' => [
        1 => [
            'dia' => 'lunes',
            'hora' => '18:00',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
        2 => [
            'dia' => 'miercoles',
            'hora' => '14:30',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
        3 => [
            'dia' => 'viernes',
            'hora' => '20:30',
            'plazas_totales' => 20,
            'plazas_disponibles' => 20,
            'plazas_reservadas' => 0,
        ],
    ],
];

function obtenerClases()
{
    global $clases;
    return $clases;
}

function obtenerHorarios()
{
    global $horarios;
    return $horarios;
}

function reservar_plaza()
{

}

function liberar_plaza()
{

}
?>