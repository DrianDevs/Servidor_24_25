<?php
$cantidad = count($_POST);

echo "<p>Tus datos originales son:</p>";
for ($i = 1; $i <= $cantidad; $i++) {
    echo $_POST["elemento$i"];
}

echo "<p>Tus datos invertidos son:</p>";
for ($i = 0; $i < $cantidad; $i++) {
    $indice = $cantidad - $i;
    echo $_POST["elemento$indice"];
}

echo "<br><br><a href='formulario_1.html'>Volver al inicio</a>";
?>