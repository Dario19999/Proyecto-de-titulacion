<?php

    include_once 'plantilla.php';

?>
<!-----------------------------------[Fin de Plantilla]------------------------------------------>

<div class="container-fluid">

    <div class="row justify-content-center align-items-center">
        <div class="col d-inline text-center">
            <img src="img/abstract-user-icon-3.svg" alt="Foto de perfil" width="300" height="300">
        </div>

        <div class="datos col d-inline" align="left">
            <form>
                <div class="form-group">
                    <label class="form-control-file" for="subir_foto">Seleccionar nueva imagen de perfil</label>
                    <input type="file" id="customFile"  accept = "image/*">
                </div>
            </form>
        </div>
    </div>
    
    <br>
    <hr>
    <br>

    <div class="contenedor_formulario text-center">
        <form action="" method="POST">
            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-8 text-center">
                    <h2>Nombre</h2>
                    <input type="text"  class="form-control" placeholder="Ingrese su nuevo nombre de usuario...">
                </div>
            </div>
            <hr>
            <div class="form-row h-100 justify-content-center align-items-center">

                <div class="form-group col-md-6">
                    <h2>Nacionalidad</h2>
                    
                    <select class="form-control custom-select" style="width:225px">
                    <option value="0">Ninguna</option>
                        <?php
                        require 'php/conexion.php';
                        $query = $conexion -> query ("SELECT * FROM nacionalidad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id_nacionalidad].'">'.$valores[nombre].'</option>';
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    
                    <h2>Genero</h2>
                    <div class=" custom-control custom-radio custom-control-inline">
                        <input type="radio"  class="custom-control-input" id="inputGeneroM" name="genero" value="M">
                        <label for="inputGeneroM" class="custom-control-label ">Masuculino</label>
                    </div>

                    <div class=" custom-control custom-radio custom-control-inline">
                        <input type="radio"  class="custom-control-input" id="inputGeneroF" name="genero" value="F">
                        <label for="inputGeneroF" class="custom-control-label ">Femenino</label>
                    </div>
                </div>

            </div>
            
            <br>

            <div class="form-row h-100 justify-content-center align-items-center">
                <a style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor: pointer;" id="btn_cambiar_contra" onclick="redirigir(this.id)">Cambiar Contraseña</a>
            </div>

            <br>

            <div class="form-row h-100 justify-content-center align-items-center">
                <button type="submit" class="btn boton_generico" name="save">Guardar Cambios</button>
            </div>
            <?php

                if(isset($_POST['save']))
                echo "<script type='text/javascript'>window.location.replace('perfil.php');</script>"

            ?>
           
        </form>
    </div>
    
</div>
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>