<?php 

class Adresse 
{
    /** @var int $numero Numéro de rue */
    private int $numero;

    /** @var string $bis Complément du Numéro de rue (bis, ter, A, B, C...) */
    private string $bis;

    /** @var string $rue Nom de rue */
    private string $rue;

    /** @var string $codePostal Code postal */
    private string $codePostal;

    /** @var string $ville Ville */
    private string $ville;


    /**
     * Initialisation d'une adresse
     * @param int $_numero Numéro de rue
     * @param string $_rue Nom de rue
     * @param string $_code Code postal
     * @param string $_ville Ville
     * @param string $_bis Complément du numéro de rue (bis, ter, A, B, C...)
     */
    public function __construct(int $_numero, string $_rue, string $_code, string $_ville, string $_bis = '')
    {

    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     * @param string $numero le numéro de rue
     * @return  self
     */ 
    public function setNumero(int $numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of bis
     */ 
    public function getBis()
    {
        return $this->bis;
    }

    /**
     * Set the value of bis
     * @param string $bis 
     * @return  self
     */ 
    public function setBis(string $bis)
    {
        $this->bis = $bis;

        return $this;
    }


    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal(string $codePostal)
    {
        if(!preg_match("/(.*)/", $codePostal)) {
            throw new Exception("Code postal invalide");
        }

        $this->codePostal = $codePostal;

        return $this;
    }
}
