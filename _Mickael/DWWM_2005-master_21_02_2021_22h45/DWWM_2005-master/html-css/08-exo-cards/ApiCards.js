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
            console.log(json); // affichage de l'objet JS dans la console
        })
        .catch((error) => {
            // si une erreur survient
        });
    }
}

let api = new ApiCards();

api.fetchData();