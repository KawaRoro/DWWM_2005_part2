<?php

function EstMajeur(int $age)
{
    if($age >= 18) {
        return true;
    }
    else {
        return false;
    }
}


if(EstMajeur(24)) {
    echo 'ok';
}
else {
    echo 'tu es mineur';
}