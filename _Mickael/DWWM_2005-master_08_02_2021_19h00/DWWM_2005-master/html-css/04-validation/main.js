
// selectionner tous les <span> dans l'élément #passwordContainer
var afficherMasquer = document.querySelectorAll('#passwordContainer span');
afficherMasquer = afficherMasquer[0]; // le 1er span de la liste
console.log(afficherMasquer);


// sélectionner le champ de type password dans le div #passwordContainer
inputPassword = document.querySelector('#passwordContainer input[type="password"]');
console.log(inputPassword);

/**
 * Modifie le type du champ password pour afficher ou masquer le mot de passe à l'utilisateur
 * @event click 
 */
afficherMasquer.addEventListener('click', (event) => {

    // affiche les informations de l'évènement dans la console
    console.log(event); 

    // si le type du champ est 'text' alors on le modifie en 'password' et inversement
    inputPassword.type = (inputPassword.type == 'text') ? 'password' : 'text'; 
});



/**
 * AJOUTER l'évènement qui vérifie la valeur dans le champ input #nom.
 * utiliser l'évènement 'keyup' 'keydown' ou 'keypress'
 * https://developer.mozilla.org/en-US/docs/Web/Events#Keyboard_events
 * 
 * Petit tuto 
 * https://www.freecodecamp.org/news/javascript-addeventlistener-example-code/
 */


var inputName = document.getElementById('nom');

inputName.addEventListener('keyup', (event) => {

/*
    if(event.key.match(event.target.pattern)) {
        console.log('ok');
    } else{
        console.log('error');
    }

    let myRegex = new RegExp(event.target.pattern);

    if(myRegex.test(event.target.value)) {
        console.log('ok');
    } else {
        console.log('error');
    }
*/

    let validationName = document.getElementById('validationNom');

    if(!event.target.value.match(event.target.pattern)) { // si la valeur du champ ne correspond pas à sa regex (définie dans pattern)
        validationName.innerHTML = '&#10060;'; // croix rouge
        validationName.classList.remove("success");
    } 
    else {
        validationName.innerHTML = '&check;'; // symbole "check" (valide)
        validationName.classList.add("success");
    }
});
