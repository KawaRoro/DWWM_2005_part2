<?php 

/**
 * Contrat : Identification Utilisateur
 * Les classes qui implémentent cette interface permmettent :
 * - d'identifier un utilisateur via son nom d'utilisateur et son mot de passe
 * - de lire les données de l'utilisateur identifié
 */
interface IUserCollection
{
    /**
     * Identifie un utilisateur
     * @param string $_username Le nom d'utilisateur
     * @param string $_password Le mot de passe de l'utilisateur
     * @return bool true si identification réussie, sinon false
     */
    public function login(string $_username, string $_password) : bool;

    /**
     * Retourne l'utilisateur identifié
     * @return null|UserModel L'utilisateur identifié ou null si non identifié
     */
    public function getLoggedUser() : ?UserModel;
}