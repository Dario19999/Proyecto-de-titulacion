let cont = 1;

function clonar_ingr(){
    
    let id_cant = "cant_"+cont;
    let id_medida = "medida_"+cont;
    let id_ingr = "ingr_"+cont;
    let id_group = "ingrediente_"+cont
    var inputs = [];

    // var ingr_input = document.getElementById("ingr_group");
    // // var ingrediente = document.getElementById("ingrediente");
    // // var clon_ingr = ingrediente.cloneNode(true);
    // ingr_input.appendChild(clon_ingr);
    // ingr_input.insertBefore(clon_ingr, ingr_input.childNodes[2]);   

    // ingr_input.childNodes[cont+1].id = id_group;
    // inputs[cont].childNodes[3].childNodes[1].id = id_medida;
    // inputs[cont].childNodes[5].childNodes[1].id = id_ingr;
    // cont+=1;

    var new_cant = document.createElement("<div>");
    new_cant.setAttribute("name", id_group);
    new_cant.setAttribute("class", "form_row");
    
}

function clonar_paso(){
    var paso_input = document.getElementById("pasos_group");
    var paso = document.getElementById("pasos");
    var clon_paso = paso.cloneNode(true);
    paso_input.appendChild(clon_paso);
    paso_input.insertBefore(clon_paso, paso_input.childNodes[2]);   
}