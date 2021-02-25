# VALIDATION D'UN FORMULAIRE DE CONTACT 

- `Nom` : obligatoire, 3 caractères minimum, 30 au maximum. Lettres et espaces uniquement.
- `Email` : obligatoire, format email valide
- `Téléphone` : format 10 chiffres. Le premier chiffre est obligatoirement un 0
- `Message` : au moins 20 caractères, validation complète en backend.

Cas particulier `Téléphone` + `Email`
- Au moins l'un des 2 doit être renseigné et valide, peut-importe lequel.
- Si les 2 sont renseignés et valides, c'est également OK ;)



## Consignes 

1) Adapter les attributs `pattern` du formulaire (`contact.html`)
2) Ajouter les évènements nécessaires pour valider chaque champ "en temps réel" (onkeyup, onkeypress...)
3) Compléter le code de l'évènement `submit` se trouvant à la fin du fichier `contact.js`.
4) Ajouter les règles CSS que vous jugerez nécessaires dans les classes `.success` et `.error` du fichier `contact.css`
    - pour bien différencier les 2
5) (Bonus) Valider le formulaire coté backend dans le fichier `contact_validation.php`


## Pour vous aider : 

- [Formulaire HTML](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Mon_premier_formulaire_HTML)
- [Gestion des évènements avec Javascript](https://www.pierre-giraud.com/javascript-apprendre-coder-cours/addeventlistener-gestion-evenement/)
- [Modifier le contenu d'un élément HTML](https://www.w3schools.com/jsref/prop_html_innerhtml.asp)
- [Créer un élément HTML avec Javascript](https://developer.mozilla.org/fr/docs/Web/API/Document/createElement)
- [Ajouter/Supprimer des classes CSS à un élément HTML](https://www.w3schools.com/jsref/prop_element_classlist.asp)
- [Basculer les classes CSS d'un élément HTML](https://www.w3schools.com/howto/howto_js_toggle_class.asp)


## Pour vous titiller les méninges

- [REGEX : Tuto simple](https://www.lucaswillems.com/fr/articles/25/tutoriel-pour-maitriser-les-expressions-regulieres)
- [REGEX : Avec l'attribut "pattern"](https://montrezvous.net/developpement-web/controles-de-formulaires-en-html5.html)
- [REGEX : Avec Javascript](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/RegExp)
- [REGEX : Avec PHP](https://g-rossolini.developpez.com/tutoriels/php/regex/?page=fonctions)