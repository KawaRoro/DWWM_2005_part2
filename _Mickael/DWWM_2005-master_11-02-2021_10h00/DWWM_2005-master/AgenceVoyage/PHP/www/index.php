<?php

/**
 * ROUTAGE PHP MVC
 * 
 * Le routage permet de définir quels composants exécuter selon l'url demandée.
 * Dans le modèle MVC, le chemin contient 3 segments :
 * 1) Le contrôleur à invoquer
 * 2) La méthode à exécuter dans ce contrôleur
 * 3) Une donnée à transmettre à la méthode exécutée
 * 
 * ex: 
 * pour l'url http://localhost/users/login
 * on instancie le contrôleur "users" et on y exécute la méthode "login"
 */




/**
 * Lecture du chemin demandé 
 * $_SERVER['REQUEST_URI'] = chemin demandé
 * ex : 
 * Si url du site = http://localhost
 * Et Si requête  = http://localhost/users/login
 * Alors 
 *  $_SERVER['REQUEST_URI'] = /users/login
 * 
 * trim() permet de supprimer tout espace en début et fin de chaine. 
 * Le 2nd paramètre indique les cacractères à supprimer en début et fin de chaine
 * ex :
 * $path = '/users/login/'
 * $path = trim($path, '/')
 * echo $path // affiche " users/login "  (les / au début et à la fin ont disparu)
 */
$path = trim($_SERVER['REQUEST_URI'], '/');

// affichage du chemin
echo $path . '<br>';

/**
 * explode : Scinde une chaîne de caractères en segments
 * Le résultat sera un tableau où chaque élément correspond à un segment de la chaine
 * 1er paramètre : le caractère de séparation : tous les segments autour de ce caractère seront isolés
 * 2nd paramètre : la chaine à scinder
 * ex: 
 * $route = explode('/', 'users/login');
 * $route est maintenant un tableau contenant 2 éléments :
 * [ 
 *  0 => 'users',
 *  1 => 'login'
 * ]
 */
$route = explode('/', $path);

// affichage du tableau
echo '<pre>' . var_export($route, true);


/**
 * Les éléments de notre route sont dans le tableau $route.
 * 1er élément  : Nom du contrôleur à invoquer
 * 2ème élément : Nom de la méthode à exécuter dans la contrôleur invoqué
 * 3ème élément : PAramètre à envoyer dans la méthode exécutée (typiquement, un identifiant)
 */


// récupération du 1er élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$controller = !empty($route[0]) ? $route[0] : 'DefaultControllerName';

// récupération du 2nd élement du tableau. S'il est vide ou inexistant, on attribue une valeur par défaut
$action = !empty($route[1]) ? $route[1] : 'DefaultActionName';

// récupération du 3ème élement du tableau. S'il est vide ou inexistant, on attribue la valeur null
$param = !empty($route[2]) ? $route[2] : null;
