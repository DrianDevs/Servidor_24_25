<?php
$numero = rand(1, 10);
echo "<h2>$numero dados</h2>";
$pares = 0;
$impares = 0;
for ($i = 1; $i <= $numero; $i++) {
    $dado = rand(1, 6);
    switch ($dado) {
        case 1:
            echo "<img src='img/1.svg'>";
            $impares++;
            break;
        case 2:
            echo "<img src='img/2.svg'>";
            $pares++;
            break;
        case 3:
            echo "<img src='img/3.svg'>";
            $impares++;
            break;
        case 4:
            echo "<img src='img/4.svg'>";
            $pares++;
            break;
        case 5:
            echo "<img src='img/5.svg'>";
            $impares++;
            break;
        case 6:
            echo "<img src='img/6.svg'>";
            $pares++;
            break;
    }
}
echo "<p>Han salido $pares pares y $impares impares</p>";
?>