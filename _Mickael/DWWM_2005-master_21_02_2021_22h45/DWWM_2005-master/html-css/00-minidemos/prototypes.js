class Meuble 
{
    constructor(_nom)
    {
        this.nom = _nom;
    }

    getNom()
    {
        return this.nom;
    }

    setNom(_nouveauNom)
    {
        this.nom = _nouveauNom;
    }

}

const Meuble = function(_nom) 
{
    this.nom = _nom;
}

Meuble.prototype.getNom = function()
{
    return this.nom;
}

var meuble = new Meuble("Chaise");




console.log(meuble);
console.log(meuble.getNom());


Meuble.prototype.getNom = function()
{
    return "ok";
}

console.log(meuble.getNom());

let a = new Array();
let b = [];

a.push("a");

Array.prototype.push = function(item) {
 console.log(item);
 Array.push(a);   
}