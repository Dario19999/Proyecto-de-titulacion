<?php
    require 'php/conexion.php';

    if(isset($_POST['reg'])){
        $user = $_POST['usuario'];
        $correo = $_POST['correo'];
        $sexo = $_POST['genero'];
        $pass = $_POST['contra'];
        $pass_ver = $_POST['contra2'];
        $nacionalidad = $_POST['nacionalidad'];
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Registro</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="CSS/plantilla.css">
        <link rel="stylesheet" type ="text/css" href="css/registro.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Ser0.0if" rel="stylesheet">
        
    </head>

    <body>

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
            <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cousine</a>
        </nav>
        
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col d-inline text-center">
                <img src="img/abstract-user-icon-3.svg" alt="Foto de perfil" width="300" height="300">
            </div>

            <div class="datos col d-inline">
                <form>
                    <div class="form-group">
                        <label for="subir_foto" class="form-control-file">Seleccionar Imagen de Perfil</label>
                        <input type="file" id="subir_foto" accept = "image/*">
                    </div>
                </form>
            </div>
        </div>
    
        <hr>
        
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="needs-validation">
            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-3 text-center">
                    <h2>Correo</h2>
                    <input type="email"  class="form-control" placeholder="Correo electronico" name="correo" id="in_correo" required>
                    <div class="invalid-feedback">Es necesario ingresar un correo</div>
                </div>
            </div>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-3 text-center">
                    <h2>Nombre de Usuario</h2>
                    <input type="text"  class="form-control" placeholder="Ingrese su nuevo nombre de usuario..." name="usuario" id="in_nombre" required>
                    <div class="invalid-feedback">Es necesario ingresar un nombre de usuario</div>
                </div>
            </div>

            <div class="form-row h-100 justify-content-center align-items-center sepcs">
                <div class="form-group col-md-3 text-center">
                    <h2>Contraseña</h2>
                    <input type="password"  class="form-control" placeholder="Contraseña" name="contra" id="in_pass" required>
                    <div class="col-md text-left specs border">
                        <p>
                        La contraseña debe contener:
                        <br>
                        - 8 caracteres como mínimo
                        <br>
                        - Una letra en mayúscula
                        <br>
                        - Un caracter numérico
                        </p>
                        
                    </div>
                    <div class="invalid-feedback">Es necesario ingresar una contraseña</div>
                </div>
            </div>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-3 text-center">
                    <h2>Confirmar contraseña</h2>
                    <input type="password"  class="form-control" placeholder="Repita su contraseña" name ="contra2" id = "in_pass" required>
                    <div class="invalid-feedback">Es necesario repetir la contraseña</div>
                </div>
            </div>

            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-2 text-center">
                    <h2>Nacionalidad</h2>
                    
                    <select name="nacionalidad" class="form-conrtol custom-select" style="width: 225px" required>
                    <?php
                        
                        $query = $conexion -> query ("SELECT * FROM nacionalidad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id_nacionalidad].'">'.$valores[nombre].'</option>';
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">Es necesario seleccionar una nacionalidad</div>
                </div>
            </div>
            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-4 text-center">
                <h2>Genero</h2>
                    <div class = "col-md-2">
                        
                        <div class="col-md-2 text-left" style="margin-left: 130px">
                            <div class=" custom-control custom-radio custom-control-inline mx-auto">
                                <input type="radio"  class="custom-control-input" id="inputGeneroM" name="genero" value="M" required>
                                <label for="inputGeneroM" class="custom-control-label">Masuculino</label>
                            </div>

                            <div class=" custom-control custom-radio custom-control-inline mx-auto" style="margin-right: 100px">
                                <input type="radio"  class="custom-control-input" id="inputGeneroF" name="genero" value="F" required>
                                <label for="inputGeneroF" class="custom-control-label">Femenino</label>
                            </div>
                            <div class="invalid-feedback">Es necesario seleccionar un genero</div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <a href="login.html" style="font-family: 'Bree Serif', serif; color: #ff7e05;">Ya tengo una cuenta</a>
            </div>
            
            <br>

            <div class="form-row h-100 justify-content-center align-items-center">
                <input type="submit" class="btn boton_generico" name ="reg" value ="Registrar">
            </div>
            <?php
                require 'php/registrar.php';
            ?>
        </form>
    </div>
    <br>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

</body>
</html>