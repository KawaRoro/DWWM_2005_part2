class MyMessage
{
    /**
     * @param callback eventHandler la fonction de rappel lorsque la valeur de 'message' change.
     */
    constructor(eventHandler)
    {
        this.message = '';
        this.eventHandler = eventHandler;
    }

    /**
     * @param String message
     */
    setMessage(yourMessage) {
        this.message = yourMessage
        .trim()
        .replaceAll("\n---\n", '<hr>')
        .replaceAll("\n", '<br>');
        
        // a chaque fois que cette méthode est invoquée, on déclenche un évènement
        this.eventHandler(this);
    }
}

// évènement déclenché lorsque setMessage est invoqué
function onMessageUpdate(myMessage) 
{
    document.getElementById("yourPreview").innerHTML = myMessage.message;
}   


// l'évènement est lié à l'objet myMessage directement dans le constructeur (injection de dépendance)
const myMessage = new MyMessage(onMessageUpdate);


var yourMessage = document.getElementById('yourMessage');


// mise à jour de la preview en temps réel
yourMessage.addEventListener('keyup', () => {
    myMessage.setMessage(yourMessage.value);
});
