<h2>Users</h2>

<?php

    $users_table = new Users();

    $id = $_GET['id'] ?? 0;

    $id = intval($id);

    if ($id > 0) {
        // Afficher 1 utilisateur

        $user = $users_table->find($id);

        if (!empty($user)) {
            echo $user['user_name'];
        } else {
            echo 'Aucun résultat';
        }
    } else {
        // Afficher tous les utilisateurs
        
        $users = $users_table->findAll();

        foreach($users as $user) {

            echo '<h2>' . $user['user_name'] . '</h2>';
            echo $user['user_email'];
            echo '<hr>';

        }
    }

?>