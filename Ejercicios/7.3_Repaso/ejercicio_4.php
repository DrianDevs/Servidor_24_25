<?php 
echo "<h1>Tirada de 6 dados</h1>";
$dados = [];
for ($i=0; $i < 6; $i++) { 
    $dados[$i] = rand(1,6);
    imprimeDado($dados[$i]);
}


echo "<h1>Dado a eliminar</h1>";
$dadoAEliminar = rand(1,6);
imprimeDado($dadoAEliminar);


echo "<h1>Dados restantes</h1>";
for ($i=0; $i < count($dados); $i++) {
    if ($dados[$i] !== $dadoAEliminar) {    
        imprimeDado($dados[$i]);
    } 
}

function imprimeDado($dado) {
    switch ($dado) {
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
?>