<?php 
$valor = $_POST['valor'];

if (ctype_digit($valor)) {
    echo "El valor solo contiene dígitos.";
} elseif (ctype_alpha($valor)) {
    echo "El valor es alfabético.";
} elseif (ctype_alnum($valor)) {
    echo "El valor es alfanumérico.";
} else {
    echo "El valor no es alfabético, alfanumérico ni contiene solo dígitos.";
}
?>