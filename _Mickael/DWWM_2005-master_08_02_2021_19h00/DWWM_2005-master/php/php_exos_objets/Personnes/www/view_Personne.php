<?php
// on inclut le fichier de traitement du formulaire 
require 'proc_Personne.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        label {
            display: inline-block;
            width: 100px;
        }

        input,
        button {
            width: 200px;
        }

        .form-item {
            margin: 10px;
        }

        button,
        input[type="submit"] {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Personnes</h1>
    <section>
        
        <?php
        // si une entrée 'personne' existe dans la session en cours
            if(!empty($_SESSION['personne'])) {
                $personne = unserialize($_SESSION['personne']); // deserialisation de la personne
                echo 'Personne ajoutée: '. $personne->getNom(); // affichage du nom
                //$_SESSION['personne'] = null;
                unset($_SESSION['personne']); // suppression de l'objet personne de la session
            }
        ?>
    
    </section>

    <form action="view_Personne.php" id="monForm" method="post">

        <div class="form-item">
            <label for="id_nom">Nom: </label>
            <input type="text" name="nom" id="id_nom" value="" placeholder="Saisissez votre nom">
        </div>

        <div class="form-item">
            <label for="id_prenom">Prénom: </label>
            <input type="text" name="prenom" id="id_prenom" value="" placeholder="Saisissez votre prénom" required="required">
        </div>

        <div class="form-item">
            <label for="id_date">Date de naissance: </label>
            <input type="date" name="datenaissance" id="id_date">
        </div>
        <!-- <input type="submit" value="Valider"> -->
        <button type="submit">Valider</button>
    </form>

    <img src="http://localhost/img.php?token=acdf345FCD3433" />

    <script>
        document.getElementById("monForm").addEventListener('submit', function(event) {

        });
    </script>

</body>

</html>