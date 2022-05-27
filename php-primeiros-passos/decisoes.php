<?php

$idade = 17;
$numeroDePessoas = 1;

if($idade >= 18){
    echo "Você tem $idade anos." .PHP_EOL;
    echo "Pode entrar!";
}else if ($idade <= 17 and $numeroDePessoas > 1){
        echo "Você tem $idade anos, mas está acompanhado(a), então pode entrar\n";
    }else{
        echo "Você só pode entrar se tiver mais de 18 anos ou estiver acompanhado\n";
        echo "Você só tem $idade e não está acompanhado!";
    }
