<?php

$conta1 = [
    'titular' => 'Aniel',
    'saldo' => 1000
];

$conta2 = [
    'titular' => 'Leandro',
    'saldo' => 1500
];

$conta3 = [
    'titular' => 'Orlando',
    'saldo' => 7000
];

// echo $conta1['titular'];

$contasCorrentes = [$conta1, $conta2, $conta3];

for($i = 0; $i < count($contasCorrentes); $i++){
    echo $contasCorrentes[$i] ['titular'] . PHP_EOL;
}