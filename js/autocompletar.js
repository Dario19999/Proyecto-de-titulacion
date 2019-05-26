    function httprequest(url, callback){
        const http = new XMLHttpRequest();

        http.open('GET', url);
        http.send();

        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                callback.apply(http);
            }
        }
    }

    function autocompletar(arreglo){

        const input_ingr_name = document.querySelector('form input#name_ingr');
        indexFocus = -1;

        input_ingr_name.addEventListener("input", function(){

            const name_ingr = this.value;

            if(!name_ingr){
                close();
                return false;
            } 

            const div_list = document.createElement("div");
            div_list.setAttribute("id", this.id);
            div_list.setAttribute("class", "name_list");
            this.parentNode.appendChild(div_list);

            httprequest('php/auto_controller.php?ingr_1='+name_ingr, function(){
                console.log(this.responseText);
            });

            if(arreglo.length == 0) return false;
            arreglo.forEach(name => {
                if(name.substr(0, name_ingr.length) == name_ingr){
                    const name_list = document.createElement("div");
                    name_list.innerHTML = `<strong>${name.substr(0, name_ingr.length)}</strong>${name.substr(name_ingr.length)}`;
                    name_list.addEventListener("click", function(){
                        input_ingr_name.value = this.innerText;
                        close();
                        return false;
                    })
                    div_list.appendChild(name_list);
                }
            });
        });

        document.addEventListener("click", function(){
            close();
        });
    }

    function close(){
        const names = document.querySelectorAll('.name_list');

        names.forEach(name => {
            name.parentNode.removeChild(name);
        });
        indexFocus = -1; 
    }

autocompletar(['caca','coco','coca','puño', 'puto']);