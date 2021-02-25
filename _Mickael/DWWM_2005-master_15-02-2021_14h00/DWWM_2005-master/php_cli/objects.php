<?php
/* Exporter les attributs d'un objet sous forme de tableau associatif */


class Personne
{
    private string $name;

    public function __construct(string $_name)
    {
        $this->name = $_name;
    }

    /**
     * conversion explicite de l'instance actuelle en tableau
     * -- résultat difficilement exploitable
     */
    public function toArrayBad()
    {
        return (array) $this; 
    }

    /**
     * Création manuelle du tableau de sortie
     * ++ maitrise des données en sortie, le + rapide
     * -- le tableau doit être mis à jour si la structure de l'objet évolue
     */
    public function toArray_Ok()
    {
        return [
            'name' => $this->name
        ];
    }

    /**
     * Parcours de l'objet actuel dans une boucle pour alimenter le tableau dynamiquement
     * ++ création dynamique du tableau
     * -- par défaut, pas de maitrise des données en sortie, tout est exporté 
     *    possibilité d'ajouter des conditions pour définir les attributs à exporter
     */
    public function toArray_Ok_Dynamic()
    {
        $result = [];

        foreach($this as $propertyName => $propertyValue)
        {
            $result[$propertyName] = $propertyValue;
        }

        return $result;
    }    
}

/**
 * fonction de "debogage" pour exporter le contenu d'une variables dans un navigateur
 */
function debug($var) 
{
    echo '<pre>'.var_export($var, true).'</pre><hr>';
}

// l'objet que l'on souhaite convertir
$p1 = new Personne("Mike");

// conversion explicite directe
$test1 = (array) $p1;
// via les méthode de l'objet (cf commentaires de ces méthodes)
$test2 = $p1->toArrayBad();
$test3 = $p1->toArray_Ok();
$test4 = $p1->toArray_Ok_Dynamic();

// affichage des résultats
debug($test1); // no OK
debug($test2); // no OK
debug($test3); // OK
debug($test4); // OK
