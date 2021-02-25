<?php

/**
 * Classe bastraite
 * Une classe Abstraite ne peut pas être instanciée.
 * Elle sert de base à une famille d'objets (ici, les contrôleurs)
 * Tous les contrôleurs héritent de cette classe
 */
abstract class Controller 
{
    /** @var Router $router le router */
    protected Router $router;

    /**
     * Initialisation du contrôleur
     * @param Router $_router Le router à utiliser
     */
    public function __construct(Router $_router)
    { 
        $this->router = $_router; 
    }

    /**
     * Exécution de la requête
     */
    public function run()
    {
        // récupération de l'action à partir du routeur
        $action = $this->router->getAction();

        // si l'action demandée ne correspond à aucune méthode du contrôleur actuel
        // on lève une exception
        if(!method_exists($this, $action)) {
            throw new Exception("Invalid Action");
        }

        // on exécute l'action et on retourne le résultat
        return $this->$action(); 
    }

    /**
     * Retourne la vue demandée
     * @param string $view Le nom de la vue à utiliser 
     * @param array $data Les données associées à la vue
     * @param bool $layout inclure la vue dans le "layout" (true) ou pas (false)
     */
    public function view(string $view, array $data, bool $layout = true)
    {
        // consutrction du chemin vers le fichier correspondant à la vue demandée
        $path = (__DIR__.'/Views/'.$view.'.php');

        // extraction des données du tableau $data
        extract($data);

        // Démarrage du tampon d'affichage
        ob_start();

        // inclusion de la vue (l'affichage est mis en attente grâce à ob_start())
        require $path;

        // récupération des données temporisées par ob_start()
        $result = ob_get_clean();

        // si le paramètre $layout = true
        // on inclut la vue dans le "layout" du site
        if($layout === true) {
            $result = $this->view('layout', ['page' => $result], false);
        }            

        // renvoi du résultat (la vue compilée)
        return $result;
    }

    /**
     * Action par défaut d'un contrôleur
     * la méthode est "abstraite" (abstract)
     * Une méthode abstraite ne contient pas de code
     * Toutes les classes qui héritent de Controller DOIVENT implémenter les méthodes abstraites !
     */
    abstract public function index();
}