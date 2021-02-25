<?php
/**
 * BOOTSTRAP.PHP
 * Initialisation des composants de l'application MVC
 */


/**
 * Fonction d'autochargement de classes
 * @param string $_classname Le nom de la classe à charger 
 * @return bool true si la classe a été chargée correctement, false sinon.
 */
function autoload(string $_classname)
{
    $_classname = str_replace('\\', '/', $_classname);

    $_classname = (__DIR__.'/'.$_classname.'.php');

    if(is_file($_classname)) {
        require $_classname; 
    }
    else {
        exit('Erreur de chargement de classe');
    }
}

// on enregistre notre fonction "autoload" dans la pile d'autochargement de PHP
spl_autoload_register('autoload');


/** 
 * @var Router $router Initialisation de la classe Router
 */
$router = new Router('/users_simple/');

// récupération du nom du contrôleur demandé
$controllerName = $router->getController();

// création de l'instance du contrôleur
$controller = new $controllerName($router);

// on demande au contrôleur d'exécuter la requête
// et on récupère le résultat
$result = $controller->run();

// affichage du résultat
echo $result;
