<?php 
require_once 'Db.php';
require_once 'IUSerCollection.php';
require_once 'UserModel.php';
require_once 'FakeUser.php';
require_once 'FakeUsers.php';
require_once 'RealUser.php';
require_once 'RealUsers.php';

// démarre une session PHP (obligatoire pour manipuler la variable $_SESSION)
session_start();

class Session
{

    /**
     * Retour l'utilisateur stocké en session
     * @return UserModel|null l'utilisateur stocké en session ou null si aucun utilisateur
     */
    static public function getUser() : ?UserModel
    {
        return $_SESSION['user'] ?? null;
    }

    /**
     * Retourne le message d'erreur stocké en session ou null si aucun message d'erreur
     * Si un message d'erreur existe, il est supprimé de la session après lecture.
     * @return string|null Le message d'erreur ou null si aucun message à retourner
     */
    static public function getError(): ?string
    {
        $msg = $_SESSION['error'] ?? null;
        $_SESSION['error'] = null;
        return $msg;
    }

    /**
     * Contrôle si l'utilisateur courant est identifié.
     * S'il n'est pas identifié, redirige vers le formulaire de connexion
     */
    static public function isValidUser()
    {
        $user = Session::getUser();

        if($user === null) {
            $_SESSION['error'] = 'Vous devez vous connecter !';
            header('location: index.php');
            exit;
        }
    }

    /**
     * Identifie un utilisateur
     */
    static public function Auth(IUserCollection $users)
    {
        // si le formulaire d'identification a été soumis
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            
            $_SESSION['user'] = null;
            $username = strip_tags($_POST['username']); // suppression des balises HTML
            $username = basename($username); // suppression de toute notion de "chemin"
            $password = strip_tags($_POST['password']);

            if($users->login($username, $password) === true) {
                $_SESSION['user'] = $users->getLoggedUser();
                // redirection vers l'espace membres (header + exit)
                header('location: espace_membres.php');
                exit; 
            }       

            // si la redirection ci-dessus n'a pas eu lieu
            // cela signifie que l'utilisateur est inexistant ou que le mot de passe est incorrect 
            // dans ce cas, on définit un message d'erreur pour la session et on redirige vers le formulaire
            $_SESSION['error'] = 'Identifiant ou mot de passe incorrect';
            header('location: index.php');
            exit;

        } // fin du if($_POST)

    }


}

