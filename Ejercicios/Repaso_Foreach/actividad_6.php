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
                'informacion_adicional' => 'Ciudad universitaria y cuna del castellano.'
            ]
        ],
    ],
    'Galicia' => [
        'provincias' => ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
        'capital' => [
            'Santiago de Compostela' => [
                'poblacion' => 97185,
                'informacion_adicional' => 'Ciudad histórica y sede del Camino de Santiago.'
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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar en Comunidades</title>
</head>

<body>
    <h1>Buscar en Comunidades</h1>
    <form method="POST" action="">
        <label for="buscar">Buscar por comunidad, provincia o capital:</label>
        <input type="text" id="buscar" name="buscar">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $buscado = $_POST['buscar'];

        if (!empty($buscado)) {
            $resultados = buscarComunidadProvinciaCapital($buscado, $comunidades);
            if (count($resultados) > 0) {
                echo "<h2>Resultados de la búsqueda:</h2>";
                foreach ($resultados as $resultado) {
                    echo "<p>$resultado</p>";
                }
            } else {
                echo "<p>No se han encontrado resultados.</p>";
            }
        } else {
            echo "<p>Por favor, ingrese una palabra para hacer la búsqueda.</p>";
        }
    }


    function buscarComunidadProvinciaCapital($buscado, $comunidades)
    {
        $resultados = [];

        foreach ($comunidades as $comunidad => $datosComunidad) {
            if (strpos(strtolower($comunidad), strtolower($buscado)) !== false) {
                $resultados[] = "Comunidad: " . $comunidad;
            }

            foreach ($datosComunidad['provincias'] as $provincia) {
                if (strpos(strtolower($provincia), strtolower($buscado)) !== false) {
                    $resultados[] = "Provincia: " . $provincia;
                }
            }

            foreach ($datosComunidad['capital'] as $capital => $info) {
                if (strpos(strtolower($capital), strtolower($buscado)) !== false) {
                    $resultados[] = "Capital: " . $capital .
                        " (Población: " . number_format($info['poblacion']) .
                        ") - " . $info['informacion_adicional'];
                }
            }
        }

        return $resultados;
    }
    ?>
</body>

</html>