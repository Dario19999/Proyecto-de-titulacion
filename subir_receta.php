<?php
    require 'php/conexion.php'; 
    

    $q_ingr = "SELECT nombre FROM ingrediente";
    $res_ingr = mysqli_query($conexion, $q_ingr);
    $ingredientes = array();
    while($row = mysqli_fetch_array($res_ingr)){
        $ingr = $row['nombre'];
        array_push($ingredientes, $ingr);
    }

    include_once 'plantilla.php';

?>
        <form action="php/validar_subir.php" method="POST"  id="form_subir" autocomplete="off">
            <br>
            <br>
            <br>
            <br>

            <p class="subtitulo_subir">Nombre de Receta</p>
            
            <div class="form-row ">
                <div class="form-group col-md-1">
                    <input class="nombre_receta" type="text" name="nombre_receta" placeholder="Nombre de la receta"required>
                </div>
            </div>

            <div class="form-row" >
                <div class="form-group col-md-2 error alert alert-danger error_nombre"></div>
            </div>

            <hr>
            
            <p class="subtitulo_subir">Tipo de platillo</p>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <select name="tipo_receta" id="tipo" class="form-control custom-select" style="width: 200px; margin-left: 30px;" required>
                        <?php
                            $query = mysqli_query($conexion,"SELECT * FROM categorias");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_categorias].'">'.$valores[nombre_categoria].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <hr>

            <p class="subtitulo_subir">Nacionalidad</p>
            
            <div class="form-row">
                <div class="form-group col-md-1 align-items-center">
                    <select name="nacionalidad" class="form-control custom-select"  style="width: 200px; margin-left: 30px;" required>
                        <?php
                            
                            $query = mysqli_query($conexion,"SELECT * FROM nacionalidad");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_nacionalidad].'">'.$valores[nombre].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <hr>

            <p class="subtitulo_subir">Ingredientes</p> 

            <div class="form-row">
                <div class="form-group col-md-1 text-center">
                    <h4>Cantidad.</h4>
                </div>

                <div class="form-group col-md-2 text-center">
                    <h4>Medida.</h4>
                </div>

                <div class="form-group col-md-3 text-center">
                    <h4>Ingrediente.</h4>
                </div>
            </div>      

            <div id="ingr_group">
                <div class="form-row" id="ingrediente_1">
                    <div class="form-group col-md-1 text-center">
                        <input type="number" name="cant_1" class="cantidad" min="0" value="0.00" step="0.01" required> 
                    </div>

                    <div class="form-group col-md-2 text-center">
                        <select class="form-control custom-select" name="medida_1" required>
                            <option value="Kilo gramo">Kg</option>
                            <option value="gramo">g</option>
                            <option value="mili gramo">mg</option>
                            <option value="Onza">Oz</option>
                            <option value="Litro">L</option>
                            <option value="mili litro">ml</option>
                            <option value="Cucharadas">Cucharada(s)</option>
                            <option value="Cucharaditas">Cucharadita(s)</option>
                            <option value="Tazas">Taza(s)</option>
                            <option value="Puños">Puño(s)</option>
                            <option value="Piezas">Pieza(s)</option>
                            <option value="al gusto">Al gusto</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 text-center">
                        <input type="text" name="ingr_1" class="ingr" id="name_ingr_1" placeholder="Nombre del ingrediente" required>
                    </div>

                </div>
            </div>

            <div class="form-row" >
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4 error alert alert-danger error_ingr"></div>
            </div>
            
            
            <div class="form-row">
                <div class="form-group col-md-2 text-center">
                    <input type="button" id="agregar_ingr" value="Agregar Ingrediente" class="btn boton_generico">
                </div>
            </div>

            <hr>

            <p class="subtitulo_subir">Porciones</p>
            
            <div class="form-row">
                <div class="form-group col-md-1 text-center " style="margin-left: 30px">
                    <input type="number" name="porciones" class="cantidad" min="1" value="1" required> 
                </div>
            </div>
            
            <hr>
            
            <p class="subtitulo_subir">Procedimiento</p>

            <div id="pasos_group">
                <div class="form-row d-flex h-100" id="paso_1">
                    <div class="form-group col-md-1 text-center">
                        <h4>Paso 1:</h4> 
                    </div>

                    <div class="form-group col-md-7">
                        <textarea class="textarea_adjust" name="paso_1" cols="30" rows="7" id = "textarea" placeholder="Describa el paso." required></textarea> 
                    </div>
                </div> 
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 error alert alert-danger error_paso"></div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3 text-center">
                    <input type="button" id="agregar_paso" name="agregar_paso" value="Agregar paso" class="btn boton_generico">
                </div>
            </div>
            <hr>

            <p class="subtitulo_subir">Cronómetros</p>

            <div id="crnm_group">
                <div id="cronometro_1">
                    <div class="form-row">
                        <div class="form-group col-md-2 text-center">
                            <input type="text" id="nombre_crnm_1" placeholder="nombre" name="nombre_crnm_1">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 text-center">
                            <input type="number" id="horas_1" min="1" max="60" placeholder="horas" name="horas_1">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <input type="number" id="minutos_1" min="1" max="60" placeholder="minutos" name="minutos_1">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <input type="number" id="segundos_1" min="1" max="60" placeholder="segundos" name="segundos_1">
                        </div>
                    </div>                
                </div>
                <hr>
            </div>
            

            <div class="form-row">
                <div class="form-group col-md-1 text-center">
                    <input type="button" id="agregar_crnm" name="agregar_crnm" value="Agregar cronómetro" class="btn boton_generico">
                </div>
            </div>

            <hr>

            <div class="div_boton">
                <button type="submit" class="btn boton_generico" name="subir">Subir</button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>    
        <script src ="js/subir_receta.js"></script>
        <script type="text/javascript">

            let cont_name_ingr = 2;
            let cont_ingr = 1;

            $("#agregar_ingr").on("click", function(){
                clonar_ingr();
            });

            var ingredientes = <?= json_encode($ingredientes)?>;
            console.log(ingredientes);
            $("#name_ingr_1").on("focus", function(){
                $(this).autocomplete({
                    source: ingredientes,
                    response: function(event, ui){
                        if (ui.content.length === 0) {
                            $(this).css("border", "1px solid red");
                        }else{
                            $(this).css("border", "1px solid gray");
                        }
                    }
                });
            });

            function clonar_ingr(){
    
                let id_cant = "cant_"+cont_name_ingr;
                let id_medida = "medida_"+cont_name_ingr;
                let name_ingr = "ingr_"+cont_name_ingr;
                let id_group = "ingrediente_"+cont_name_ingr;
                let id_ingr = "name_ingr_"+cont_name_ingr;

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
                new_cant.setAttribute("min", "0");
                new_cant.setAttribute("value", "0.00");
                new_cant.setAttribute("step", "0.01")
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
                new_ingr.setAttribute("name", name_ingr);
                new_ingr.setAttribute("class", "ingr ui-autocomplete-input");
                new_ingr.setAttribute("id", id_ingr);
                new_ingr.setAttribute("placeholder", "Nombre del ingrediente");
                new_ingr.setAttribute("required", "");
                div_ingr.appendChild(new_ingr);
                $("#"+id_ingr).on("focus", function(){
                        $(this).autocomplete({
                        source: ingredientes,
                        response: function(event, ui){
                            if (ui.content.length === 0) {
                                $(this).css("border", "1px solid red");
                            }else{
                                $(this).css("border", "1px solid gray");
                            }
                        }
                    });
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
                    cont_name_ingr-=1;
                });

                cont_ingr+=1;
                cont_name_ingr+=1;
            }
        </script>

    </body>
</html>