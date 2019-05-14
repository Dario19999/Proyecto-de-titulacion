<?php

    include_once 'plantilla.php';

?>
<!-----------------------------------[Fin de Plantilla]------------------------------------------>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">

                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>

                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Buscar">
                        </div>

                        <div class="col-auto">
                            <button class="btn boton_generico btn-lg" type="submit">Buscar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <form class="form_style">
        
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
                        <input type="radio" name="tipo" id="radio1" class="custom-control-input">
                        <label class="custom-control-label radio-inline" for="radio1"><h4>Comidas</h4></label> 
                    </div>
                    
                    <div class="custom-control custom-radio margen">
                        <input type="radio" name="tipo" id="radio2" class="custom-control-input">
                        <label  class="custom-control-label radio-inline" for="radio2"><h4>Postres</h4></label> 
                    </div>

                    <div class="custom-control custom-radio margen">
                        <input type="radio" name="tipo" id="radio3" class="custom-control-input">
                        <label  class="custom-control-label radio-inline" for="radio3"><h4>Cocteles</h4></label> 
                    </div>
                
                </div>

            </div>

            <div class="form-group col-md-4 text-center">
              
                <select class="custom-select" name="sabor" style="width: 225px" >
                    <option selected>Sabor</option>
                    <option value="Amargo">Amargo</option>
                    <option value="Salado">Salado</option>
                    <option value="Dulce">Dulce</option>
                    <option value="Ácido">Ácido</option>
                </select>
                <hr>
                <select class="custom-select" name="dificultad" style="width: 225px" >
                    <option selected>Dificultad</option>
                    <option value="Principiante">Principiante</option>
                    <option value="Fácil">Fácil</option>
                    <option value="Difícil">Difícil</option>
                    <option value="Experto">Experto</option>
                </select>
                <hr>
                <select class="custom-select" name="accesibilidad" style="width: 225px" >
                    <option selected>Accesibilidad</option>
                    <option value="Muy Accesible">Muy Accesible</option>
                    <option value="Accesible">Accesible</option>
                    <option value="Poco Accesible">Poco Accesible</option>
                </select>
                <hr>
                <select class="custom-select" name="tiempo" style="width: 225px" >
                    <option selected>Tiempo</option>
                    <option value="Rápida">Rápida</option>
                    <option value="Moderada">Moderada</option>
                    <option value="Tardada">Tardada</option>

                </select>

            </div>

            <div class="form-group col-md-4 text-center">

                <div class="nacionalidad">
                
                    <select class="custom-select" name="Nacionalidad" style="width: 225px">
                        <option value="Mexico">M&eacute;xico</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Italia">Italia</option>
                        <option value="Japón">Jap&oacute;n</option>
                        <option value="Etc.">Etc...</option>
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