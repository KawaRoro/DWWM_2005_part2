<html>

<head>
    <meta charset="utf-8">
    <title>Users</title>
</head>

<body>
    <h1>Utilisateurs</h1>

    <?php 
    // Data Source Name = Chaine de connexion 
    $dsn = 'mysql:host=localhost;port=3306;dbname=db_users_simple;charset=utf8';

    /** @var PDO $dbConnect */
    $dbConnect = new PDO($dsn, 'root', '');

    /**
     * CONSIGNES :
     * 
     * Si le paramètre 'id' est fourni dans l'url: 
     *      Afficher l'utilisateur correspondant à l'id fourni
     *      Afficher 'aucun résultat' si aucun utilisateur trouvé
     * Sinon
     *      Afficher tous les utilisateurs
     * 
     */

    $id = $_GET['id'] ?? 0;

    $id = intval($id);

    if ($id > 0) {

        $statement = $dbConnect->query("SELECT * FROM users WHERE user_id=$id");

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            echo $user['user_name'];
        } else {
            echo 'Aucun résultat';
        }
    } else {
        // TODO: afficher tous les utilisateurs

        $statement = $dbConnect->query("SELECT * FROM users");

        while(false !== ($user = $statement->fetch())) {

            echo '<h2>' . $user['user_name'] . '</h2>';
            echo $user['user_email'];
            echo '<hr>';

        }
    }




    ?>


</body>

</html>