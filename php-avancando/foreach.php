<?php

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
        'saldo' => 5900
    ]
];

$contasCorrentes['352.547.879-52'] = [
    'titular' => 'Abelardo',
    'saldo' => '3500'
];

foreach ($contasCorrentes as $cpf => $conta) {
    echo "CPF: $cpf " . " " . $conta['titular'] . PHP_EOL;
}