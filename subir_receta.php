<?php
    require 'php/conexion.php'; 

    $q_ingr = "SELECT id_ingrediente, nombre FROM ingrediente";
    $res_ingr = mysqli_query($conexion, $q_ingr);

    $q_ingr2 = "SELECT id_ingrediente, nombre FROM ingrediente";
    $res_ingr2 = mysqli_query($conexion, $q_ingr2);

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
                            <option value="Cucharada">Cucharada(s)</option>
                            <option value="Cucharadita">Cucharadita(s)</option>
                            <option value="Taza">Taza(s)</option>
                            <option value="Pugno">Puño(s)</option>
                            <option value="Pieza">Pieza(s)</option>
                            <option value="x">Al gusto</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 text-center" style="margin-left: 60px;" id="select_container">
                        <select name="ingr_1" id="select1" class="custom-select">
                            <option></option>
                            <?php while($row=mysqli_fetch_row($res_ingr)){?>

                            <option value="<?php echo $row[0]?>">
                                <?php echo $row[1]?>
                            </option>

                            <?php }?>
                        </select>
                        
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
                        <textarea class="textarea_adjust" name="paso_1" cols="30" rows="7" placeholder="Describa el paso."></textarea> 
                    </div>
                </div> 
            </div>

            <div class="form-row" >
                <div class="form-group col-md-6 error alert alert-danger error_paso"></div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3 text-center">
                    <input type="button" id="agregar_paso" name="agregar_paso" value="Agragar paso" class="btn boton_generico">
                </div>
            </div>
            
        
            <hr>

            <div class="div_boton">
                <button type="submit" class="btn boton_generico" name="subir">Subir</button>
            </div>
        </form>

        <select name="ingr" id="select" class="custom-select" style="display:none;">
            <option></option>
            <?php while($row=mysqli_fetch_row($res_ingr2)){?>

            <option value="<?php echo $row[0]?>">
                <?php echo $row[1]?>
            </option>

            <?php }?>
        </select>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script type="text/javascript" src ="js/select2.min.js"></script>     
        <script src ="js/subir_receta.js"></script>
        
        
    </body>
</html>