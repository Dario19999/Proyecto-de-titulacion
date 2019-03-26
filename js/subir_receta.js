
    $("#agregar_paso").addEventListener ("click", function(){
        var input = document.createElement ("input");
        input.setAttribute ("type", "text");
        input.setAttribute ("placeholder", "Describa el paso");
        input.setAttribute ("name", "agregar_paso");
        console.log (input);
        $("#form_procedimiento").appendChild(input);

    })
    
    function $(selector){
        return document.querySelector (selector);
    }

