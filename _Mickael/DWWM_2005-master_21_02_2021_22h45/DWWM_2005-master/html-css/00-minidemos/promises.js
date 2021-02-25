const myPromise = new Promise((resolve, reject) => {
    
    setTimeout(() => {
        var h1 = document.createElement('h1');
        h1.textContent = 'Un super titre';
        document.body.appendChild(h1);
        resolve('ok');
    }, 2000);
});

myPromise
.then((response) => {
    console.log(response);
    return response.toUpperCase();
    
})
.then ((toto) => {
    console.log(toto);
    return toto.toLowerCase();
})
.then((tata) => {
    console.log(tata + ' fin');
})
.catch((error) => {
    alert(error);
});


console.log('Salut');