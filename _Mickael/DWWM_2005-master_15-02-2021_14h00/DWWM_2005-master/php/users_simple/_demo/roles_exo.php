<html>
<head>
    <meta charset="utf-8">
    <title>Users</title>
</head>
<body>
    <h1>Rôles</h1>

    <?php 
    /**
     * CONSIGNES : 
     * 
     * Créez la classe "Roles" et la classe "Role"
     * "Roles" contient les requêtes SQL pour la table "roles"
     * "Role" est une représentation objet d'un role
     * 
     * Ce script fonctionne comme celui des utilisateurs.
     * Si un id est fourni en paramètre
     *  afficher le rôle correspondant ou 'aucun rôle trouvé' si aucun rôle ne correspond à l'id fourni
     * Sinon
     *  afficher tous les rôles
     *  
     */

    require 'bootstrap.php';

    $roles_table = new Roles();

    $id = $_GET['id'] ?? 0;

    $id = intval($id);

    if ($id > 0) {
        // Afficher 1 rôle
        
    } else {
        // Afficher tous les rôles
    }

    ?>

</body>
</html>