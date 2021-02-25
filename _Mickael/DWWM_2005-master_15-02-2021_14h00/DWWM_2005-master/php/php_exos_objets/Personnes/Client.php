<?php 

/**
 * Classe Client
 * 
 * Cette classe représente un client.
 * @author DWWM 2005 
 * @version 0.0.1 
 */
class Client extends Personne
{
    /** @var int $_id Identifiant du client */
    private int $_id;

    /** @var Adresse $_adresse Adresse du client */
    private Adresse $_adresse;
    
    /**
     * Initialisation d'un client
     * @param int $_id L'identifiant du client
     * @param Adresse $_adresse L'adresse du client
     */
    public function __construct(string $nom, string $prenom, DateTime $datenaissance, int $_id, Adresse $_adresse) 
    {
        parent::__construct($nom, $prenom, $datenaissance);

        $this->_id = $_id;
        $this->_adresse = $_adresse;
    }

}