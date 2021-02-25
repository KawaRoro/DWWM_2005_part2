
class MyCars
{

    constructor(elementId)
    {
        this.data = null;
        this.element = document.getElementById(elementId);
    }

    /**
     * lit un tableau contenant des objets "cars"
     * le tableau provient du JSON récupéré par fetch() (plus bas)
     * @param array data les données des voitures
     */
    readCars(data, force = false)
    {
        if((this.data == null) || (force === true)) {
            this.data = data;
        }
        
        // vidage du contenu actuel
        this.element.innerHTML = "";

        // pour chaque voiture de la collection
        for (let myCar of data) {

            // création d'une nouvelle ligne de tableau
            let line = document.createElement('tr'); 

            // création des cellules
            let tdId = document.createElement('td'); // cellule ID
            let tdName = document.createElement('td'); // cellule Nom
            let tdWeight = document.createElement('td'); // cellule Poids
            let tdOrigin = document.createElement('td'); // cellule Origine

            // ajout des données dans les cellules
            tdId.innerHTML = myCar.car_id;
            tdName.innerHTML = myCar.car_name;
            tdWeight.innerHTML = myCar.car_weight;
            tdOrigin.innerHTML = myCar.car_origin;

            // ajout des cellules à la ligne courante
            line.appendChild(tdId);
            line.appendChild(tdName);
            line.appendChild(tdWeight);
            line.appendChild(tdOrigin);

            // ajout de la ligne au tableau
            this.element.appendChild(line);
        }
        
        this.setCriteriaBrand(data);
    }

    /**
     * Parcourir le tableau data
     * isoler le nom de chaque voiture
     * isoler la marque dans chaque nom de voiture (la 1ere partie du nom)
     * @param Array data 
     */
    setCriteriaBrand(data)
    {
        console.log();

        let selectBrand = document.getElementById('brands');
        let dataBrands = [];
        
        data.forEach((item) => {
            let brand = item.car_name.split(' ')[0]; 
            if(!dataBrands.includes(brand)) {
                dataBrands.push(brand);
                let newOption = document.createElement('option');
                newOption.text = brand;
                newOption.value = brand;
                selectBrand.appendChild(newOption);
            }            
        });
        
        //selectBrand.options.sort();

        console.log(selectBrand.options);

        this.setWeightRange(data);
    }

    setWeightRange(data)
    {
        triTableauDObjets(data, 'car_weight');
        let weightRange = document.getElementById('weightRange');
        weightRange.min = data[0].car_weight;
        weightRange.max = data[data.length-1].car_weight;
    }
}
