<?php
$dados1 = [];
$dado2 = [];
$wins1 = 0;
$wins2 = 0;
$empates = 0;


echo "<h2>Jugador 1</h2>";
for ($i = 1; $i <= 4; $i++) {
    $dados1[$i] = rand(1, 6);
    switch ($dados1[$i]) {
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
}

echo "<h2>Jugador 2</h2>";
for ($i = 1; $i <= 4; $i++) {
    $dados2[$i] = rand(1, 6);
    switch ($dados2[$i]) {
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
}

echo "<h2>Resultado</h2>";
for ($i = 1; $i <= 4; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $wins1++;
    } elseif ($dados1[$i] < $dados2[$i]) {
        $wins2++;
    } elseif ($dados1[$i] === $dados2[$i]) {
        $empates++;
    }
}

echo "<p>El jugador 1 ha ganado <strong>$wins1</strong> veces, el jugador 2 ha ganado <strong>$wins2</strong> veces y los jugadores han empatado <strong>$empates</strong> veces.</p>";

?>