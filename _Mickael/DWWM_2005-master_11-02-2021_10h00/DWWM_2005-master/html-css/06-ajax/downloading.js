
var h1 = document.getElementById('h1');
var p1 = document.getElementById('p1');
var p2 = document.getElementById('p2');
var p3 = document.getElementById('p3');

p1.value = 0;
p2.value = 100;

console.log(p1);

setTimeout(function() {}, 3000);


setInterval(function() {

    if(p1.value < 500) {
        /*p1.value = p1.value + 1;*/
        p1.value += 0.1;
    }
  
    p2.value -= 1;

}, 1);



/*
var xhr = new XMLHttpRequest();

var myJson;

xhr.open('GET', 'https://devoldere.net/api/employees');

xhr.addEventListener('load', () => {
    console.log(xhr.response);
    myJson = JSON.parse(xhr.response);
    console.log(myJson);
});

xhr.send();
*/