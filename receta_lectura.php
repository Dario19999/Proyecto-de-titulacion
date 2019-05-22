<?php
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();
    include_once 'plantilla.php';
    include 'php/conexion.php';


?>
        <hr>
        <hr>
        <hr>
        <hr>

<div class="container-fluid receta">

        
    <div class="btn_calificar">
        <div style="float:right;">
        <button type="button" name="calificar" value="calificar" class="btn boton_generico" data-toggle="modal" data-target="#modal_calificar">Calificar</button>

        <div class="modal fade calificar" id="modal_calificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_calificar" style="text-align:center;">Calificar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="POST">
                            <p>Sabor</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor1" name="sabor" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="sabor1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor2" name="sabor" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="sabor2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor3" name="sabor" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="sabor3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor4" name="sabor" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="sabor4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor5" name="sabor" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="sabor5">5</label>
                            </div>

                            <p>Dificultad</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad1" name="dificultad" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="dificultad1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad2" name="dificultad" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="dificultad2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad3" name="dificultad" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="dificultad3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad4" name="dificultad" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="dificultad4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad5" name="dificultad" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="dificultad5">5</label>
                            </div>

                            <p>Accesibilidad</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad1" name="accesibilidad" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="accesibilidad1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad2" name="accesibilidad" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="accesibilidad2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad3" name="accesibilidad" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="accesibilidad3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad4" name="accesibilidad" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="accesibilidad4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad5" name="accesibilidad" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="accesibilidad5">5</label>
                            </div>

                            <p>Tiempo</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo1" name="tiempo" class="custom-control-input"  value="1">
                                <label class="custom-control-label" for="tiempo1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo2" name="tiempo" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="tiempo2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo3" name="tiempo" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="tiempo3" >3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo4" name="tiempo" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="tiempo4" >4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo5" name="tiempo" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="tiempo5"  value="5">5</label>
                            </div>

                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn boton_generico" name="cal">Enviar</button>

                                <?php 
                                    if(isset($_POST['cal'])){

                                        if(isset($_POST ['sabor'])){
                                            $sabor = $_POST ['sabor'];
                                        }else $sabor=0;
                                        if(isset($_POST ['dificultad'])){
                                            $dificultad = $_POST ['dificultad'];
                                        }else $dificultad=0;
                                        if(isset($_POST ['accesibilidad'])){
                                            $accesibilidad = $_POST ['accesibilidad'];
                                        } else $accesibilidad=0;
                                        if(isset($_POST ['tiempo'])){
                                            $tiempo = $_POST ['tiempo'];
                                        } else $tiempo=0;

                                        if(isset($_GET ['id_receta'])) {
                                            $id_receta = $_GET ['id_receta'];
                                            $query="UPDATE receta SET cantidad_vot=cantidad_vot+1, sabor=(sabor+$sabor)/cantidad_vot, 
                                            dificultad= (dificultad+$dificultad)/cantidad_vot,
                                            accesibilidad= (accesibilidad+$accesibilidad)/cantidad_vot, tiempo= (tiempo+$tiempo)/cantidad_vot
                                            WHERE receta.id_receta = $id_receta;";
                                            $rs = mysqli_query ($conexion, $query);

                                        }
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="nombre_receta">
            <?php 
                require 'php/conexion.php';

                if(isset($_GET ['id_receta'])) {
                    $id_receta = $_GET ['id_receta'];
                    $nombre =("SELECT nombre_receta FROM receta WHERE id_receta = $id_receta");
                    $rs = mysqli_query ($conexion, $nombre);
            ?>
                <h1><?php while(($row=mysqli_fetch_array($rs))){ 
                echo $row['nombre_receta']; }?></h1>
            <?php } ?>
        </div>
    
        
        <div class="row align-items-end">
            <div class="col-7 col-sm-5 col-md-4 ingredientes">
                <h3>Ingredientes</h3>
                <ul class="list-group">

                    <?php 
                        require 'php/conexion.php';
                        $query = ("SELECT porciones, cantidad, medida, ingrediente.nombre 
                        FROM datos_receta, ingrediente WHERE id_receta=$id_receta AND datos_receta.id_ingrediente 
                        = ingrediente.id_ingrediente");
                        $rs = mysqli_query ($conexion, $query);

                        while(($row=mysqli_fetch_assoc($rs))){ 
                        
                    ?>

                        <li class="list-group-item">
                            <?php echo $row['nombre']."   " ?>
                            <small> <?php echo $row['cantidad']." ".$row['medida'] ?></small>
                        </li>
                        
                    <?php } ?>
                </ul>
            </div>
            <div class="col-2 col-md-1">

                <label class="my-1 mr-2" for="porciones">Porciones</label>
                <select class="custom-select my-1 mr-sm-2" id="porciones">
                    <option selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

        </div>
        <hr>
        <div class="procedimiento">
            <ol>
                    <?php 
                        require 'php/conexion.php';
                        $query = ("SELECT paso FROM procedimiento WHERE id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);

                        while(($row=mysqli_fetch_assoc($rs))){ 
                        
                    ?>

                        <li><?php echo $row['paso']?></small></li>
                        
                    <?php } ?>     
            </ol>

        </div>

    </div>

    <div class="container-fluid botones">    

            <div class="btn_dictado">
                <a href="receta_dictado.html" class="btn boton_generico"> Dictado</a>
                    
            </div>
        <hr>

        
    </div>

    <div class="container-fluid cotizacion">
        <div class="row align-items-center justify-content-center">
            <div class="col col-xs-4 col-md-3 ">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" id="super">Walmart</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="precio">$$$</h6>
                            <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                            <a href="https://www.walmart.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA4PQlONBDovv8-Z34GW2HqZ-yU14y7im4fMdLky41LtWH0PCeGcNSBoCdy4QAvD_BwE" target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                        </div>
                </div>

            </div>

            <div class="col col-xs-4 col-md-3 ">

                <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title" id="super1">Sam's</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="precio1">$$$</h6>
                            <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                            <a href="https://www.sams.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA-r4joKi7ty26ohaw2a36Rubjgn86ppcNByhGLz9fNpTqKnt6A8DNRoCA_wQAvD_BwE"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                        </div>
                </div>
            </div>
            <div class="col col-xs-4 col-md-3 ">

                    <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title" id="super2">Costco</h5>
                                <h6 class="card-subtitle mb-2 text-muted" id="precio2">$$$</h6>
                                <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                                <a href="https://www.costco.com.mx/"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                            </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="container-fluid pie">





    </div>

    <div class="btn_denunciar">
        <hr>
            <button type="button" name="denunciar_receta" value="denunciar_receta" class="btn boton_generico" data-toggle="modal" data-target="#modal_denuncia_receta">Denunciar receta</button>

            <div class="modal fade" id="modal_denuncia_receta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
    
                    <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_dreceta" style="text-align:center;">Denunciar receta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                <div class="modal-body">
                    <form>
                            <div class="form-group">
                                <label for="motivo_receta">Motivo de denuncia</label>
                                <select class="form-control" id="motivo_receta">
                                <option>Es una mala receta</option>
                                <option>Es dañina para la salud</option>
                                <option>Los ingredientes son incorrectos</option>
                                <option>No da los resultados esperados</option>
                                <option>No corresponde a la nacionalidad que indica</option>
                                <option>Otra</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comentarios_receta">Comentarios</label>
                                <textarea class="form-control" id="comentarios_receta" rows="3"></textarea>
                            </div>
                    </form>           
                </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn boton_generico">Enviar</button>
                    </div>
                    </div>
                </div>
            </div>
    </div>

        <i class="descarga fas fa-arrow-down"></i> 

        <div class="btn_denunciar">
            <hr>
            <button type="button" name="denunciar_usuario" value="denunciar_usuario" class="btn boton_generico" data-toggle="modal" data-target="#modal_denuncia_usuario">Denunciar usuario</button>

            <div class="modal fade" id="modal_denuncia_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
    
                    <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_dusuario" style="text-align:center;">Denunciar usuario </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                <div class="modal-body">
                        <form>
                                <div class="form-group">
                                    <label for="motivo_usuario">Motivo de denuncia</label>
                                    <select class="form-control" id="motivo_usuario">
                                    <option>Es ofensivo</option>
                                    <option>Es un bromista</option>
                                    <option>Es molesto</option>
                                    <option>Otra</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comentarios_usuario">Comentarios</label>
                                    <textarea class="form-control" id="comentarios_usuario" rows="3"></textarea>
                                </div>
                        </form>      
                        
                </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn boton_generico">Enviar</button>
                    </div>
                    </div>
                </div>
            </div>
    </div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

</body>

</html>