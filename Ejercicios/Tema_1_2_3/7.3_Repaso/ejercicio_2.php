<?php
$dado1 = rand(1, 6);
$dado2 = rand(1, 6);

echo "<h2>Jugador 1</h2>";
switch ($dado1) {
    case 1:
        echo "<img src='img/1.svg'>";
        break;
    case 2:
        echo "<img src='img/2.svg'>";
        break;
    case 3:
        echo "<img src='img/3.svg'>";
        break;
    case 4:
        echo "<img src='img/4.svg'>";
        break;
    case 5:
        echo "<img src='img/5.svg'>";
        break;
    case 6:
        echo "<img src='img/6.svg'>";
        break;
}

echo "<h2>Jugador 2</h2>";
switch ($dado2) {
    case 1:
        echo "<img src='img/1.svg'>";
        break;
    case 2:
        echo "<img src='img/2.svg'>";
        break;
    case 3:
        echo "<img src='img/3.svg'>";
        break;
    case 4:
        echo "<img src='img/4.svg'>";
        break;
    case 5:
        echo "<img src='img/5.svg'>";
        break;
    case 6:
        echo "<img src='img/6.svg'>";
        break;
}

if ($dado1 > $dado2) {
    echo "<p>Ha ganado el jugador 1</p>";
} else if ($dado1 < $dado2) {
    echo "<p>Ha ganado el jugador 2</p>";
} else {
    echo "<p>Empate</p>";
}
?>