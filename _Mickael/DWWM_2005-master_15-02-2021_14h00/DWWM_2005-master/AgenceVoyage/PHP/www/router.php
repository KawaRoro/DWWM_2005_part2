<?php

/**
 * ROUTER.PHP
 * Permet de simuler les réécritures d'url
 * À utiliser avec le serveur de développment intégré à PHP
 * Dans un terminal : 
 * 1° Se positionner dans le répertoire où se siture l'application web
 * 2° tapez la commande :   "php -S localhost:80 router.php"
 * 3° ouvrez un navigateur et naviguez vers http://localhost
 */

/**
 * $_SERVER['REQUEST_URI'] = chemin demandé
 * __DIR__ = chemin local du répertoire dans lequel se trouve le fichier actuel (router.php dans ce caas)
 * si le chemin n'existe pas, on redirige la requête vers index.php
 * sinon on renvoie false et PHP chargera le fichier demandé
 */
/*
if(!file_exists(__DIR__ .$_SERVER['REQUEST_URI'])) {
    require (__DIR__.'/index.php');
}
else {
    return false;
}
*/


// la ligne suivante fait exactement la même chose que la structure IF ci-dessus
// on utilise l'opérateur ternaire (? et :) à la place du IF/ELSE
return !file_exists(__DIR__ . $_SERVER['REQUEST_URI']) ? require(__DIR__ . '/index.php') : false;
