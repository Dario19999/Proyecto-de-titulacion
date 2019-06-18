<?php
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();
    require 'php/conexion.php';
    include_once 'plantilla.php';



    if(isset($_POST['reg'])){
        $user = $_POST['usuario'];
        $correo = $_POST['correo'];
        $sexo = $_POST['genero'];
        $edad = $_POST['edad'];
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
        <link rel="stylesheet" type ="text/css" href="CSS/plantilla.css">
        <link rel="stylesheet" type ="text/css" href="css/registro.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        <script src="js/redirigir.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
            <a class="navbar-brand brand" style="color: #fffaa3; font-size: 40px; cursor:pointer;" id="btn_logout" onclick="redirigir(this.id)">La Cuisine</a>
        </nav>
    
    <br>
    <br>
    <br>
    <br>

    <div class="container-fluid">
        
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="needs-validation" id="reg_user" enctype="multipart/form-data">

            <div class="row justify-content-center align-items-center text-center">

                <div class="datos col d-inline">

                    <div class="form-group">
                        <label for="subir_foto" class="form-control-file">Seleccionar Imagen de Perfil</label>
                        <input type="file" id="subir_foto" accept ="image/*" name="img_perfil" required>
                    </div>

                </div>
            </div>
        
            <hr>
            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-3 text-center">
                    <h2>Correo</h2>
                    <input type="email"  class="form-control" placeholder="Correo electronico" name="correo" id="in_correo" required>
                </div>
            </div>
            <br>
            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-3 text-center">
                    <h2>Nombre de Usuario</h2>
                    <input type="text"  class="form-control" placeholder="Ingrese su nuevo nombre de usuario..." name="usuario" id="in_nombre" required>
                </div>
            </div>
            <br>
            <div class="form-row h-100 justify-content-center align-items-center sepcs">
                <div class="form-group col-md-3 text-center">
                    <h2>Contraseña</h2>
                    <input type="password"  class="form-control" placeholder="Contraseña" name="contra" id="in_pass" style="margin-bottom: 10px;" required>
                    <input type="password"  class="form-control" placeholder="Repita su contraseña" name ="contra2" id = "in_pass" required>
                    <div class="col-md text-left specs border">
                        <p>
                        La contraseña debe contener:
                        <br>
                        - 8 caracteres como mínimo
                        <br>
                        - Una letra en mayúscula como mínimo
                        <br>
                        - Un caracter numérico
                        </p>
                        
                    </div>
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
                </div>
            </div>
            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-2 text-center">
                    <h2>Edad</h2>
                    <input type="number" name="edad" min="0" value="18" required>
                </div>
            </div>
            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <div class="form-group col-md-4 text-center">
                <h2>Genero</h2>
                    <div class = "col-md-2">
                        
                        <div class="col-md-2 text-left" style="margin-left: 150px">
                            <div class=" custom-control custom-radio custom-control-inline mx-auto">
                                <input type="radio"  class="custom-control-input" id="inputGeneroM" name="genero" value="M" required>
                                <label for="inputGeneroM" class="custom-control-label">Masuculino</label>
                            </div>

                            <div class=" custom-control custom-radio custom-control-inline mx-auto">
                                <input type="radio"  class="custom-control-input" id="inputGeneroF" name="genero" value="F" required>
                                <label for="inputGeneroF" class="custom-control-label">Femenino</label>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <hr>

            <div class="form-row h-100 justify-content-center align-items-center">
                <a style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor:pointer;" id="btn_logout" onclick="redirigir(this.id)">Ya tengo una cuenta</a>
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