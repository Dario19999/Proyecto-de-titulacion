<?php

    include 'php/conexion.php';
    include 'php/mailer.php';

    ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Recuperar contraseña</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        <script src="js/redirigir.js"></script>
    </head>
    
    <body> 

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
                <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cuisine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La Cuisine</h1>
            </div>
        

            <form action="" method="POST">
                <div class="text-center">
                    <input name="usuario_correo" type="text" placeholder="Inserte su correo" required>
                    <button type="submit" name="rec" class="btn boton_generico">Recuperar contraseña</button>
                    <a href="index.php" style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor: pointer;" id="btn_volver">Volver</a>
                </div>

            </form>
<?php


    if (isset($_POST['rec'])){
        $user_correo = $_POST['usuario_correo'];
     
        $query = "SELECT correo, nombre, pass FROM usuario WHERE correo = '$user_correo'";
        $rs = mysqli_query ($conexion, $query);
        $existe = mysqli_num_rows($rs);
        
        if($existe !==1){
            echo "<p class = 'error' style = 'color: red'>El correo no existe.</p>";

        }else{
            while($row=mysqli_fetch_array($rs)){ 
                $correo = $row['correo'];
                $user = $row['nombre'];
                $actual_pass = $row['pass'];
            }

            $url="http://localhost/lacousine.com/nueva_contraseña.php?id=$actual_pass";
            // $url="https://lacousine.com/nueva_contraseña.php?id=$actual_pass";

            $asunto="Recuperar ";
            $cuerpo ="Hemos notado que deseas cambiar tu clave de ingreso. De ser esto correcto, 
            por favor ingresa al siguiente enlace: <a href='$url'>$url</a>";
            
            try {
                mailer ($correo, $user, $asunto, $cuerpo);
                echo 'Se ha enviado un correo electronico para la recuperacion';
                return true;
            }catch (Exception $e) {
                return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }                                                                          
                        
?>
        </div>        
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>

    </body>

</html>