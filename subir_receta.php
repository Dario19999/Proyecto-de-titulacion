<?php
    require 'php/conexion.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Subir</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="CSS/plantilla.css">
        <link rel="stylesheet" href="css/subir_receta.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        
        
    </head>
    
    <body>

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">

            <a href="pagina_principal.html" class="navbar-brand" style="color: #fffaa3; font-family: 'Yellowtail', cursive; font-size: 40px;">La Cousine</a>


            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
                        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                <ul class="navbar-nav nav-justified w-100 mr-auto">
    
                    <li class="nav-item">
                        <a href="buscar_receta.html" class="nav-link nav_button">Buscar</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="glosario.html" class="nav-link nav_button">Glosario</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="subir_receta.html" class="nav-link nav_button">Subir</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="perfil.html" class="nav-link nav_button">Perfil</a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <button class="btn btn-default dropdown-toggle nav_button" type="button" id="dropdownMenuButton" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                            <img src="img/iconfinder_Configuration-01_1976051.svg" width="40px" height="40px" alt="Settings">
                        </button>
    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="editar_perfil.html" class="dropdown-item">Editar Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a href="login.html" class="dropdown-item">Cerrar Sesi&oacute;n</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <!-----------------------------------[Fin de Plantilla]------------------------------------------> 
        <form action = "/Proyecto-de-titulacion/php/subir_receta.php" method="POST" accept-charset="utf-8">
            
            <p class="subtitulo_subir">Nombre de Receta</p>
            
            <div class="form-row ">
                <div class="form-group col-md-1 ">
                    <input class="nombre_receta" type="text" name="nombre_receta" required>
                </div>
            </div>
            <hr>
            <hr>
            
            <p class="subtitulo_subir">Nacionalidad</p>
            
            <div class="form-row">
                <div class="form-group col-md-1 align-items-center">
                    <select name="Nacionalidad" class="form-control custom-select"  style="width: 200px; margin-left: 30px;" required>
                        <option value="0">Seleccione</option>
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
                    <input type="text" name="cant_1" class="cantidad"> 
                </div>

                <div class="form-group col-md-1 text-center">
                    <select class="form-control custom-select">
                        <option value="null">Seleccione</option>
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
                    <input type="text" name="ingr_1" class="ingr">
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
                <select class="form-control custom-select">
                        <option value="null">Seleccione</option>
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
                    <textarea class="textarea_adjust" name="paso_1" cols="30" rows="7" placeholder="Describa el primer paso."></textarea> 
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
                <button type="submit" class="btn boton_generico">Subir</button>
            </div>

        </form>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src ="js/subir_receta.js"></script>
        
    </body>
</html>