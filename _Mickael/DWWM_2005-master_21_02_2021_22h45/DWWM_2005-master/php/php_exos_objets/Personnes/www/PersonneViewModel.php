<?php
/**
 * Validation du formulaire de page view_Personne.php
 * 
 * La classe connait les éléments du formulaire à valider.
 * et contrôle les données dudit formulaire.
 * Si toutes les données sont validées, crée une instance de la classe Personne.
 */
class PersonneViewModel
{
    /** @var string $nom Le nom de la personne */
    private string $nom = '';

    /** @var string $prenom Le prénom de la personne */
    private string $prenom = '';

    /** @var DateTime $datenaissance La date de naissance de la personne */
    private ?DateTime $datenaissance = null;


    public function __construct()
    {
        // Si un des champs requis est vide 
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['datenaissance'])) {
            exit('Formulaire incomplet');
        }

        $this->validate_nom($_POST['nom']);
        $this->validate_prenom($_POST['prenom']);
        $this->validate_date($_POST['datenaissance']);

        /*
        foreach($this as $propertyName => $propertyValue)
        {
            if(empty($_POST[$propertyName])) {
                exit('Le champ '.$propertyName.' est vide');
            }
            else {
                $fonction = 'validate_'.$propertyName;
                $this->{$fonction}($_POST[$propertyName]);
            }
        }
*/
    }

    /**
     * Valide un nom
     * Supprime les caractères spéciaux (à terminer)
     * @param string $_nom Le nom à valider
     */
    public function validate_nom(string $_nom)
    {
        $_nom = strip_tags($_nom); // suppression des balises HTML ("<script>alert()</script>" --> "alert()")
        $_nom = basename($_nom); // suppression de toute notion de "chemin" ("/home/mike/www" --> "www")
        $this->nom = $_nom;
    }

    /**
     * Valide un prénom
     * Supprime les caractères spéciaux (à terminer)
     * @param string $_prenom Le prénom à valider
     */
    public function validate_prenom(string $_prenom)
    {
        $_prenom = strip_tags($_prenom);
        $_prenom = basename($_prenom);
        $this->prenom = $_prenom;
    }

    /**
     * Valide une date de naissance
     * Cette date doit être antérieure ou égale à (dateDuJour moins 13 ans)
     * @param string $_date La date de naissance à valider
     */
    public function validate_date(string $_date)
    {
        try {
            // Si la date n'est pas valide, une exception est levée
            $_date = new DateTime($_date);

            $ageLegal = new DateTime(); // date d'aujourd'hui

            $ageLegal->modify('-13 year'); // modification de la date d'aujourd'hui (date du jour moins 13 ans)

            //var_export($today);
            // si la date de naissance est plus récente que la date $ageLegal
            if ($_date >= $ageLegal) {
                exit('Tu es trop jeune');
            }

            $this->datenaissance = $_date;
            
        } catch (Exception $ex) {
            exit('Date invalide');
        }
    }

    /**
     * Retourne une instance de la classe Personne avec les données validées.
     */
    public function validate()
    {
        return new Personne($this->nom, $this->prenom, $this->datenaissance);
    }
}
