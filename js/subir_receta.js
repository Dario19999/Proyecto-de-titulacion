let cont_name_ingr = 2;
let cont_ingr = 1;
let cont_npaso = 2;
let cont_paso = 1;
let cont_id = 1;

$(".error_nombre").hide();
$(".error_ingr").hide();
$(".error_paso").hide();
$(function(){
    $("#agregar_ingr").on("click", function(){
        clonar_ingr();
    });

    $("#agregar_paso").on("click", function(){
        clonar_paso();
    });

    $("form").submit(function(e){
        e.preventDefault();

        // for(let i = 1; i <= cont_ingr; i++){
        //     if($("ingr_"+i).value)
        // }



        var datos = $(this).serializeArray();
        datos.push({name: "cant_ingr", value: cont_ingr});
        datos.push({name: "cant_pasos", value: cont_paso});
        console.log(datos);
        $.ajax({
            type: 'post',
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                if(data.resultado == "exitont"){
                    $(".error_nombre").html("El nombre contiene una palabra altisonante. Favor de corregir").show();

                }
            }
        })
    });
});

function clonar_ingr(){
    
    let id_cant = "cant_"+cont_name_ingr;
    let id_medida = "medida_"+cont_name_ingr;
    let id_ingr = "ingr_"+cont_name_ingr;
    let id_group = "ingrediente_"+cont_name_ingr;


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
    new_ingr.setAttribute("id", "name_ingr");
    new_ingr.setAttribute("required", "");
    div_ingr.appendChild(new_ingr);

    //error para cada ingrediente
    // var ingr_error_row = document.createElement("div");
    // ingr_error_row.setAttribute("class", "form-row");
    // new_container.appendChild(ingr_error_row);
    // var ingr_error_col_1 = document.createElement("div");
    // ingr_error_col_1.setAttribute("class", "form-group col-md-1");
    // ingr_error_row.appendChild(ingr_error_col_1);    
    // var ingr_error_col_2 = document.createElement("div");
    // ingr_error_col_2.setAttribute("class", "form-group col-md-1");
    // ingr_error_row.appendChild(ingr_error_col_2);
    // var ingr_error_col_3 = document.createElement("div");
    // ingr_error_col_3.setAttribute("class", "form-group col-md-1form-group col-md-3 error alert alert-danger error_ingr");
    // ingr_error_col_3.setAttribute("id", "error_ingr_"+cont_name_ingr);
    // ingr_error_row.appendChild(ingr_error_col_3);

    //boton para eliminar ingrediente
    var div_btn_delete = document.createElement("div");
    div_btn_delete.setAttribute("class", "form-group col-md-1");
    div_btn_delete.setAttribute("id", "delete_ingr");
    div_btn_delete.setAttribute("style", "display: block;");
    new_container.appendChild(div_btn_delete);
    var btn_delete = document.createElement("button");
    btn_delete.setAttribute("type", "button");
    btn_delete.setAttribute("class", "close");
    btn_delete.setAttribute("aria-label", "Close");
    btn_delete.setAttribute("id", "delete_ingr")
    div_btn_delete.appendChild(btn_delete);
    var span = document.createElement("span");
    span.setAttribute("aria-hidden", "true");
    span.innerHTML = "&times;"
    btn_delete.appendChild(span);

    btn_delete.addEventListener("click", function(){
        var deleted = document.querySelectorAll('div#ingr_group div.form-row');
        deleted[1].parentNode.removeChild(deleted[1]);
        cont_ingr-=1;
        console.log(cont_ingr);  
    });

    
    cont_ingr+=1;
    cont_name_ingr+=1;
    console.log(cont_ingr);
}

function clonar_paso(){

    let container = "paso_"+cont_npaso;
    let npaso = "paso_"+cont_npaso;
    // let nombre_cont = "nombre_"+cont_npaso;
    // let hora_cont = "hora_"+cont_npaso;
    // let minuto_cont = "minuto_"+cont_npaso;
    // let segundo_cont = "segundo_"+cont_npaso;

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

    // var paso_error_row = document.createElement("div");
    // paso_error_row.setAttribute("class", "form-row");
    // new_container.appendChild(paso_error_row);
    // var paso_error_col = document.createElement("div");
    // paso_error_col.setAttribute("class", "form-group col-md-1form-group col-md-3 error alert alert-danger error_ingr");
    // paso_error_col.setAttribute("id", "error_paso_"+cont_npaso);
    // ingr_error_row.appendChild(paso_error_col);

    // //nuevo modal para los cronómetros
    // var modal_container = document.createElement("div")
    // modal_container.setAttribute("class", "form-group col-md-2 align-self-center");
    // new_container.appendChild(modal_container);
    // //boton que activa el modal
    // var boton_toggle = document.createElement("button");
    // boton_toggle.setAttribute("class", "btn boton_generico");
    // boton_toggle.setAttribute("data-toggle", "modal");
    // boton_toggle.setAttribute("data-target", "#modal_crnm");
    // boton_toggle.innerHTML = "Cronómetro";
    // modal_container.appendChild(boton_toggle);
    // //contenedor del modal
    // var div_modal = document.createElement("div")
    // div_modal.setAttribute("class", "modal fade");
    // div_modal.setAttribute("id", "modal_crnm");
    // div_modal.setAttribute("tabindex", "-1");
    // div_modal.setAttribute("role", "dialog");
    // div_modal.setAttribute("aria-hidden", "true");
    // modal_container.appendChild(div_modal);

    // //se declara el contenido del modal
    // var modal_dialog = document.createElement("div");
    // modal_dialog.setAttribute("class", "modal-dialog");
    // modal_dialog.setAttribute("role", "document");
    // div_modal.appendChild(modal_dialog);
    // var modal_content = document.createElement("div");
    // modal_content.setAttribute("class", "modal-content");
    // modal_dialog.appendChild(modal_content);

    // //se declara el encabezado del modal y se adiere al contenido del modal
    // var cloned_header = document.querySelector('div.modal-header');
    // var modal_header = cloned_header.cloneNode(true);
    // modal_content.appendChild(modal_header);

    // //se declara el cuerpo del modal
    // var modal_body = document.createElement("div");
    // modal_body.setAttribute("class", "modal-body");
    // modal_content.appendChild(modal_body);
    // //se crea el formulario y se agrega como hijo del cuerpo del modal
    // var form = document.createElement("form");
    // modal_body.appendChild(form);
    // var form_row = document.querySelector('form div.form-row.justify-content-center').cloneNode(false);
    // var nombre_form_row = form_row;
    // var form_row_time = form_row;
    // form.appendChild(nombre_form_row);
    // form.appendChild(form_row_time);
    
    // //se crea un input text para agregar el nombre del cronómetro
    // var div_nombre_crnm = document.createElement("div");
    // div_nombre_crnm.setAttribute("class", "col-3");
    // nombre_form_row.appendChild(div_nombre_crnm);
    // var label_hora = document.createElement("label");
    // label_hora.setAttribute("for", "nombre_crnm");
    // div_nombre_crnm.appendChild(label_hora);
    // var new_nombre = document.createElement("input");
    // new_nombre.setAttribute("type", "text");
    // new_nombre.setAttribute("class", "form-control");
    // new_nombre.setAttribute("id", "nombre_crnm");
    // new_nombre.setAttribute("name", nombre_cont);
    // new_nombre.setAttribute("placeholder", "Nombre");
    // div_nombre_crnm.appendChild(new_nombre);

    // //se crea el input text para agregar las horas del cronómetro
    // var div_hora = document.createElement("div");
    // div_hora.setAttribute("class", "col-md-2");
    // form_row_time.appendChild(div_hora);
    // var label_hora = document.createElement("label");
    // label_hora.setAttribute("for", "horas");
    // div_hora.appendChild(label_hora);
    // var new_hora = document.createElement("input");
    // new_hora.setAttribute("type", "text");
    // new_hora.setAttribute("class", "form-control");
    // new_hora.setAttribute("id", "horas");
    // new_hora.setAttribute("name", hora_cont);
    // new_hora.setAttribute("placeholder", "00");
    // div_hora.appendChild(new_hora);

    // //se crea el input text para agregar los minutos del cronómetro
    // var div_minuto = div_hora.cloneNode(false);
    // form_row_time.appendChild(div_minuto);
    // var label_minuto = document.createElement("label");
    // label_hora.setAttribute("for", "minutos");
    // div_minuto.appendChild(label_minuto);
    // var new_minuto = document.createElement("input");
    // new_minuto.setAttribute("type", "text");
    // new_minuto.setAttribute("class", "form-control");
    // new_minuto.setAttribute("id", "minutos");
    // new_minuto.setAttribute("name", minuto_cont);
    // new_minuto.setAttribute("placeholder", "00");
    // div_minuto.appendChild(new_minuto);

    // //se crea el input text para agregar las segundos del cronómetro
    // var div_segundo= div_hora.cloneNode(false);
    // form_row_time.appendChild(div_segundo);
    // var label_segundo = document.createElement("label");
    // label_segundo.setAttribute("for", "segundos");
    // div_segundo.appendChild(label_segundo);
    // var new_segundo = document.createElement("input");
    // new_segundo.setAttribute("type", "text");
    // new_segundo.setAttribute("class", "form-control");
    // new_segundo.setAttribute("id", "segundos");
    // new_segundo.setAttribute("name", segundo_cont);
    // new_segundo.setAttribute("placeholder", "00");
    // div_segundo.appendChild(new_segundo);

    //boton para eliminar paso
    var div_btn_delete = document.createElement("div");
    div_btn_delete.setAttribute("class", "form-group col-md-1");
    div_btn_delete.setAttribute("id", "delete_ingr");
    new_container.appendChild(div_btn_delete);
    var btn_delete = document.createElement("button");
    btn_delete.setAttribute("type", "button");
    btn_delete.setAttribute("class", "close");
    btn_delete.setAttribute("aria-label", "Close");
    div_btn_delete.appendChild(btn_delete);
    var span = document.createElement("span");
    span.setAttribute("aria-hidden", "true");
    span.innerHTML = "&times;"
    btn_delete.appendChild(span);
    //función que elimina el nodo
    btn_delete.addEventListener("click", function(){
        var deleted = document.querySelectorAll('div#pasos_group div.form-row.d-flex.h-100');
        deleted[1].parentNode.removeChild(deleted[1]);
        cont_paso-=1;
        console.log(cont_paso);
    });

    //se incrementa el contador para asignar nuevos name a cada input
    //y para incrementar el label de numero de paso con cada click
    cont_npaso+=1;
    cont_paso+=1;
    console.log(cont_paso);
}

