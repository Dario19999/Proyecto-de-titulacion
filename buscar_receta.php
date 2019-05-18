<?php

    include_once 'plantilla.php';

?>
<!-----------------------------------[Fin de Plantilla]------------------------------------------>

    <br>
    <form action="resultado_busqueda.php" method ="POST">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
            
              
                    <div class="card-body row no-gutters align-items-center">
                    
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>

                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" 
                            type="search" placeholder="Buscar" name="busqueda">
                        </div>

                        <div class="col-auto">
                            <button class="btn boton_generico btn-lg" type="submit" name="buscar">Buscar</button>
                        </div>

                    </div>
                
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>
        
        <div class="form-row">

            <div class="form-group col-md-4 text-center">
                <h2>Tipo de Receta</h2>
            </div>

            <div class="form-group col-md-4 text-center">
                <h2>Categor&iacute;as</h2>
            </div>

            <div class="form-group col-md-4 text-center">
                <h2>Nacionalidad</h2>
            </div>      

        </div>

        <div class="form-row  h-100 justify-content-center align-items-center">
            <div class="form-group col-md-4 text-center">

                <div class="col-md-2 text-left" style="margin-left: 150px">
                    <div class="custom-control custom-radio margen">
                        <input type="radio" name="tipo" id="radio1" class="custom-control-input" value ="1"  >
                        <label class="custom-control-label radio-inline" for="radio1" ><h4>Comidas</h4></label> 
                    </div>
                    
                    <div class="custom-control custom-radio margen">
                        <input type="radio" name="tipo" id="radio2" class="custom-control-input" value ="2" >
                        <label  class="custom-control-label radio-inline" for="radio2" ><h4>Postres</h4></label> 
                    </div>

                    <div class="custom-control custom-radio margen">
                        <input type="radio" name="tipo" id="radio3" class="custom-control-input" value ="3" >
                        <label  class="custom-control-label radio-inline" for="radio3" ><h4>Cocteles</h4></label> 
                    </div>
                
                </div>

            </div>

            <div class="form-group col-md-4 text-center">
              
                <p>Sabor</p>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="1" id="sabor1" name="sabor" class="custom-control-input" >
                    <label  class="custom-control-label" for="sabor1" >1</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="2" id="sabor2" name="sabor" class="custom-control-input" >
                    <label  class="custom-control-label" for="sabor2">2</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="3" id="sabor3" name="sabor" class="custom-control-input" >
                    <label class="custom-control-label" for="sabor3">3</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="4" id="sabor4" name="sabor" class="custom-control-input" >
                    <label class="custom-control-label" for="sabor4">4</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="5" id="sabor5" name="sabor" class="custom-control-input" >
                    <label class="custom-control-label" for="sabor5">5</label>
                </div>

                <p>Dificultad</p>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="1" id="dificultad1" name="dificultad" class="custom-control-input" >
                    <label class="custom-control-label" for="dificultad1">1</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="2" id="dificultad2" name="dificultad" class="custom-control-input" >
                    <label class="custom-control-label" for="dificultad2">2</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="3" id="dificultad3" name="dificultad" class="custom-control-input" >
                    <label class="custom-control-label" for="dificultad3">3</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="4" id="dificultad4" name="dificultad" class="custom-control-input" >
                    <label class="custom-control-label" for="dificultad4">4</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="5" id="dificultad5" name="dificultad" class="custom-control-input" >
                    <label class="custom-control-label" for="dificultad5">5</label>
                </div>

                <p>Accesibilidad</p>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="1" id="accesibilidad1" name="accesibilidad" class="custom-control-input" >
                    <label class="custom-control-label" for="accesibilidad1" >1</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="2" id="accesibilidad2" name="accesibilidad" class="custom-control-input" >
                    <label class="custom-control-label" for="accesibilidad2">2</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="3" id="accesibilidad3" name="accesibilidad" class="custom-control-input" >
                    <label class="custom-control-label" for="accesibilidad3" >3</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="4" id="accesibilidad4" name="accesibilidad" class="custom-control-input" >
                    <label class="custom-control-label" for="accesibilidad4">4</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="5" id="accesibilidad5" name="accesibilidad" class="custom-control-input" >
                    <label class="custom-control-label" for="accesibilidad5">5</label>
                </div>

                <p>Tiempo</p>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="1" id="tiempo1" name="tiempo" class="custom-control-input" >
                    <label class="custom-control-label" for="tiempo1" >1</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="2" id="tiempo2" name="tiempo" class="custom-control-input" >
                    <label class="custom-control-label" for="tiempo2">2</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="3" id="tiempo3" name="tiempo" class="custom-control-input" >
                    <label class="custom-control-label" for="tiempo3">3</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="4" id="tiempo4" name="tiempo" class="custom-control-input" >
                    <label class="custom-control-label" for="tiempo4">4</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="5" id="tiempo5" name="tiempo" class="custom-control-input" >
                    <label class="custom-control-label" for="tiempo5">5</label>
                </div>

            </div>

            <div class="form-group col-md-4 text-center">

                <div class="nacionalidad">
                
                    <select name="nacionalidad" class="custom-select" name="Nacionalidad" style="width: 225px">
                        <option selected></option>
                        <?php
                        require 'php/conexion.php';
                        $query = $conexion -> query ("SELECT * FROM nacionalidad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id_nacionalidad].'">'.$valores[nombre].'</option>';
                        }
                    ?>
                    </select>
                </div>

            </div>
        </div>
    </form>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>

    </body>
</html>