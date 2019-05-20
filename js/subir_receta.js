 
let cont = 1;

function clonar(){
    
    let id_cant = "cant_"+cont;
    let id_medida = "medida_"+cont;
    let id_ingr = "ingr_"+cont;
    let id_group = "ingrediente_"+cont
    var inputs = [];
    var ingr_input = document.getElementById("ingr_group");
    var ingrediente = document.getElementById("ingrediente");
    var clon = ingrediente.cloneNode(true);
    ingr_input.appendChild(clon);
    ingr_input.insertBefore(clon, ingr_input.childNodes[2]);   

    ingr_input.childNodes[cont+1].id = id_group;
    // inputs[cont].childNodes[3].childNodes[1].id = id_medida;
    // inputs[cont].childNodes[5].childNodes[1].id = id_ingr;
    cont+=1;
}