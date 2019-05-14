<?php
    require 'php/conexion.php';

    if(isset($_POST['subir'])){
        $nombre = $_POST['nombre_receta'];
        $nacionalidad = $_POST['nacionalidad'];
        $cant = $_POST['cant'];
        $ingr = $_POST['ingr'];
        $porciones = $_POST['porciones'];
        $paso = $_POST['paso'];
    }
?>
<?php

    include_once 'plantilla.php';

?>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            
            <p class="subtitulo_subir">Nombre de Receta</p>
            
            <div class="form-row ">
                <div class="form-group col-md-1 ">
                    <input class="nombre_receta" type="text" name="nombre_receta" required>
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

                <div class="form-group col-md-1 text-center">
                    <h4>Medida.</h4>
                </div>

                <div class="form-group col-md-3 text-center">
                    <h4>Ingrediente.</h4>
                </div>
            </div>                     
            <div class="form-row">
                <div class="form-group col-md-1 text-center">
                    <input type="text" name="cant" class="cantidad" required> 
                </div>

                <div class="form-group col-md-1 text-center">
                    <select class="form-control custom-select" name = "medida" required>
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
                    </select>
                </div>
                <div class="form-group col-md-3 text-center">
                    <input type="text" name="ingr" class="ingr" required>
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group col-md-2 text-center">
                    <input type="button" name="agregar_ingr" value="Agregar Ingrediente" class="btn boton_generico">
                </div>
            </div>
            
            <hr>
            <hr>

            <p class="subtitulo_subir">Porciones</p>
            
            <div class="form-row">
                <div class="form-group col-md-1 text-center " style="margin-left: 30px">
                <select class="form-control custom-select" name = "porciones" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            
            <hr>
            <hr>
            
            <p class="subtitulo_subir">Procedimiento</p>

            <div class="form-row d-flex h-100">
                <div class="form-group col-md-1 text-center">
                    <h4>Paso 1:</h4> 
                </div>

                <div class="form-group col-md-7">
                    <textarea class="textarea_adjust" name="paso" cols="30" rows="7" placeholder="Describa el primer paso."></textarea> 
                </div>
     
                <div class="form-group col-md-2 align-self-center">
                    <div>
                        <button type="button" name="cronometro" value="Agregar Cronómetro" class="btn boton_generico" data-toggle="modal" data-target="#modal_crnm">Agregar Cronómetro</button>
                        <div class="modal fade" id="modal_crnm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" class="form-control" id="nombre_crnm" placeholder="Nombre">
                                                </div>
                                            </div>
                                    
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-2">
                                                    <label for="horas">Horas</label>
                                                    <input type="text" class="form-control" id="horas" placeholder="00">
                                                </div>   
                                                <div class="col-md-2">
                                                    <label for="minutos">Minutos</label>
                                                    <input type="text" class="form-control" id="minutos" placeholder="00">
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="segundos">Segundos</label>
                                                    <input type="text" class="form-control" id="segundos" placeholder="00">
                                                </div>
                                            </div>
                                        </form>    
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn boton_generico">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="form-row">
                <div class="form-group col-md-3 text-center">
                    <input type="button" id="agregar_paso" name="agregar_paso" value="Agregar Paso" class="btn boton_generico">
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

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src ="js/subir_receta.js"></script>
        
    </body>
</html>