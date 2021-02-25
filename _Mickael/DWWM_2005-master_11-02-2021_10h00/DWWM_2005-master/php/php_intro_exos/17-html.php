<?php

/*
Si ma collection est vide, j'affiche 'aucun résultat' 
J'affiche le titre fourni en argument 1 dans une balie <H3> 
j'affiche une balise <ul> 
je parcours le tableau 
chaque élément du tableau est affiché dans un <li> 
j'affiche ma balise </ul> 
*/

function Html_List(string $title, array $collection)
{
    if(empty($collection)) {
        echo 'Aucun Résultat';
    }

    echo "<h3>$title</h3>";
    echo "<ul>";

    foreach($collection as $item) {
        echo "<li>$item</li>";
    }
    
    echo "</ul>";

}