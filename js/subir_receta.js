let cont_ingr = 2;
let cont_npaso = 2;
let cont_paso = 1;

function clonar_ingr(){
    
    let id_cant = "cant_"+cont;
    let id_medida = "medida_"+cont;
    let id_ingr = "ingr_"+cont;
    let id_group = "ingrediente_"+cont

    var ingr_input = document.getElementById("ingr_group");

    //contenedor de inputs de agregar ingrediente
    var new_container = document.createElement("div");
    new_container.setAttribute("class", "form-row");
    new_container.setAttribute("id", id_group); 
    ingr_input.appendChild(new_container);

    //nuevo input text para insertar la cantidad del ingrediente
    var div_cant = document.createElement("div")
    div_cant.setAttribute("class", "form-group col-md-1 text-center");
    new_container.appendChild(div_cant);
    var new_cant = document.createElement("input");
    new_cant.setAttribute("type", "number");
    new_cant.setAttribute("name", id_cant);
    new_cant.setAttribute("class", "cantidad");
    new_cant.setAttribute("min", "1");
    new_cant.setAttribute("value", "1");
    new_cant.setAttribute("required", "");
    div_cant.appendChild(new_cant);

    //clon del select para insertar la medida del ingrediente
    var div_medida = document.createElement("div")
    div_medida.setAttribute("class", "form-group col-md-2 text-center");
    new_container.appendChild(div_medida);
    var select_medida = document.querySelector("select[name = 'medida_1']");
    var new_medida = select_medida.cloneNode(true);
    new_medida.removeAttribute("name");
    new_medida.setAttribute("name", id_medida);
    div_medida.appendChild(new_medida);

    //nuevo input text para insertar el nombre del ingrediente
    var div_ingr = document.createElement("div");
    div_ingr.setAttribute("class", "form-group col-md-3 text-center");
    new_container.appendChild(div_ingr);
    var new_ingr = document.createElement("input")
    new_ingr.setAttribute("type", "text");
    new_ingr.setAttribute("name", id_ingr);
    new_ingr.setAttribute("class", "ingr");
    new_ingr.setAttribute("required", "");
    div_ingr.appendChild(new_ingr);

    cont+=1;
}

function clonar_paso(){

    let container = "paso_"+cont_npaso;
    let npaso = "paso_"+cont_paso

    var paso_input = document.getElementById("pasos_group");

    //contenedor de inputs de agregar paso
    var new_container = document.createElement("div");
    new_container.setAttribute("class", "form-row d-flex h-100");
    new_container.setAttribute("id", container); 
    paso_input.appendChild(new_container);

    //nueva etiqueta que indica el número de paso
    var div_npaso = document.createElement("div");
    div_npaso.setAttribute("class", "form-group col-md-1 text-center");
    new_container.appendChild(div_npaso);
    var new_npaso = document.createElement("h4");
    new_npaso.innerHTML = "Paso "+cont_npaso+":";
    div_npaso.appendChild(new_npaso);

    //nuevo textarea en el que se describirá el paso
    var div_textarea = document.createElement("div");
    div_textarea.setAttribute("class", "form-group col-md-7");
    new_container.appendChild(div_textarea);
    var new_textarea = document.createElement("textarea");
    new_textarea.setAttribute("class", "textarea-adjust");
    new_textarea.setAttribute("name", npaso);
    new_textarea.setAttribute("cols", "30");
    new_textarea.setAttribute("rows", "7");
    new_textarea.setAttribute("placeholder", "Describa el paso.");
    div_textarea.appendChild(new_textarea);

    //nuevo modal para los cronómetros
    var modal_container = document.createElement("div")
    modal_container.setAttribute("class", "form-group col-md-2 align-self-center");
    new_container.appendChild(modal_container);
    //boton que activa el modal
    var boton_toggle = docuent.createElement("button");
    boton_toggle.setAttribute("class", "btn boton_generico");
    boton_toggle.setAttribute("data-toggle", "modal");
    boton_toggle.setAttribute("data-target", "#modal_crnm");
    boton_toggle.innerHTML = "Cronómetro";
    modal_container.appendChild(boton_toggle);
    //contenedor del modal
    var div_modal = document.createElement("div")
    div_modal.setAttribute("class", "modal fade");
    div_modal.setAttribute("id", "modal_crnm");
    div_modal.setAttribute("tabindex", "-1");
    div_modal.setAttribute("role", "dialog");
    div_modal.setAttribute("aria-hidden", "true");
    modal_container.appendChild(div_modal);

    var modal_dialog = document.createElement("div");
    modal_dialog.setAttribute("class", "modal-dialog");
    modal_dialog.setAttribute("role", "document");
    div_modal.appendChild(modal_dialog);

    var modal_content = document.createElement("div");
    modal_content.setAttribute("class", "modal-content");
    modal_dialog.appendChild(modal_content);

    var cloned_header = document.querySelector('div.modal-header');
    var modal_header = cloned_header.cloneNode(true);
    modal_content.appendChild(modal_header);

    var modal_body = document.createElement("div");
    modal_body.setAttribute("class", "modal-body");
    modal_content.appendChild(modal_body);

    var form = document.createElement("form");
    modal_body.appendChild(form);

    


}