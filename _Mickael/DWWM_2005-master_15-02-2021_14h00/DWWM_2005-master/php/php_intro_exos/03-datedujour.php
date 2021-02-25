<?php

function DateDuJour()
{
    $date = new DateTime();

    $result = $date->format('d/m/Y');

    echo $result;

    return $result;
}
