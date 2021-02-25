<html>
    <head>
        <meta charset="utf-8">
        <title>Users</title>
    </head>
    <body>
        <h1>Utilisateur</h1>

        <?php
            // lecture du paramètre d'url 'id' ou 0 s'il n'est pas fourni
            $id = $_GET['id'] ?? 0;

            // conversion en nombre entier
            $id = intval($id); 

            // affichage de $id
            echo $id;


            // affichage conditionnel selon la valeur de $id
            if($id > 0) {
                echo 'L\'identifiant est '.$id;
            }
            else {
                echo 'zéro';
            }
        ?>


    </body>
</html>