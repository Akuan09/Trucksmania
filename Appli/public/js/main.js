const add = document.getElementsByClassName('addP');
const printTotal = document.getElementById('total');
let total = 0;
let cookie = [];

for (let v of add){
    v.addEventListener('click',addPanier);
}

function addPanier(e){
    let price = e.target.dataset.label;
    let name = e.target.id;

    const divCtn = document.getElementById('panier');

    const divPanier = document.createElement('div');
    divPanier.className = 'border border-success p-1 mt-1 d-flex justify-content-between align-items-center';
    divPanier.id = 'id'+name
    divCtn.appendChild(divPanier);

    const affName = document.createElement('h4');
    affName.innerHTML = name;
    divPanier.appendChild(affName);

    const affPrice = document.createElement('h4');
    affPrice.innerHTML = price;
    divPanier.appendChild(affPrice);

    const del = document.createElement('button');
    del.className = 'btn btn-danger';
    del.innerHTML = "Supprimer";
    del.id = 'id_'+name+"_"+price;
    divPanier.appendChild(del);

    del.addEventListener('click',(event)=>{
        let id = event.target.id.split('_');
        let delDiv = document.getElementById(`id${id[1]}`);
        divCtn.removeChild(delDiv);

        total-= parseFloat(id[2]);
        printTotal.innerHTML = total+'€';

        for (let i in cookie){
            if (cookie[i]['name']==id[1]){
                cookie.splice(i,1);
                break;
            }
        }
        document.cookie = "commande ="+cookie;
    })

    total += parseFloat(price);

    printTotal.innerHTML = total+'€';

    cookie.push({
        name,
        price
    });

    document.cookie = "commande ="+JSON.stringify(cookie);
}
