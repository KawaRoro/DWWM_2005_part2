<?php 

require_once 'Db.php';
require_once 'IUserCollection.php';
require_once 'RealUser.php';

class RealUsers implements IUserCollection
{

    private PDO $pdo;

    private ?RealUser $loggedUser;


    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    /**
     * Recherche un utilisateur par son username
     * @param string $_username le nom d'utilisateur à rechercher
     * @return FakeUser|null l'utilisateur trouvé ou null si aucun utilisateur correspondant trouvé
     */
    public function getUserByName(string $_username): ?RealUser
    {
        /** @var PDOStatement|false $stmt
         * Dans le code SQL, ":toto" est un marqueur
         * On place des marqueurs aux emplacements où des données sont attendues
         */
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_name=:toto LIMIT 1;");

        // valeurs qui vont remplacer les marqueurs (ici la valeur de $_username remplacera le marqueur ':toto')
        // ce tableau sera envoyé en paramètre de $stmt->execute() (voir la suite)
        $values = [
            ':toto' => $_username
        ];

        // on souhaite que le résultat de la requête soit stocké dans une instance de 'RealUser'
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'RealUser');
        
        // si la requête est valide et que la requête a bien été exécutée
        // c'est ici qu'on envoie le tableau "$values" à la methode $stmt->execute()
        if($stmt !== false && $stmt->execute($values)) {

            /** @var UserModel $user 
             * Récupère la 1ère ligne de resultat dans une instance de "RealUser"
             * Si aucun résultat, $stmt->fetch() renvoie FALSE
            */
            $user = $stmt->fetch();

            // si l'utilisateur a été trouvé
            if($user !== false) {
                // utilisation de la méthode UserModel::login() pour vérifier le mot de passe
                return $user;
            }
            
            return null;   
        }
    }

    /**
     * Identifie un utilisateur
     * @param string $_username Le nom d'utilisateur
     * @param string $_password Le mot de passe de l'utilisateur
     * @return bool true si identification réussie, sinon false
     */
    public function login(string $_username, string $_password) : bool
    {
        $user = $this->getUserByName($_username);

        // si l'utilisateur existe
        if($user !== null) {
            // si le mot de passe est correct
            if($user->login($_password) === true) {
                $this->loggedUser = $user;
                return true;
            }
        }

        return false;
    }

    /**
     * Retourne l'utilisateur identifié
     * @return null|UserModel L'utilisateur identifié ou null si non identifié
     */
    public function getLoggedUser() : ?UserModel
    {
        return $this->loggedUser;
    }
}