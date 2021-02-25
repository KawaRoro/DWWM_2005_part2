<?php

$prenom = "Mike";
$age = 42;

echo 'Hello '. $prenom;

echo '<hr>';

echo "Salut $prenom";

echo '<hr>';


// structure conditionnelle
if($age >= 18) {
    echo 'Vous êtes majeur !';
}
elseif($age < 3) {
    echo 'Vous êtes un bébé !';
}
else {
    echo 'Vous êtes mineur !';
}

echo '<hr>';


// structure conditionnelle
switch($age)
{
    case 3:
        echo 'Baby spotted !';
    break;
    case 42:
    case 44:
        echo 'L\'age des rois'; 
    break;
    
}

echo '<hr>';

// boucle while & do while
$i = 0;
while($i < 10)
{
    echo "i = $i <br>";
    $i++;
}

echo '<hr>';

$i = 0;
do {
    echo "i2 = $i <br>";
    $i++;
}
while($i < 10);

echo '<hr>';

// boucle for

for($i=0; $i < 10; $i++) {
    echo "i3 = $i <br>";
}

echo '<hr>';

