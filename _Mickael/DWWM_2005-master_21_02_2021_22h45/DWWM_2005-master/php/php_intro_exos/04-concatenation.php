<?php

function concatenation(string $var1, string $var2)
{
    return $var1.$var2;
}

$nom = concatenation('Mickaël', 'Devoldère');


function concatenationV2(string $var1, string $var2)
{
    $var1 = mb_strtolower($var1);

    $var2 = mb_convert_case($var2, MB_CASE_UPPER);

    return $var1." ".$var2;
}

$nom = concatenationV2('Mickaël', 'Devoldère');
// $nom == mickaël DEVOLDÈRE