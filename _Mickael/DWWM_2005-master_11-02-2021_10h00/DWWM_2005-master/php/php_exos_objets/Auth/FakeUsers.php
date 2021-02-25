<?php 

require_once 'IUserCollection.php';
require_once 'FakeUser.php';
/**
 * Classe Users
 * Simule une base de données d'utilisateurs
 */
class FakeUsers implements IUserCollection
{
    /** @var FakeUser[] $users les utilisateurs */
    private array $users;

    /** @var null|FakeUser $loggedUser L'utilisateur actuellement connecté (vide si utilisateur non identifié) */
    private ?FakeUser $loggedUser;

    /**
     * Initalisation de la collection d'utilisateurs
     */
    public function __construct()
    {
        $this->users = [
            new FakeUser('Tim', 'azer'),
            new FakeUser('Reda', 'azer'),
            new FakeUser('Jon', 'azer'),
            new FakeUser('Daoud', 'azer'),
            new FakeUser('Mike', 'azer'),
        ];

        $this->loggedUser = null;
    }

    /**
     * Recherche un utilisateur par son username
     * @param string $_username le nom d'utilisateur à rechercher
     * @return FakeUser|null l'utilisateur trouvé ou null si aucun utilisateur correspondant trouvé
     */
    public function getUserByName(string $_username) : ?FakeUser
    {
        // parcours de la collection d'utilisateurs
        foreach($this->users as $user) {
            // si les username correspodent
            if($_username === $user->getUsername()) {
                return $user;
            }
        }

        return null;
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

/*$users = new Users();

var_export($users->getUserByName('Toto'));

//var_export($users);
*/

