<?php

/**
 * Classe Personne
 * 
 * Cette classe représente une personne
 * Exemple d'utilisation : 
 * $personne = new Personne('nom', 'prenom', nex DateTime('2020-11-01'));
 * 
 * @author Tim
 * @version 0.0.1
 * @abstract
 * @copyright 2020 Tim, inc
 * @license MIT
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
*/
class Personne
{
    /** @var string $_nom Le nom de la personne */
    private string $_nom;

    /** @var string $_prenom Le prenom de la personne */
    private string $_prenom;

    /** @var int $_age L'age de la personne */
    private int $_age;


    /** 
     * Constructeur de la classe
     * @param string $nom Le nom de la nouvelle personne 
     * @param string $prenom Le prénom de la nouvelle personne
     * @param DateTime $datenaissance 
     */
    public function __construct(string $nom, string $prenom, DateTime $datenaissance)
    {
        $this->setNom($nom);

        $this->_prenom = $prenom;

        $today = new DateTime(); // new DateTime sans paramètre = date du jour

        $diff = $today->diff($datenaissance); // différence entre la date du jour et la date de naissance

        $this->_age = $diff->y; // le nombre d'années de différence = l'age de la personne
    }

    /** 
     * Retourne le nom de la personne
     * @return string le nom de la personne
     */
    public function getNom(): string
    {
        return $this->_nom;
    }  

    /** 
     * Retourne l'age de la personne
     * @return int l'age de la personne
     */
    public function getAge(): int
    {
        return $this->_age;
    }
    
    /**
     * Retourne le prénom de la personne
     * @return string Le prénom de la personne 
     */
    public function getPrenom(): string 
    {
        return $this->_prenom;
    }

    /**
     * Redéfinir le nom de la personne
     * @param string $nom Le nouveau de la personne 
     * @return Personne L'instance actuelle
     * @throws Exception Le nom est vide
     */
    public function setNom(string $nom) : self
    {
        // Si le nom est vide, on lève une exception avec le message d'erreur à remonter en paramètre.
        // cette exception sera "attrapée" dans le code utilisant cette métohde (voir test.php)
        if(empty($nom)) {
            throw new Exception("Le nom est vide !");
            // lorsqu'une exception est levée, l'exécution de la méthode s'interrompt.
        }

        $this->_nom = $nom;

        return $this;
    }

    public function getInfo()
    {
        return $this->_nom . ' ' . $this->_prenom . ' ' . $this->_age;

        //return "$this->nom $this->prenom $this->age";
    }

    public function __toString()
    {
        return $this->_nom . ' ' . $this->_prenom . ' ' . $this->_age;

        //return "$this->nom $this->prenom $this->age";
    }
}
