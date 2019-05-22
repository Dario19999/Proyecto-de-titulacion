<?php
    require 'php/conexion.php';

    if(isset($_POST['subir'])){
        $nombre = $_POST['nombre_receta'];
        $nacionalidad = $_POST['nacionalidad'];
        $cant = $_POST['cant'];
        $ingr = $_POST['ingr'];
        $porciones = $_POST['porciones'];
        $paso = $_POST['paso'];
        $categoria = $_POST['tipo_receta']; 
    }
?>
<?php

    include_once 'plantilla.php';

?>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"  id="form_subir">
            <br>
            <br>
            <br>
            <br>

            <p class="subtitulo_subir">Nombre de Receta</p>
            
            <div class="form-row ">
                <div class="form-group col-md-1 ">
                    <input class="nombre_receta" type="text" name="nombre_receta" required>
                </div>
            </div>
            <hr>
            
            
            <p class="subtitulo_subir">Tipo de platillo</p>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <select name="tipo_receta" id="tipo" class="form-control custom-select" style="width: 200px; margin-left: 30px;" required>
                        <?php
                            $query = $conexion -> query ("SELECT * FROM categorias");
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
                            
                            $query = $conexion -> query ("SELECT * FROM nacionalidad");
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
                        <input type="number" name="cant_1" class="cantidad" min="1" value="1" required> 
                    </div>

                    <div class="form-group col-md-2 text-center">
                        <select class="form-control custom-select" name="medida_1" required>
                            <option value="Kg">Kg</option>
                            <option value="g">g</option>
                            <option value="mg">mg</option>
                            <option value="Oz">Oz</option>
                            <option value="L">L</option>
                            <option value="ml">ml</option>
                            <option value="Cucharada">Cucharada</option>
                            <option value="Cucharadita">Cucharadita</option>
                            <option value="Taza">Taza</option>
                            <option value="Pugno">Puño</option>
                            <option value="x">Al gusto</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 text-center">
                        <input type="text" name="ingr_1" class="ingr" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-2 text-center">
                    <input type="button" name="agregar_ingr" value="Agregar Ingrediente" class="btn boton_generico" onclick="clonar_ingr()">
                </div>
            </div>

            <hr>

            <p class="subtitulo_subir">Porciones</p>
            
            <div class="form-row">
                <div class="form-group col-md-1 text-center " style="margin-left: 30px">
                    <input type="number" name="cant_0" class="cantidad" min="1" value="1" required> 
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
                        <textarea class="textarea_adjust" name="paso_1" cols="30" rows="7" placeholder="Describa el paso."></textarea> 
                    </div>
        
                    <div class="form-group col-md-2 align-self-center">
                        <button class="btn boton_generico" data-toggle="modal" data-target="#modal_crnm">Cronómetro</button>
                        <div class="modal fade" id="modal_crnm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal_titulo" style="text-align:center;">Agregar Cronómetro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                        
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-row justify-content-center">
                                                <div class="col-3">
                                                    <label for="nombre_crnm"></label>
                                                    <input type="text" class="form-control" id="nombre_crnm" name="nombre_1" placeholder="Nombre">
                                                </div>
                                            </div>
                                    
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-2">
                                                    <label for="horas">Horas</label>
                                                    <input type="text" class="form-control" id="horas" name="hora_1" placeholder="00">
                                                </div>   
                                                <div class="col-md-2">
                                                    <label for="minutos">Minutos</label>
                                                    <input type="text" class="form-control" id="minutos" name ="minuto_1" placeholder="00">
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="segundos">Segundos</label>
                                                    <input type="text" class="form-control" id="segundos" name ="segundo_1" placeholder="00">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn boton_generico">Agregar</button>
                                            </div>
                                        </form>    
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3 text-center">
                    <input type="button" id="agregar_paso" name="agregar_paso" value="Agragar paso" class="btn boton_generico" onclick="clonar_paso()">
                </div>
            </div>
            
        
            <hr>

            <div class="div_boton">
                <button type="submit" class="btn boton_generico" name="subir">Subir</button>
            </div>
            
            <?php
                require 'php/subir_receta.php';
            ?>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src ="js/subir_receta.js"></script>
        
    </body>
</html>