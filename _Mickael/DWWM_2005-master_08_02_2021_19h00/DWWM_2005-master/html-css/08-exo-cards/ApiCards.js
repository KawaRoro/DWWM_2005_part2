class ApiCards 
{
    constructor()
    {
        this.url = 'https://arfp.eu/static/dataset/cards.json';
    }

    fetchData() {
        fetch(this.url)
        .then((response) => {
            return response.json(); // conversion du json réceptionné en objet JS
        })
        .then((json) => {
            console.log(json); // appel de la fonction readCars avec les données des cars en parametre
        })
        .catch((error) => {
            // next...
        });
    }
}

let api = new ApiCards();

api.fetchData();