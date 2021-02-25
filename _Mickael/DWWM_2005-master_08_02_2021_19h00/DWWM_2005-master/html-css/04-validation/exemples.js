// var a = /^[a-zA-Z]+$/;

// sélectionner un élément par son id
var titre = document.getElementById('titre'); // le plus rapide
var titre2 = document.querySelector('#titre');

var legend = document.getElementById('legend'); // le plus rapide



console.log (titre);
console.log (titre2);

// modifier le style d'un élément
titre.style.color = 'yellow';

// ajouter une class CSS à un élément
titre.classList.add('rouge');

// créer un élément HTML (ici balise a)
var texte = document.createElement('a');

// ajouter un élément HTML à l'intérieur d'un autre
titre.append(texte);
// le même élément ne peut aparaitre qu'une fois, ici il sera frinalement dans l'élément "legend"
legend.append(texte);