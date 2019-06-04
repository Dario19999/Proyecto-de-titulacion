<?php
    include 'php/conexion.php';
    include_once 'sesion.php';
    include 'validar.php';

    $userSession = new userSession();
    $user = new User ();

    if(isset($_SESSION['username'])){
        $usuario = $_SESSION['username'];
    }

    $query_this_user = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
    $res = mysqli_query($conexion, $query_this_user);
    while($row = mysqli_fetch_array($res)){
        $id_usuario=$row['id_usuario'];
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cambiar contraseña</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        <script src="js/redirigir.js"></script>
    </head>
    
    <body> 

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
                <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cousine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La cousine</h1>
            </div>
        

            <form action="" method="POST">
                <div class="text-center">
                    <input name="nueva_contra" type="password" placeholder="Inserte su nueva contraseña" required>
                    <input name="nueva_contra_rep" type="password" placeholder="Repita su nueva contraseña" required>
                    <button type="submit" name="cambiar" class="btn boton_generico">Cambiar contraseña</button>
                    <a href="index.php" style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor: pointer;" id="btn_volver">Volver</a>
                </div>

            </form>
        </div>
        
        <?php
            if(isset($_POST['cambiar'])){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                $nueva_contra = $_POST['nueva_contra'];
                $nueva_contra_rep = $_POST['nueva_contra_rep'];

                $patron_p = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                $bandera = 1;

                if(!preg_match($patron_p, $nueva_contra)){
                    echo "<p class = 'error' style = 'color: red'>*La contraseña debe contener al menos 8 caracteres. Entre ellos 1 letra mayúscula y un caracter numérico. 
                    Recuerda que el nombre de usuario y la contraseña deben de ser diferentes.</p>";
                    $bandera = 0;
                }
                if($nueva_contra != $nueva_contra_rep){
                    echo "<p class = 'error' style = 'color: red'>*Las contraseñas deben de ser iguales en ambos campos.</p>";
                    $bandera = 0;
                }
                if(preg_match($patron_p, $nueva_contra) && $bandera == 1){
                    $en_pass = password_hash($nueva_contra, PASSWORD_DEFAULT);
                    $query_new_contra = "UPDATE usuario SET pass = '$en_pass' WHERE id_usuario = '$id_usuario'";
                    $res_new_contra = mysqli_query($conexion, $query_new_contra);

                    echo "<p>Se cambió la contraseña exitosamente</p>";
                }
            }   
        ?>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>

    </body>

</html>