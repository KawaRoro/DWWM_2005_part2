<?php

namespace Models;

/**
 * Classe d'accès aux données
 * Contient la logique d'interaction avec la table "users" (requêtes SQL)
 */
class Users 
{
    /** @var PDO $pdo La connexion PDO à utiliser */
    private \PDO $pdo;


    /**
     * Initialise une nouvelle instance de la classe Users
     */
    public function __construct()
    {
        // On récupère la connexion PDO à partir de la classe DbConnection
        $this->pdo = DbConnection::getDb();
    }

    /**
     * Retourne tous les utilisateurs
     * @return array Tous les utilisateurs
     */
    public function findAll() : array
    {
        // exécution d'une requête SQL
        $statement = $this->pdo->query("SELECT * FROM users");

        // retourne le résultat de la requête
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retourne l'utilisateur possédant le user_id "$id"
     * Si aucun résultat, retourne false
     * @parma int $id le user_id de l'utilisateur à rechercher
     * @return array|false l'utilisateur trouvé ou false si aucun utilisateur correspondant
     */
    public function find(int $id)
    {
        // Préparation d'une requête SQL
        // on y inclut des "marqueurs" qui seront remplacés par des valeurs provenant de variables.
        // dans la requête suivante, 1 marqueur ":id"
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE user_id=:id");

        // valeurs qui seront injectées dans la requête SQL préparée
        $values = [
            ':id' => $id // la valeur de "$id" remplacera le marqueur ":id"
        ];

        // exécution de la requête avec les valeurs
        if($statement->execute($values)) {
            // si la requête a fonctionné, récupération du résultat dans "$user"
            $user = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        else {
            // si la requête n'a pas fonctionné
            $user = false;
        }

        // fermeture de la requête préparée
        $statement->closeCursor(); 

        return $user; // retourne le résultat (un utilisateur ou false)
    }

    /*public function findBy($col, $val)
    {
        return false;
    }*/
}
