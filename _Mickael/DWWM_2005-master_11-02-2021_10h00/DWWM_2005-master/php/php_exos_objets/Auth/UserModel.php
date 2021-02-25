<?php 

/**
 * Modèle de base pour la famille d'objets "Utilisateurs"
 * abstract = la classe ne peut pas directement être instanciée
 * $model = new UserModel() = INTERDIT
 * On instanciera les classes qui héritent de ce modèle (RealUser et FakeUser)
 */
abstract class UserModel 
{

     /**
     * Vérifie si le mot de passe fourni en argument correspond au mot de passe de l'utilisateur
     * @param string $_password le mot de passe à tester
     * @return bool true si le mot de passe correspond, sinon false
     */
    public function login(string $_password)
    {
        // password_verify: vérifie qu'un mot de passe en clair correspond au mot de passe chiffré
        if(password_verify($_password, $this->getPassword())) {
            return true;
        }

        return false;
    }


    abstract public function getUsername(): string;

    /**
     * Accesseur pour le mot de passe de l'utilisateur
     * abstract = Les classes enfants doivent implémenter cette méthode
     * Les classes enfants définissent elles-mêmes l'attribut contenant au mot de passe
     * @return string Le mot de passe chiffré de l'utilisateur
     */
    abstract protected function getPassword() : string;
}