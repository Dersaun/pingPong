<?php

// A: 0-4, 10-14, 20-24,30-34
// B: 5-9, 15-19, 25-29, 35-39

function in_range($number, $start, $end)
{
    return $number >= $start && $number <= $end;
}


function vezes_por_jogador($numeroMaximo)
{
$jogadorA = [];
$jogadorB = [];
$a = true;
for ($i = 0; $i < $numeroMaximo; $i += 5) {
    if ($a) {
        $jogadorA[] = ['inicio' => $i, 'fim' => $i + 4 > $numeroMaximo ? $numeroMaximo : $i + 4];
        $a = false;
    } else {
        $jogadorB[] = ['inicio' => $i, 'fim' => $i + 4 > $numeroMaximo ? $numeroMaximo : $i + 4];
        $a = true;

    }

}
return [$jogadorA, $jogadorB];
}

function sacar($pontuacao)
{
    $pontos = explode(':', $pontuacao);
    $pontos = $pontos[0] + $pontos[1];

    $vezes = vezes_por_jogador(40);

    foreach ($vezes[0] as $saque) {
        if (in_range($pontos, ...array_values($saque)) ) {
            return 'Jogador A';
        }

    }
    return 'Jogador B';
}

$vez = sacar('5:2');

//var_dump(vezes_por_jogador(42));
$r = in_range(5, ...[10,14]);

var_dump($vez);