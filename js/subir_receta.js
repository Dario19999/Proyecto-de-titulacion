let cont_name_ingr = 2;
let cont_ingr = 1;
let cont_npaso = 2;
let cont_paso = 1;
let cont_id = 1;

$(".error_nombre").hide();
$(".error_ingr").hide();
$(".error_paso").hide();

$(function(){
     $("#select1").select2({
        placeholder: 'Seleccione un ingrediente'
    });

    $("#agregar_ingr").on("click", function(){
        clonar_ingr();
    });

    $("#agregar_paso").on("click", function(){
        clonar_paso();
    });

    $("#form_subir").submit(function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        var url = $(this).attr('action');
        datos.push({name: "cant_ingr", value: cont_ingr});
        datos.push({name: "cant_pasos", value: cont_paso});
        console.log(datos);
        $.ajax({
            type: 'post',
            data: datos,
            url: url,
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.error_nombre == 1){
                    $(".error_nombre").html("<strong>Error:</strong> El nombre de la receta contiene una o más palabras altisonantes. Favor de corregir.").show();
                }else{
                    $(".error_nombre").hide();
                }

                if(data.error_paso == 1){
                    $(".error_paso").html("<strong>Error:</strong> Uno de los pasos contiene una o más palabras altisonantes. Favor de corregir.").show();
                }else{
                    $(".error_paso").hide();
                }

                if(data.error_nombre == 0 || data.error_paso == 0){
                    window.location.replace("success.php");
                    console.log("a huevo");
                }
            },
            error: function(){
                console.log("esto no es un no error");
                $("#error").show();
            }
        });
    });
});

function clonar_ingr(){
    
    let id_cant = "cant_"+cont_name_ingr;
    let id_medida = "medida_"+cont_name_ingr;
    let name_ingr = "ingr_"+cont_name_ingr;
    let id_group = "ingrediente_"+cont_name_ingr;
    let id_ingr = "select"+cont_name_ingr;

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

    //nuevo select para seleccionar el ingrediente
    var div_ingr = document.createElement("div");
    div_ingr.setAttribute("class", "form-group col-md-2 text-center");
    div_ingr.setAttribute("style", "margin-left: 60px;");
    new_container.appendChild(div_ingr);
    var new_select_ingr = document.querySelector("select[name = 'ingr']");
    var new_ingr = new_select_ingr.cloneNode(true);
    new_ingr.removeAttribute("name");
    new_ingr.removeAttribute("id");
    new_ingr.removeAttribute("style");
    new_ingr.setAttribute("name", name_ingr);
    new_ingr.setAttribute("id", id_ingr);
    div_ingr.appendChild(new_ingr);
    $("#"+id_ingr).select2({
        placeholder: 'Seleccione un ingrediente'      
    });

    //boton para eliminar ingrediente
    var div_btn_delete = document.createElement("div");
    div_btn_delete.setAttribute("class", "form-group col-md-1");
    div_btn_delete.setAttribute("id", "delete_ingr");
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
    });

    
    cont_ingr+=1;
    cont_name_ingr+=1;
}

function clonar_paso(){

    let container = "paso_"+cont_npaso;
    let npaso = "paso_"+cont_npaso;

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

    //boton para eliminar ingrediente
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
    });

    //se incrementa el contador para asignar nuevos name a cada input
    //y para incrementar el label de numero de paso con cada click
    cont_npaso+=1;
    cont_paso+=1;
}
