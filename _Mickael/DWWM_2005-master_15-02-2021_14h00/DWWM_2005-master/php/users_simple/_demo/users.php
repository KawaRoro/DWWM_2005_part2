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

    // Connexion à une base de données
    /** @var PDO $dbConnect */
    $dbConnect = new PDO($dsn, 'root', '');

    // var_dump($dbConnect);

    // execution d'une requête SQL
    $statement = $dbConnect->query("SELECT * FROM users;");

    // var_dump($statement);

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    /*echo '<pre>';
            var_export($users);
            echo '</pre>';*/

    // affichage des utilisateurs
    foreach ($users as $user) {
        echo '<h2>' . $user['user_name'] . '</h2>';
        echo $user['user_email'];
        echo '<hr>';
    }

    ?>


</body>

</html>