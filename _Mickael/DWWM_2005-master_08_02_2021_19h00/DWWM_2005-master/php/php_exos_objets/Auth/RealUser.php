<?php 

class RealUser  extends UserModel
{
    private int $user_id;

    /** @var string $user_name Nom d'utilisateur */
    private string $user_name;

    private string $user_email;

    /** @var string $user_pwd mot de passe (chiffré) de l'utilisateur */
    private string $user_pwd;

    private int $user_role;

    protected function getPassword() : string
    {
        return $this->user_pwd;
    }

    /**
     * @return string Le nom de l'utilisateur courant
     */ 
    public function getUsername(): string
    {
        return $this->user_name;
    }
}