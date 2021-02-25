var mycars = new MyCars('log');
var apicars= new ApiCars(mycars);
apicars.fetchData();


triTableauDObjets = (data, col) => {

    data.sort((a, b) => {
        if(a[col] < b[col]) {
            return -1; // a est inférieur à b
        }
        if(a[col] > b[col]) {
            return 1; // b est inférieur à a
        }

        return 0; // les 2 sont égaux
    });

    return data;
} 


document.getElementById('btnLoad').addEventListener('click', () => {
    apicars.fetchData();
});

document.getElementById('search').addEventListener('keyup', () => {

    let data = mycars.data.slice();
    let searchValue = document.getElementById('search').value;
    let result = [];

    if(searchValue.length > 2) {

        for(let item of data) {    
            if(item.car_name.includes(searchValue)) {
                //console.log(item.car_name + ' match !');
                result.push(item);
            }
        }

        mycars.readCars(result, false);
        //console.log(result);
    }
});


document.getElementById('orderby').addEventListener('change', () => {

    var val = document.getElementById('orderby').value;
    console.log(val);

    let data = mycars.data.slice();

    console.log(data);

    switch(val)
    {
        case "1":
            data = triTableauDObjets(data, 'car_weight');
            break;
        case "2":
            data = triTableauDObjets(data, 'car_weight').reverse();
            break;
        case "3":
            break;
        case "4":
            data = triTableauDObjets(data, 'car_origin');
            break;
        default:
            break;
    }

    mycars.readCars(data, false);
});


document.getElementById("frmCriterias").addEventListener('submit', (event) => {
    event.preventDefault();

    let data = mycars.data.slice();
    let selectedBrand = document.getElementById('brands').value;
    let selectedWeight = document.getElementById('weightRange').value;
    let allCars;
    
    
    /*let allCars = [];

    for(let item of data)
    {
        if(item.car_name.includes(selectedBrand)) {
            allCars.push(item);
        }
    }*/

    // la ligne de code dans le if fait le meme traitement que le for ci-dessus.
    if(document.getElementById('brands').selectedIndex > 0) {
        // conserver uniquement les voitures dont le nom inclut la marque sélectionné
        allCars = data.filter(item => item.car_name.includes(selectedBrand));
    }
    else {
        allCars = data;
    }
    
    // conserver uniquement les voitures dont le poids est supérieur à la sélection
    allCars = allCars.filter(item => item.car_weight >= selectedWeight);

    mycars.readCars(allCars);

    console.log(allCars);

});