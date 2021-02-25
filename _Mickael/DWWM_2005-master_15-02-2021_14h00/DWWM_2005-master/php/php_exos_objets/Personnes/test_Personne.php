<?php 
// ini_set() : permet de modifier la configuration de PHP pour le script courant.
// dans l'exemple ci-dessous, on définit le fuseau Horaire sur "Europe/Paris" 
// les objets DateTime qui sont manipulés plus bas se caleront sur ce fuseau horaire.
ini_set("date.timezone", "Europe/Paris");

// inclusion du fichier contenant la classe Personne
require 'Personne.php';

// Si j'utilise un code qui peut lever une exception (c'est le cas de Personne->setNom())
// je dois mettre ce code dans un bloc try - catch
// Le code dans le bloc "try" est le code à exécuter.
// Si ce code lève une exception, 
// Cette exception est "attrapée" dans le bloc "catch" qui suit (voir plus bas)
try 
{
    $datedenaissance = new DateTime('1981-11-12');
    
    // mettez un nom vide pour forcer le déclenchement de l'exception
    $tim = new Personne('Brown', 'Tim', $datedenaissance);
     
    echo $tim->getAge();
    
    echo "\n";
    
    // La méthode setNom retourne "$this" et permet donc le "chainage" (appeler plusieurs méthodes à la suite)
    echo $tim->setNom("White")->getNom();
    
    echo "\n";

    echo 'Bonjour ' . $tim->getInfo() .' ! ';

    echo PHP_EOL; // saut de ligne dans un terminal

    echo 'Bonjour ' . $tim .' ! '; // appel automatique de __toString()

    echo PHP_EOL; // saut de ligne dans un terminal
    
   // var_export($tim);
}
catch(Exception $ex)
{
    // Si une exeption est levée dans le bloc "try" précédent, 
    // elle est "attrapée" et disponible dans la variable $ex
    // Les informations sur l'exception sont alors disponibles dans cet objet.
    // getMessage() permet d'afficher le message d'erreur de l'exception
    echo 'Erreur: '. $ex->getMessage();
    echo "\n";
}

