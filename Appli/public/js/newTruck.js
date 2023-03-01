
const btnAdd = document.getElementById('addCat')
const carte = document.getElementById('carteCtn')
let index = 0;
let i = 0;

btnAdd.addEventListener('click',addCat)

function addCat(){
    index++;
    const divCat = document.createElement('div');
    divCat.className = 'mt-2 row'
    carte.appendChild(divCat);

    const nameCat = document.createElement('input');
    nameCat.type = 'text';
    nameCat.name = 'cat_'+index;
    nameCat.className = 'form-control';
    nameCat.placeholder = 'Nom de la catégorie';
    nameCat.required = true;
    divCat.appendChild(nameCat);

    nameCat.addEventListener('change',()=>{
        const newBtn = document.createElement('div');
        newBtn.className = 'btn btn-success';
        newBtn.innerHTML = 'Ajouter une offre';
        divCat.appendChild(newBtn);

        newBtn.addEventListener('click',()=>{
            i++
            const nameOffer = document.createElement('input')
            nameOffer.type = 'text';
            nameOffer.name = nameCat.value+"_name_"+i;
            nameOffer.className = 'form-control';
            nameOffer.placeholder = 'Nom';
            nameOffer.required = true;
            divCat.appendChild(nameOffer);

            const priceOffer = document.createElement('input')
            priceOffer.type = 'text';
            priceOffer.name = nameCat.value+"_price_"+i;
            priceOffer.className = 'form-control';
            priceOffer.placeholder = 'Prix';
            priceOffer.required = true;
            divCat.appendChild(priceOffer);
        })
    })

}
