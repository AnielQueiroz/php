<?php

$idadeList = [21, 32, 45, 19, 75, 11, 56, 78, 5];
$countIdade = 1;

for($i = 0; $i < count($idadeList); $i++){
    echo "Idade $countIdade: " . $idadeList[$i] . PHP_EOL;
    $countIdade++;
}

