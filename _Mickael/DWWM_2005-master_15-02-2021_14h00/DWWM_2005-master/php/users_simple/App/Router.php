<?php 


class Router 
{
    /** @var string $request Requête initiale (chemin demandé) */
    private string $request;

    /** @var array $route Tableau construit à partir de la requête initiale */
    private array $route;

    /** @var string $controller Nom du contrôleur demandé (1er élément du tableau précédent) */
    private string $controller;


    /**
     * Constructeur de la classe
     * @param string $_baseUrl le chemin d'accès à l'application à partir de la racine du nom de domaine.
     * $router = new Router() : Pour un site accessible depuis le nom de domaine (http://localhost/)
     * $router = new Router('/mon_application/') : Pour un site accessible dans un sous-dossier (http://localhost/mon_application/)
     */
    public function __construct(string $_baseUrl = '/')
    {
        // Récupération du chemin demandé (à partir de la racine du nom de domaine)
        $this->request = $_SERVER['REQUEST_URI'];

        // si le chemin de base est un sous-dossier, on supprime ce sous dossier du chemin demandé.
        if($_baseUrl !== '/') {
            // Remplacement du nom du sous-dossier par une chaine vide dans la requête initialse
            // Effet : suppression du sous-dossier dans le chemin.
            $this->request = str_replace($_baseUrl, '', $this->request);
        }

        // On isole des éléments de la requête séparés par '/'
        $this->route = explode('/', $this->request);

        // Si le 1er élément du tableau contient une valeur non vide, on assigne cette valeur, sinon on assigne la valeur 'home' par défaut
        $this->controller = !empty($this->route[0]) ? $this->route[0] : 'home';
        
        // Formattage du nom (1ere lettre en majuscule, les suivantes en minuscules)
        $this->controller = mb_convert_case($this->controller, MB_CASE_TITLE);

        // Ajout du suffixe 'Controller' au nom
        $this->controller = 'Controllers\\'.$this->controller.'Controller';

        // Affiche la requête initiale
        //echo $this->request;

        // Affiche le tableau construit à partir de la requête initiale
        //echo "<pre>".var_export($this->route, true)."</pre>";

        // Affiche le nom du contrôleur déduit.
        //echo $this->controller;
    }


    /**
     * Retourne le nom du contrôleur demandé
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Retourne l'action à exécuter dans le contrôleur demandé
     */
    public function getAction()
    {
       return !empty($this->route[1]) ? $this->route[1] : 'index'; 
    }

    /**
     * Retourne la valeur du 3ème paramètre de l'url (pas encore vu ensemble)
     */
    public function getId()
    {
        return !empty($this->route[2]) ? $this->route[2] : null; 
    }
}
