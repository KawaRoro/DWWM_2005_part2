<html>
    <head>
    <title>Salut</title>
    <style>
        .firstname { 
            color: red; 
        }
    </style>
    </head>
    <body>
    <h1>Mon super site</h1>

    <main>

        <?php 
            $prenom = "Mike";

            echo "<p class=\"firstname\">$prenom</p>";
        ?>

        <p class="firstname"><?=$prenom; ?></p>
    
    </main>
    </body>
</html>