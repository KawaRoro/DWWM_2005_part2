const http = require('http'); // Module HTTP intégré à NodeJs (permet de créer un serveur web)
const url = require('url'); // Module URL intégré à NodeJs (permet d'analyser des urls)

const Employee = require('./models/Employee.js');

// https://media.arfp.eu/articles/actualités
// 127.0.0.1
// localhost
// http://localhost:11000

const host = "localhost"; // nom du domaine
const port = "11000"; // > à 1024 & < à 65535


var employee = new Employee('DEV', 'Mike');

//employee.#lastname;

var employeeJson = employee.toJson();

/**
 * Cette fonction sera exécutée à chaque requête vers le serveur HTTP
 * @param request Les données de la requête
 * @param response un objet reponse à compléter et à renvoyer au client (navigateur)
 */
const serverRequest = function(request, response) {

    console.log(request.url);
    let u = url.parse(request.url);
    //console.log(u);

    let message = "";

    switch(u.pathname)
    {
        case '/':
            message = employeeJson;
        break;
        case '/articles/':
            message = "Vous êtes sur la page articles";
        break;
        case '/actus/':
            message = "Vous êtes sur la page actus";
            break;
        default:
           message = '404 page non trouvée';
        break;
    }

    response.setHeader("Content-Type", "application/json; charset=utf-8");

    response.end(message);
}

// création d'une instance d'un serveur HTTP
// Le paramètre est la fonction de rappel à exécuter à chaque requête vers le serveur
const server = http.createServer(serverRequest);

/**
 * Cette fonction sera exécutée au lancement du serveur HTTP
 * et sera appelée en "callback" à la dernière ligne de ce script 
 */
const serverOpen = function() {
    console.log('Server is listening');
}

// Démarrage du serveur, le serveur écoute sur le port spécifié
// @param port          : le port d'écoute du serveur
// @param host          : le nom de domaine ou adresse ip du serveur
// @param serverOpen    : la fonction à exécuter lorsque le serveur sera démarré
server.listen(port, host, serverOpen);


// node server.js dans un terminal pour démarrer le serveur.
// Tant que le terminal reste ouvert, le serveur écoute.
// Fermer le terminal stoppe le serveur.
// CTRL + C dans le terminal stoppe le serveur.