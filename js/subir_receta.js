
let cont_npaso = 2;
let cont_ncrnm = 2;
let cont_paso = 1;
let cont_id = 1;

$(".error_nombre").hide();
$(".error_ingr").hide();
$(".error_paso").hide();

$(function(){
    $("#agregar_paso").on("click", function(){
        clonar_paso();
    });

    $("#agregar_crnm").on("click", function(){
        clonar_crnm();
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

                if(data.error_ingr == 1){
                    $(".error_ingr").html("<strong>Error:</strong> Uno de los ingredientes contiene una o más palabras altisonantes. Favor de corregir.").show();
                }else{
                    $(".error_ingr").hide();
                }

                if(data.error_paso == 1){
                    $(".error_paso").html("<strong>Error:</strong> Uno de los pasos contiene una o más palabras altisonantes. Favor de corregir.").show();
                }else{
                    $(".error_paso").hide();
                }

                if(data.error_nombre == 0 && data.error_paso == 0 && data.error_ingr == 0){
                    window.location.replace("success.php");
                    console.log("a huevo");
                }
            },
            error: function(){
                console.log("esto no es un no error");
            }
        });
    });
});

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
    new_textarea.setAttribute("style", "display: block;");
    new_textarea.setAttribute("placeholder", "Describa el paso.");
    div_textarea.appendChild(new_textarea);

    //boton para eliminar el paso
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
        cont_npaso-=1;
    });

    //se incrementa el contador para asignar nuevos name a cada input
    //y para incrementar el label de numero de paso con cada click
    cont_npaso+=1;
    cont_paso+=1;
}

function clonar_crnm() {
    let name_nombre_crnm = "nombre_crnm_"+cont_ncrnm;
    let name_horas = "horas_"+cont_ncrnm;
    let name_minutos = "minutos_"+cont_ncrnm;
    let name_segundos = "segundos_"+cont_ncrnm;
    let id_cronometro = "cronometro_"+cont_ncrnm;

    var crnm_input = document.getElementById("crnm_group");
    var cronometro = document.createElement("div");
    cronometro.setAttribute("id", id_cronometro);
    crnm_input.appendChild(cronometro);

    var new_name_container = document.createElement("div");
    new_name_container.setAttribute("class", "form-row");
    cronometro.appendChild(new_name_container);
    var name_div = document.createElement("div");
    name_div.setAttribute("class", "form-group col-md-2 text-center");
    new_name_container.appendChild(name_div);
    var new_name = document.createElement("input");
    new_name.setAttribute("type", "text");
    new_name.setAttribute("id", name_nombre_crnm);
    new_name.setAttribute("placeholder", "nombre");
    new_name.setAttribute("name", name_nombre_crnm);
    name_div.appendChild(new_name);

    var horas_div = name_div.cloneNode(false);
    var minutos_div = name_div.cloneNode(false);
    var segundos_div = name_div.cloneNode(false);
    var new_tiempo_container = new_name_container.cloneNode(false);
    cronometro.appendChild(new_tiempo_container);
    new_tiempo_container.appendChild(horas_div);
    new_tiempo_container.appendChild(minutos_div);
    new_tiempo_container.appendChild(segundos_div);

    var new_hora = document.createElement("input");
    new_hora.setAttribute("type", "number");
    new_hora.setAttribute("id", name_horas);
    new_hora.setAttribute("min", "1");
    new_hora.setAttribute("max", "60");
    new_hora.setAttribute("placeholder", "horas");
    new_hora.setAttribute("name", name_horas);
    horas_div.appendChild(new_hora);

    var new_minutos = document.createElement("input");
    new_minutos.setAttribute("type", "number");
    new_minutos.setAttribute("id", name_minutos);
    new_minutos.setAttribute("min", "1");
    new_minutos.setAttribute("max", "60");
    new_minutos.setAttribute("placeholder", "minutos");
    new_minutos.setAttribute("name", name_minutos);
    minutos_div.appendChild(new_minutos);

    var new_segundos = document.createElement("input");
    new_segundos.setAttribute("type", "number");
    new_segundos.setAttribute("id", name_segundos);
    new_segundos.setAttribute("min", "1");
    new_segundos.setAttribute("max", "60");
    new_segundos.setAttribute("placeholder", "horas");
    new_segundos.setAttribute("name", name_segundos);
    segundos_div.appendChild(new_segundos);

    var line = document.createElement("hr");
    crnm_input.appendChild(line);

    //boton para eliminar el cronometro
    var div_btn_delete = document.createElement("div");
    div_btn_delete.setAttribute("class", "form-group col-md-1");
    div_btn_delete.setAttribute("id", "delete_ingr");
    new_name_container.appendChild(div_btn_delete);
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
        var deleted = document.querySelectorAll('div#cronometro_2 div.form-row');
        deleted[0].parentNode.removeChild(deleted[0]);
        deleted[1].parentNode.removeChild(deleted[1]);
        cont_ncrnm-=1;
    });
}