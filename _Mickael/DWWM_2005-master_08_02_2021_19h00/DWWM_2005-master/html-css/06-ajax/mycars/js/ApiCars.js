class ApiCars 
{
    constructor(cars)
    {
        this.mycars = cars;
        this.url = 'https://devoldere.net/api/cars';
    }

    fetchData() {
        fetch(this.url)
        .then((response) => {
            return response.json(); // conversion du json récpetionné en objet JS
        })
        .then((json) => {
            this.mycars.readCars(json.data.slice(0, 30), true); // appel de la fonction readCars avec les données des cars en parametre
        })
        .catch((error) => {
            // next...
        });
    }
}

/*
myClass = function(name) {
    this.name = name;
}

myClass.prototype.getName = function()
{
    return this.name;
}

Array.prototype.push = function()
{

}



myObj = new myClass("Mike");
myObj2 = new myClass("Mike");

myObj.getName();
*/