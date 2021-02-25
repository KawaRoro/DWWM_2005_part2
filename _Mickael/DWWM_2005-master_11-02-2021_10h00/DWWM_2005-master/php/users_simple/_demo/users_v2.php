<html>

<head>
    <meta charset="utf-8">
    <title>Users</title>
</head>

<body>
    <h1>Utilisateurs</h1>

    <?php 

    require '../bootstrap.php';

    $users_table = new Users();
    
    $users = $users_table->findAll();

    foreach ($users as $user) {
        echo '<h2>' . $user['user_name'] . '</h2>';
        echo $user['user_email'];
        echo '<hr>';
    }

    ?>


</body>

</html>