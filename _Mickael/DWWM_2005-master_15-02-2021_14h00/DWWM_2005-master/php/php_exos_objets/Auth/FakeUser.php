<?php 

class FakeUser extends UserModel
{
    /** @var string $username Nom d'utilisateur */
    private string $username;

     /** @var string $password mot de passe (chiffré) de l'utilisateur */
    private string $password;


    /**
     * Initialisation d'un utilisateur
     * @param string $_username le nom d'utilisateur
     * @param string $_password le mot de passe de l'utilisateur (sera directement chiffré)
     */
    public function __construct(string $_username, string $_password)
    {
        $this->username = $_username;

        // password_hash : chiffre un mot de passe
        $this->password = password_hash($_password, PASSWORD_BCRYPT);
    }

    protected function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @return string Le nom de l'utilisateur courant
     */ 
    public function getUsername(): string
    {
        return $this->username;
    }

}
