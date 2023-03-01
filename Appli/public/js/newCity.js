
const city = document.getElementById('addCity');
const dCity = document.getElementById('divCity');

city.addEventListener("click",addCityInput)

function addCityInput(){
        dCity.removeChild(document.getElementById('select'));
        
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.placeholder = 'Nom de la Ville';
        newInput.className = 'form-control';
        newInput.name = 'city';
        newInput.required = true;
        dCity.appendChild(newInput);
}