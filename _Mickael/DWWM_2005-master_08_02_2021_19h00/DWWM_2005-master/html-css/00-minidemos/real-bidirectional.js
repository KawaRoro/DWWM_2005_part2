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
        this.eventHandler(this);
    }
}


function onNbFlowersChange(flowersObject) 
{
    document.getElementById("wrapper").textContent = flowersObject.nbFlowers;
}   



const flowers = new Flowers(onNbFlowersChange);

var howMany = document.getElementById('howMany');


setInterval(() => {
    flowers.addFlowers(howMany.value);
}, 500);