
const dSpe = document.getElementById('divSpe');
const ndoiazh = document.getElementById('select2')

ndoiazh.addEventListener('change',addSpeInput);

function addSpeInput(){
    if (ndoiazh.value == "add"){
        dSpe.removeChild(document.getElementById('select2'));
        
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.placeholder = 'Nom de la Spécialité';
        newInput.className = 'form-control';
        newInput.name = 'spe';
        newInput.required = true;
        dSpe.appendChild(newInput);
    }
}