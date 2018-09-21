<?php

//impair();
//mutliplication13();
//echo factorielle(30);

function factorielle(int $n)
{
    if ($n > 1) {
        return $n * factorielle($n - 1);
    } else {
        return 1;
    }
}


function mutliplication13()
{
    for ($i = 0; $i <= 13; $i++) {
        echo $i . " * 13 = " . ($i * 13) . "\n";
    }
}

function impair()
{
    for ($i = 1; $i <= 15000; $i = $i + 2) {
        echo $i . "\n";
    }
}
