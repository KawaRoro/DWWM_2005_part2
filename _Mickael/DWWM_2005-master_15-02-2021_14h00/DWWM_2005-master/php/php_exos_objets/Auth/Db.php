<?php 

/**
 * SINGLETON PATTERN
 */
class Db 
{
    /** @var PDO $pdo la connexion PDO */
    static private ?PDO $pdo = null;
    
    /**
     * Initialise la connexion PDO si elle n'existe pas.
     * L'objet PDO est stocké dans l'attribut statique "$pdo"
     * @return PDO la connexion PDO
     */
    static public function getInstance()
    {
        if(Db::$pdo === null) {

            $config = require 'config.php';

            if(!is_array($config)) {
                throw new Exception('Invalid config !');
            }

            $dsn = 'mysql:host='.
                $config['host'].';port='.
                $config['port'].';dbname='.
                $config['dbname'].';charset=utf8';

            // $dsn = 'mysql:host=localhost;port:3306;dbname=dbusers_simple;charset=utf8'; 

            Db::$pdo = new PDO($dsn, $config['user'], $config['pass']);
        }

        return Db::$pdo;
    }
    
    /**
     * Dans le pattern Singleton, le constructeur est privé
     * On ne peut pas instancier cette classe
     */
    private function __construct() 
    {

    }
}