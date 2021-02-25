<?php 

function stringLength($chaine)
{
    $longueur = strlen($chaine); // nombre de caractères dans la chaine

    if($longueur >= 9) {
        return true;
    }
    else {
        return false;
    }
}



function passwordCheck($password)
{
    // si le mot de passe est trop court
    if(!stringLength($password)) {
        echo 'le mot de passe est trop court';
        return false;
    }

    // si le mot de passe ne contient pas au moins 1 chiffre
    if(preg_match('/^[^0-9]+$/', $password)) {
        echo 'le mot de passe doit contenir au moins 1 chiffre';
        return false;
    }

    // si le mot de passe ne contient pas au moins 1 majuscule
    if(preg_match('/^[^A-Z]+$/', $password)) {
        echo 'le mot de passe doit contenir au moins 1 majuscule';
        return false;
    }

    // si le mot de passe ne contient pas au moins 1 minuscule
    if(preg_match('/^[^a-z]+$/', $password)) {
        echo 'le mot de passe doit contenir au moins 1 miniscule';
        return false;
    }

    // si le mot de passe ne contient pas au moins 1 caractère spécial
    if(!preg_match('/^[^a-zA-Z0-9]+$/', $password)) {
        echo 'le mot de passe doit contenir au moins 1 caractère spécial';
        return false;
    }

    return true;
}

$password=  '1234567AZSDERaaaa$';

if(passwordCheck($password)) {
    echo 'le mot de passe est valide';
}
else {
    echo 'mot de passe non valide';
}