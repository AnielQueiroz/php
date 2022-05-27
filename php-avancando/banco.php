<?php

function sacar($conta, $valorSacar){
    if ($valorSacar > $conta ['saldo']){
        exibeMsg("Você não pode sacar esse valor");
    }else{
        $conta ['saldo'] -= $valorSacar;
    }

    return $conta;
}

function deposito($conta, $valorDeposito){
    if($valorDeposito > 0){
        $conta ['saldo'] += $valorDeposito;
    }else{
        exibeMsg("Valor de deposito inválido");
    }

    return $conta;
}

function exibeMsg($msg){
    echo $msg . PHP_EOL;
}

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Aniel',
        'saldo' => 1000
    ],
    '123.456.789-11' => [
        'titular' => 'Leandro',
        'saldo' => 1500
    ],
    '123.456.789-12' => [
        'titular' => 'Orlando',
        'saldo' => 7000
    ],
    '123.456.789-22' => [
        'titular' => 'Carla',
        'saldo' => 6000
    ]
];

$contasCorrentes['123.456.789-22'] = sacar($contasCorrentes['123.456.789-22'], 500);
$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 1500);

$contasCorrentes['123.456.789-12'] = deposito($contasCorrentes['123.456.789-12'], -1000);

foreach ($contasCorrentes as $cpf => $conta) {
    exibeMsg($cpf . " " . $conta['titular'] . " R$ " . $conta['saldo']);
}