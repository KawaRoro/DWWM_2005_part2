const inputNb = document.getElementById('nb'); // input
const btnCalc = document.getElementById('calc'); // bouton
const divResult = document.getElementById('result'); // résultat

/**
 * contrôle le le nombre founi en paramètre est un diviseur valide (strictement positif)
 * @param number nb le diviseur à tester
 */
const checkDivider = (nb) => {
    return new Promise((resolve, reject) => {
        nb = parseInt(nb); // conversion en nombre entier
        if(nb > 0) { // si le diviseur est > à 0, il est valide, la promesse est résolue
            resolve(nb); // promesse résolue
        }
        else { // sinon le diviseur n'est pas valide
            reject(nb + " n'est pas un diviseur valide !"); // promesse rejetée
        }
    });
}


btnCalc.addEventListener('click', () => {

    let nbToUse = inputNb.value; // récupération du nombre saisie

    checkDivider(nbToUse)   // execution d'une promesse

    .then((divider) => {    // si la promesse est résolue (resolve), le then() suivant est exécuté
        let result = 100 / divider;
        return result;      // la valeur retournée dans une promesse est récupérée en paramètre dans le then() suivant
    })                      // then() est lui même une promesse on peut donc enchainer sur un autre then()
                        
    .then((result) => {     // ici result est la valeur retournée par la promesse précédente
        divResult.textContent = 'Promesse résolue. Résultat: ' + result; // fin du traitement
    })  

    .catch((error) => {     // si une promesse est rejetée (reject), le catch() est appelé
        divResult.textContent = "Calcul impossible !";
        alert('Promesse rejetée. ' + error);
    });
})

