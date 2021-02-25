
const message = document.getElementById('message');

const messageResult = document.getElementById('messageResult');


message.addEventListener('keyup', () => { 
    messageResult.value = message.value;
});


messageResult.addEventListener('click', () => { 
    message.value = messageResult.value;
});