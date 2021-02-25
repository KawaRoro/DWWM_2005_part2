<?php

// validation du formulaire
/*
$_GET; // données transmises par l'url
$_POST; // données transmises par un formulaire (methode POST)
$_FILES; // fichiers transmis par formulaire (upload)
$_SERVER; // généré par PHP, contient les info du serveur ET de la requête
$_SESSION; // données qu'on va stocker coté serveur
*/

// Démarrage d'une session (obligatoire pour manipuler la variable $_SESSION)
session_start();

require '../Personne.php';
require 'PersonneViewModel.php';

// si un formulaire a été soumis
if ($_POST) {
    // initialisation du ViewModel associé
    // Le ViewModel valide le formulaire soumis (il connait les champs à valider)
    $viewmodel = new PersonneViewModel();


    // Récupération de la Personne créée grâce aux données du formulaire
    $personne = $viewmodel->validate();

    // Sérialisation de l'objet personne récupéré
    // Sérialisation = conversion d'un objet en un format transmissible sur un réseau (json, xml, binaire, texte)
    // Désérialisation = opération inverse
    $_SESSION['personne'] = serialize($personne);

    // redirection HTTP vers "view_Personne.php"
    header('location: view_Personne.php');
    exit; // exit nécessaire après une redirection HTTP
       


    /** @deprecated  
     * Affichage des données de l'objet Personne créé dans le ViewModel.
     * L'affichage est réalisé dans la vue "view_Personne.php"
     * 
    */
    /*
    echo 'Le nom est: ' . $personne->getNom();
    echo '<br>';
    echo $personne->getPrenom();
    echo '<br>';
    echo $personne->getAge();
    echo '<br>';
    */
}
else {
    $personne = null;
}
