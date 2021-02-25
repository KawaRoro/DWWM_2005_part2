<?php

// Si pas de formulaire soumis, redirection vers le formulaire
/*if(empty($_POST)) {
    header('location: contact.html');
    exit;
}*/

$isValid = false; // par défaut, le formulaire est considéré comme invalide.



/*
Elements à éliminer
    - balises html   --> strip_tags($str);
    " ' / \ < > * \0  --> regex + html_entities($str)
    - espace en debut et fin de chaine   --> trim($str) / ltrim($str) / rtrim($str)

Valider un email 
    regex
    filter_var($str, FILTER_VALIDATE_EMAIL);
Valider un numéro de téléphone 
    regex
    
Valider un nombre entier
intval($int);

Valider un nombre float
floatval($float);

Valider un numérique 
is_numeric($number)

Valider une date 
    try { new DateTime($date); } catch { }
*/

var_export($_POST);

$name = $_POST['contactName'];

if(preg_match('/^[A-Za-z0-9]+$/', $name)) {
    echo 'Nom OK';
}

exit;

/**
 * TODO : 
 * 1) Vérifier que le formulaire est complété : 
 *  - Champs "contactName", "contactMessage": champs obligatoires
 *  - Champs "contactEmail", "contactPhone" : au moins un des deux doit être renseigné
 * 2) Vérifier le format des champs complétés :
 *  - Nom: 3 caractères minimum, 30 au maximum. Lettres et espaces uniquement
 *  - Nom          : 3 caractères minimum, 30 au maximum. Lettres et espaces uniquement.
 *  - Email        : format email valide
 *  - Téléphone    : format 10 chiffres. Le premier chiffre est obligatoirement un 0
 *  - Message      : au moins 20 caractères, validation complète en backend.
 * 
 * Ajouter ci-dessous les règles de validation du formulaire.
 * Si les données du formulaire sont valides, affecter la valeur "true" à la variable $isValid déclarée plus haut.
 */

// votre code ici




// Si les données du formulaire sont invalides: redirection vers le formulaire
if($isValid !== true) {
    header('location: contact.html?error=1');
    exit;
}



// Formulaire OK, Affichage du contenu de la variable $_POST.
echo '<pre>';
echo var_export($_POST, true);
echo '</pre>';