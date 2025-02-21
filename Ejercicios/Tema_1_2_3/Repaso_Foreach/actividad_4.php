<!DOCTYPE html>
<html>

<head>
    <title>Buscar Provincia</title>
</head>

<body>
    <h1>Buscar Provincia</h1>
    <form method="POST" action="actividad_4.php">
        <label for="provincia">Ingrese el nombre de la provincia:</label>
        <input type="text" id="provincia" name="provincia">
        <button type="submit">Buscar</button>
    </form>
    <hr>
</body>

</html>

<?php

$comunidades = [
    'Andalucía' => [
        'provincias' => [
            'Sevilla',
            'Cádiz',
            'Córdoba',
            'Granada',

            'Málaga',
            'Jaén',
            'Huelva'
        ],

        'capital' => [
            'Sevilla' => [
                'poblacion' => 742940,
                'informacion_adicional' => 'Capital histórica de al-Andalus.'
            ]
        ],
    ],
    'Cataluña' => [
        'provincias' => ['Barcelona', 'Girona', 'Lleida', 'Tarragona'],
        'capital' => [
            'Barcelona' => [
                'poblacion' => 1620343,

                'informacion_adicional' => 'Ciudad cosmopolita y centro económico.'
            ]
        ],
    ],
    'Castilla y León' => [
        'provincias' => [
            'Ávila',
            'Burgos',
            'León',
            'Salamanca',

            'Segovia',
            'Soria',
            'Valladolid',
            'Zamora'
        ],

        'capital' => [
            'Valladolid' => [
                'poblacion' => 304875,
                'informacion_adicional' => 'Ciudad universitaria y cuna del
    castellano.'
            ]
        ],
    ],
    'Galicia' => [
        'provincias' => ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
        'capital' => [
            'Santiago de Compostela' => [
                'poblacion' =>
                    97185,
                'informacion_adicional' => 'Ciudad histórica y sede del Camino
    de Santiago.'
            ]
        ],
    ],
    'País Vasco' => [
        'provincias' => ['Álava', 'Guipúzcoa', 'Vizcaya'],
        'capital' => [
            'Vitoria-Gasteiz' => [
                'poblacion' => 252727,
                'informacion_adicional' => 'Capital del País Vasco y ciudad verde.'
            ]
        ],
    ],
];

if (isset($_POST['provincia'])) {
    $provincia_buscada = $_POST['provincia'];

    foreach ($comunidades as $key => $value) {
        $provincias = $value['provincias'];
        foreach ($provincias as $provincia) {
            if ($provincia == $provincia_buscada) {
                echo "<p>La provincia " . $provincia_buscada . " existe.";
                echo "<p>Se encuentra en " . $key;
                exit;
            }
        }
    }

    echo "<p>La provincia " . $provincia_buscada . " no existe.";

}

?>