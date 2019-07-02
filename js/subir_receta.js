
let cont_npaso = 2;
let cont_ncrnm = 0;
let cont_paso = 1;

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
        datos.push({name: "cant_crnm", value: cont_ncrnm});
        console.log(datos);
        $.ajax({
            type: 'post',
            data: datos,
            url: url,
            dataType: 'json',
            success: function(data){
                console.log(data);

                //se compara la respuesta con 1 para mostrar el error
                //de cada campo en el que exista una grosería
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

                //si no existe ningún error, se procede a cambiar de ventana para inficar que 
                //la receta se subió con exito
                if(data.error_nombre == 0 && data.error_paso == 0 && data.error_ingr == 0){
                    window.location.replace("success.php");
                }
            },
            error: function(){
                alert("Error");
            }
        });
    });
});

function clonar_paso(){

    //esta variable indicará el id de cada  nuevo contenedor 
    let container = "paso_"+cont_npaso;
    //esta variable definirá el name para cada textarea
    let npaso = "paso_"+cont_npaso;

    //se selecciona el elemento que fungirá como nodo padre
    var paso_input = document.getElementById("pasos_group");

    //contenedor de inputs de agregar paso
    var new_container = document.createElement("div");
    //se agrega un atributo clase al contenedor con la posición en la que se debe crear
    new_container.setAttribute("class", "form-row d-flex h-100 justify-content-center align-items-center");
    //el id asignado es igual a la variable container
    new_container.setAttribute("id", container); 
    //se adjunta a un nodo padre
    paso_input.appendChild(new_container);

    //nuevo contenedor para la etiqueta que indica el número de paso
    var div_npaso = document.createElement("div");
    //se asigna un atribito clase al contenedor de la etiqueta que especifica la posición y tamaño de
    //celda del contenido
    div_npaso.setAttribute("class", "form-group col-md-1 text-center");
    //se adjunta al nodo padre
    new_container.appendChild(div_npaso);

    //se crea la etiqueta h4 
    var new_npaso = document.createElement("h4");
    //insertamos el contenido a la etiqueta, en este caso el número de paso
    new_npaso.innerHTML = "Paso "+cont_npaso+":";
    div_npaso.appendChild(new_npaso);

    //se crea contenedor para el textarea en el que se describirá el nuevo paso
    var div_textarea = document.createElement("div");
    //se asigna un atribito al contenedor del nuevo textarea
    div_textarea.setAttribute("class", "form-group col-md-7");
    //se adjunta el contenedor al nodo padre
    new_container.appendChild(div_textarea);

    //se crea el nuevo textarea
    var new_textarea = document.createElement("textarea");
    //con los attributos necesarios para darle estilo y un name igual a la variable npaso
    new_textarea.setAttribute("class", "textarea-adjust");
    new_textarea.setAttribute("name", npaso);
    new_textarea.setAttribute("cols", "30");
    new_textarea.setAttribute("rows", "7");
    new_textarea.setAttribute("style", "display: block;");
    new_textarea.setAttribute("placeholder", "Describa el paso.");
    //adjuntamos el nuevo elemento textarea al contenedor previamente creado
    div_textarea.appendChild(new_textarea);

    //se crea el contenedor del boton para eliminar el paso
    var div_btn_delete = document.createElement("div");
    //se agregan atributos al boton como un identificador y una clase para especificar
    //la dimensión de la celda
    div_btn_delete.setAttribute("class", "form-group col-md-1");
    div_btn_delete.setAttribute("id", "delete_ingr");
    //se adjunta el contenedor del boton a la clase padre
    new_container.appendChild(div_btn_delete);

    //se crea el boton para eliminar el paso
    var btn_delete = document.createElement("button");
    //se agregan atributos al boton para especificar el estilo y la etiqueta para llamar la
    //función de eliminar
    btn_delete.setAttribute("type", "button");
    btn_delete.setAttribute("class", "close");
    btn_delete.setAttribute("aria-label", "Close");
    //se adjunta el boton al contenedor
    div_btn_delete.appendChild(btn_delete);
    //se crea el ícono de la X para el botón de eliminar
    var span = document.createElement("span");
    span.setAttribute("aria-hidden", "true");
    span.innerHTML = "&times;"
    btn_delete.appendChild(span);

    //función que elimina el nodo
    btn_delete.addEventListener("click", function(){
        //selección de los nodos hijos
        var deleted = document.querySelectorAll('div#pasos_group div.form-row.d-flex.h-100');
        //Se indica la posición de la lista en la que se encuentra el nodo a eliminar
        deleted[1].parentNode.removeChild(deleted[1]);
        //se resta la cantidad de pasos
        cont_paso-=1;
        //se resta la etiqueta de número de paso
        cont_npaso-=1;
    });

    //se incrementa el contador para asignar nuevos name a cada input
    //y para incrementar la etiqueta de numero de paso con cada click
    cont_npaso+=1;
    cont_paso+=1;
}

function clonar_crnm() {

    //en cuanto se agrega un nuevo cronómetro se incrementa la cantidad de estos en 1
    cont_ncrnm+=1;

    //esta variable definirá el name del campo para el nombre del nuevo cronómetro
    let name_nombre_crnm = "nombre_crnm_"+cont_ncrnm;
    //esta variable definirá el name del campo para la cantidad de horas del nuevo cronómetro
    let name_horas = "horas_"+cont_ncrnm;
    //esta variable definirá el name del campo para la cantidad de minutos del nuevo cronómetro
    let name_minutos = "minutos_"+cont_ncrnm;
    //esta variable definirá el name del campo para la cantidad de segundos del nuevo cronómetro
    let name_segundos = "segundos_"+cont_ncrnm;
    //esta variable definirá el id del contenedor de cada nuevo cronómetro
    let id_cronometro = "cronometro_"+cont_ncrnm;

    //se selecciona el elemento que fungirá como nodo padre
    var crnm_input = document.getElementById("crnm_group");
    //se crea el contenedor para el nuevo cronómetro
    var cronometro = document.createElement("div");
    //se asigna la id al nuevo contenedor
    cronometro.setAttribute("id", id_cronometro);
    //se agrega un atributo clase para dar estilo a los campos del cronómetro
    cronometro.setAttribute("class", "cronometro");    
    //se adjunta el nuevo contenedor al nodo padre
    crnm_input.appendChild(cronometro);

    //se crea una fila para contener la celda del input
    var new_name_container = document.createElement("div");
    //se agrega un atributo clase para posicionar la celda
    new_name_container.setAttribute("class", "form-row h-100 justify-content-center align-items-center");
    //se adjunta la fila al contenedor del cronómetro
    cronometro.appendChild(new_name_container);

    //se crea la celda que contiene el input
    var name_div = document.createElement("div");
    //se agregan atributos para dimensionar, posicionar y dar estilo a la celda
    name_div.setAttribute("class", "form-group col-md-1.25 text-center");
    name_div.setAttribute("style", "margin-right: 25px;");
    //se adjunta la celda a la fila
    new_name_container.appendChild(name_div);

    //se crea el nuevo input text para el nombre
    var new_name = document.createElement("input");
    //se agrega el atributo tipo de input
    new_name.setAttribute("type", "text");
    //se agrega el id generado para el nombre del cronómetro
    new_name.setAttribute("id", name_nombre_crnm);
    //se agregan estilos
    new_name.setAttribute("placeholder", "nombre");
    new_name.setAttribute("style", "width: 120px;");
    //se agrega el atributo de rquerido para la validación  
    new_name.setAttribute("required", ""); 
    //se asigna el name generado al el nombre del cronómetro
    new_name.setAttribute("name", name_nombre_crnm);
    //se adjunta el input a la celda contenedora
    name_div.appendChild(new_name);

    //se crea la celda contenedora del input horas
    var horas_div = document.createElement("div");
    //se agrega un atributo clase para dimensionar la celda y
    //centrar el contenido
    horas_div.setAttribute("class", "form-group col-md-1.25 text-center");

    //las celdas contenedoras de input minutos e input segundos son
    //clones del input horas, ya que los input son iguales
    var minutos_div = horas_div.cloneNode(false);
    var segundos_div = horas_div.cloneNode(false);

    //la fila para los input del tiempo es una clon de la fila contenedora del nombre
    var new_tiempo_container = new_name_container.cloneNode(false);
    //se adjunta la fila del tiempo al contenedor del cronómetro
    cronometro.appendChild(new_tiempo_container);
    //se adjuntan las celdas previamente creadas a la respectiva fila
    new_tiempo_container.appendChild(horas_div);
    new_tiempo_container.appendChild(minutos_div);
    new_tiempo_container.appendChild(segundos_div);

    //se crea el contenedor del botón para eliminar el cronómetro
    var div_btn_delete = document.createElement("div");
    //se le asignan atributos de dimensión al contenedor, así como el id
    div_btn_delete.setAttribute("class", "form-group col-md-.50");
    div_btn_delete.setAttribute("id", "delete_ingr");
    //se adjunta el contenedor del botón al final de la fila de de tiempo
    new_tiempo_container.appendChild(div_btn_delete);

    //se crea el botón para eliminar el cronómetro
    var btn_delete = document.createElement("button");
    //se agregan atributos al boton para especificar el estilo y la etiqueta para llamar la
    //función de eliminar
    btn_delete.setAttribute("type", "button");
    btn_delete.setAttribute("class", "close");
    btn_delete.setAttribute("aria-label", "Close");
    //se adjunta el borón al contenedor
    div_btn_delete.appendChild(btn_delete);
    //se crea el ícono de la X para el botón de eliminar
    var span = document.createElement("span");
    span.setAttribute("aria-hidden", "true");
    span.innerHTML = "&times;"
    //se adjunta el span al boton
    btn_delete.appendChild(span);
    //función que elimina el cronómetro
    btn_delete.addEventListener("click", function(){
        //selecciona todos los cronmómetros
        var deleted = document.querySelectorAll('div#crnm_group div.cronometro');
        //elimina el que está en la posición 1
        deleted[0].parentNode.removeChild(deleted[0]);
        //se resta en 1 la cantidad de cronómetros
        cont_ncrnm-=1;
    });

    //se crea un break line para separar cada cronómetro creado
    //y se adjunta al div del cronómetro
    var br = document.createElement("br");
    cronometro.appendChild(br);

    //se crea el input para el número de horas
    var new_hora = document.createElement("input");
    //se agrega el atributo de tipo y el respectivo id
    new_hora.setAttribute("type", "number");
    new_hora.setAttribute("id", name_horas);
    //se agregan atributos de máximo y mínimo
    new_hora.setAttribute("min", "0");
    new_hora.setAttribute("max", "60");
    //se agregan atributos de estilo y de requerido
    new_hora.setAttribute("placeholder", "horas");
    new_hora.setAttribute("style", "width: 120px;");  
    new_hora.setAttribute("required", ""); 
    //se agrega el name para el input generado
    new_hora.setAttribute("name", name_horas);
    //se adjunta en la celda de horas previamente creada
    horas_div.appendChild(new_hora);

    //se crea el input para el número de minutos
    var new_minutos = document.createElement("input");
    //se agrega el atributo de tipo y el respectivo id
    new_minutos.setAttribute("type", "number");
    new_minutos.setAttribute("id", name_minutos);
    //se agregan atributos de máximo y mínimo
    new_minutos.setAttribute("min", "0");
    new_minutos.setAttribute("max", "60");
    //se agregan atributos de estilo y de requerido 
    new_minutos.setAttribute("placeholder", "minutos");
    new_minutos.setAttribute("style", "width: 120px;");  
    new_minutos.setAttribute("required", "");  
    //se agrega el name para el input generado 
    new_minutos.setAttribute("name", name_minutos);
    //se adjunta en la celda de minutos previamente creada
    minutos_div.appendChild(new_minutos);

    //se crea el input para el número de segundos
    var new_segundos = document.createElement("input");
    //se agrega el atributo de tipo y el respectivo id    
    new_segundos.setAttribute("type", "number");
    new_segundos.setAttribute("id", name_segundos);
    //se agregan atributos de máximo y mínimo  
    new_segundos.setAttribute("min", "0");
    new_segundos.setAttribute("max", "60");
    //se agregan atributos de estilo y de requerido    
    new_segundos.setAttribute("placeholder", "segundos");
    new_segundos.setAttribute("style", "width: 120px;");  
    new_segundos.setAttribute("required", ""); 
    //se agrega el name para el input generado     
    new_segundos.setAttribute("name", name_segundos);
    //se adjunta en la celda de minutos previamente creada   
    segundos_div.appendChild(new_segundos);


}