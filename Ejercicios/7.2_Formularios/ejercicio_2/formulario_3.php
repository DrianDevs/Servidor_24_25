<?php 
$matriz = [];

for ($i = 1; $i <= $_POST["numero"]; $i++) {
    for ($j = 1; $j <= $_POST["numero"]; $j++) {
        $matriz[$i][$j] = $_POST["elemento{$i}{$j}"];
    }
}

$fila = $_POST['fila'];
$columna = $_POST['columna'];

switch ($_POST["trayectoria"]) {
    case 'arriba':
        while ($fila >= 1) {
            $resultados[] = $matriz[$fila][$columna];
            $fila--; // Mueve hacia arriba
        }
        break;

    case 'abajo':
        while ($fila <= $_POST["numero"]) {
            $resultados[] = $matriz[$fila][$columna];
            $fila++; // Mueve hacia abajo
        }
        break;

    case 'izquierda':
        while ($columna >= 1) {
            $resultados[] = $matriz[$fila][$columna];
            $columna--; // Mueve hacia la izquierda
        }
        break;

    case 'derecha':
        while ($columna <= $_POST["numero"]) {
            $resultados[] = $matriz[$fila][$columna];
            $columna++; // Mueve hacia la derecha
        }
        break;

    case 'arriba-izquierda':
        while ($fila >= 1 && $columna >= 1) {
            $resultados[] = $matriz[$fila][$columna];
            $fila--; 
            $columna--; 
        }
        break;

    case 'arriba-derecha':
        while ($fila >= 1 && $columna <= $_POST["numero"]) {
            $resultados[] = $matriz[$fila][$columna];
            $fila--; 
            $columna++; 
        }
        break;

    case 'abajo-izquierda':
        while ($fila <= $_POST["numero"] && $columna >= 1) {
            $resultados[] = $matriz[$fila][$columna];
            $fila++;
            $columna--; 
        }
        break;

    case 'abajo-derecha':
        while ($fila <= $_POST["numero"] && $columna <= $_POST["numero"]) {
            $resultados[] = $matriz[$fila][$columna];
            $fila++;
            $columna++;
        }
        break;
}

echo "<p>Los valores de la matriz partiendo de la posición ($fila,$columna) y con la trayectoria seleccionada son:</p>";
echo implode(" ", $resultados);
echo "<br><br><a href='formulario_1.html'>Volver al inicio</a>";
?>