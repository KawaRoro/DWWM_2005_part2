<?php 

namespace Models;

/**
 * SINGLETON PATTERN
 */
class DbConnection 
{
    /** @var \PDO $pdo La connexion PDO */
    private static $pdo = null;

    /**
     * Initialise la connexion PDO si elle n'existe pas.
     * L'objet PDO est stocké dans l'attribut statique "$pdo"
     * @return PDO la connexion PDO
     */
    public static function getDb()
    {
        if(DbConnection::$pdo === null) {
            DbConnection::$pdo = new \PDO('mysql:host=localhost;port=3306;dbname=db_users_simple;charset=utf8', 'root', '');
        }
            
        return DbConnection::$pdo;
    }

    private function  __construct()
    {
        
    }
}