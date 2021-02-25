class Flowers
{
    /**
     * 
     * @param callback eventHandler la fonction de rappel lorsque la valeur de nbFlowers change.
     */
    constructor(eventHandler)
    {
        this.nbFlowers = 2;
        this.eventHandler = eventHandler;
    }

    /**
     * @param number nbFlowers
     */
    addFlowers(nbFlowers) {
        this.nbFlowers += parseInt(nbFlowers);
        // a chaque fois que cette méthode est invoquée, on déclenche un évènement
        this.eventHandler(this);
    }
}

// évènement déclenché lorsque addFlowers est invoqué
function onNbFlowersChange(flowersObject) 
{
    document.getElementById("wrapper").textContent = flowersObject.nbFlowers;
}   


// l'évènement est lié à l'objet flowers directement dans le constructeur (injection de dépendance)
const flowers = new Flowers(onNbFlowersChange);


var howMany = document.getElementById('howMany');

// toutes les 500 millisecondes, on invoque une méthode pour mettre à jour une valeur dans l'objet flowers.
setInterval(() => {
    flowers.addFlowers(howMany.value);
}, 500);