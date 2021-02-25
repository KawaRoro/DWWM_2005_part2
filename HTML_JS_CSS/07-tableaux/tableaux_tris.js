// tableau de string
const names = ['Joe', 'Léo', 'Mike', 'Léa', 'Jack'];

// tableau d'objet
const cars = [
    { car_id: 1, car_brand: "Renault", car_name: "Clio", car_weight: 994 },
    { car_id: 2, car_brand: "Renault", car_name: "Kadjar", car_weight: 1912 },
    { car_id: 3, car_brand: "Peugeot", car_name: "3008", car_weight: 1604 },
    { car_id: 4, car_brand: "Toyota", car_name: "Corolla", car_weight: 1547 },
    { car_id: 5, car_brand: "Toyota", car_name: "Starlet", car_weight: 1755 },
]; 


// TABLEAU SIMPLE
// console.log(names);

names.sort(); // ordre naturel des éléments (ici ordre alphabétique)
console.log(names);

// a et b sont 2 éléments du tableau qui sont comparés
names.sort((a, b) => {
    if(a < b)
        return -1; // -1 = a est considéré inférieur à b
    if(a > b)
        return 1;  // 1 = a est considéré supérieur à b
    return 0;  // 0 = a et b sont considérés égaux (aucun effet)
}); 

// ou la version raccourcie (même résultat)
names.sort((a, b) => a - b); // par ordre croissant
console.log(names);

names.sort((a, b) => a - b).reverse(); // par ordre décroissant
console.log(names);



// TABLEAU D'OBJET
// console.log(cars);

cars.sort(); // ordre naturel 
//console.log(cars);

// par ordre croissant
// a et b sont 2 éléments du tableau qui sont comparés
cars.sort((a, b) => {
    if(a.car_name < b.car_name)
        return -1; // -1 = a est considéré inférieur à b selon les règles de tri (ici tri par nom de voiture)
    if(a.car_name > b.car_name)
        return 1;  // 1 = a est considéré supérieur à b selon les règles de tri (ici tri par nom de voiture)
    return 0;  // 0 = a et b sont considérés égaux (aucun effet)
}); 
//console.log(cars);

// par ordre croissant (version avec ternaire à la place du if) (même résultat que ci-dessus)
cars.sort((a, b) => ((a.car_name < b.car_name) ? -1 : (a.car_name > b.car_name ? 1 : 0)));
//console.log(cars);

// ordre décroissant = appliquer la méthode reverse sur le tableau après le tri
cars.reverse();
//console.log(cars);

// ou le tout en 1 instruction (tri par ordre croissant et inversion de l'ordre final)
cars.sort((a, b) => ((a.car_name < b.car_name) ? -1 : (a.car_name > b.car_name ? 1 : 0))).reverse();
console.log(cars);





/**
 * fonction qui trie un tableau d'objet par un de ses attributs 
 * on accède à un attribut d'un objet par son nom en utilisant la syntaxe des tableaux.
 * ex pour l'objet :
 *      var obj = {name: "Mike", level: 60 }
 * je peux accéder à l'attribut "name" de 2 manières :
 *      var myName = obj.name
 * ou
 *      var myName = obj['name']
 * Cette fonction utilise la 2ème méthode.
 * 
 * @param Array inputArray un tableau d'objet
 * @param String attributeName le nom d'une propriété existante dans les objets stockés dans le tableau
 */
sortArrayOfObjects = (inputArray, attributeName) => {
    inputArray.sort((a, b) => {
        if(a[attributeName] < b[attributeName]) 
            return -1; // a est considéré inférieur à b
        if(a[attributeName] > b[attributeName]) 
            return 1; // b est considéré inférieur à a
        return 0; // les 2 sont égaux
    });

    return inputArray;
}

// exemple d'utilisation

// trier les voitures par leur marque (ordre croissant) :
var myCars = sortArrayOfObjects(cars, 'car_brand');
console.log(myCars);

// trier les voitures par leur poids (ordre décroissant) : 
var myCars = sortArrayOfObjects(cars, 'car_weight').reverse();
console.log(myCars);