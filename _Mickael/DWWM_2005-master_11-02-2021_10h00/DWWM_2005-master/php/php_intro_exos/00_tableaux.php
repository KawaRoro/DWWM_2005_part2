<?php
$maVar =  ['DEVOLDERE', 'CHATELOT', 'THIRY', 'ROCHE', 'LEROY'];

$maVar[] = 'HAMZA'; // ajout de hamza à la fin du tableau

array_push($maVar, 'BROWN'); // idem pour BROWN

echo count($maVar); // nb d'élément s dans le tableau
echo "\n";

echo reset($maVar); // 1er élément du tableau
echo "\n";

echo end($maVar); // dernier élément du tableau
echo "\n";


if(empty($maVar)) { // vérififer si un tableau est vide
    return null;
}

echo "\n";

$roles = [
    205 => 'Admin',
    112 => 'Utilisateur',    
];

var_export($roles);

echo "\n";

$user = [
    'user_name' => 'Mike',
    'user_email' => 'm@m.fr',    
];

var_export($user);

echo "\n";

echo $user['user_name'];

echo "\n";
echo "\n";
echo "\n";
echo "\n";






