<?php

echo factorielleIterative(12);
echo "\n";
echo factorielleRescursive(12);


function factorielleRescursive(int $n)
{
    if ($n == 1) {
        return 1;
    }
    return $n * factorielleRescursive($n - 1);
}

function factorielleIterative(int $n)
{
    $res = 1;
    for ($i = 1; $i <= $n; $i++) {
        $res *= $i;
    }
    return $res;
}
