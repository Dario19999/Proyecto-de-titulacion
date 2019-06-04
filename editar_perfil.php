
<?php

    include 'php/conexion.php';
    include 'plantilla.php';

?>

<br>
<br>
<br>
<br>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="datos col d-inline">
            <form action="php/editar_perfil.php" method="POST" enctype="multipart/form-data">
                <br>
                <br>

                <div class="form-group text-center">
                    <label class="form-control-file" for="subir_foto">Seleccionar nueva imagen de perfil</label>
                    <input type="file" id="subir_foto" accept ="image/*" name="img_perfil">
                </div>

        </div>
    </div>
    <hr>
    <br>
    
    <div class="contenedor_formulario text-center">
        
            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-8 text-center">
                    <h2>Nombre</h2>
                    <input type="text" name="username" class="form-control" placeholder="Ingrese su nuevo nombre de usuario..." >
                </div>
            </div>
            <hr>
            <div class="form-row h-100 justify-content-center align-items-center">

                <div class="form-group col-md-6">
                    <h2>Nacionalidad</h2>
                    
                    <select class="form-control custom-select" style="width:225px" name="nacionalidad">
                    <option value="0">Ninguna</option>
                        <?php
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
                        <input type="radio"  class="custom-control-input" id="inputGeneroM" name="genero" value="M" >
                        <label for="inputGeneroM" class="custom-control-label ">Masuculino</label>
                    </div>

                    <div class=" custom-control custom-radio custom-control-inline">
                        <input type="radio"  class="custom-control-input" id="inputGeneroF" name="genero" value="F" >
                        <label for="inputGeneroF" class="custom-control-label ">Femenino</label>
                    </div>
                </div>

            </div>

            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-2 text-center">
                    <h2>Edad</h2>
                    <input type="number" name="edad" min="0" value="18" style="width: 100px;" required>
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
           
        </form>
    </div>
    
</div>
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>