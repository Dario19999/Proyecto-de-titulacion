<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Iniciar sesión</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="stylesheet" href="css/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        
        
    </head>
    
    <body> 
        
        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
            <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cousine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La cousine</h1>
            </div>

            <form action = "" method="POST" class="needs-validation">

                <?php

                    if (isset($errorLogin)){
                        echo $errorLogin;
                    }

                ?>

                <input type="text" placeholder=" Usuario" name ="username" required>
                <input type="password" placeholder=" Contraseña" name ="pass" required> 
                <p><button type="submit" class="boton" name="iniciar_sesion">Iniciar Sesión</button></p>
            </form>

            <div class="hiperenlace">
                <p> <a href="registro.php" style="font-family: 'Bree Serif', serif; color: #ff7e05;">Registrarse</a></p>       
                <p> <a href="cambiar_contraseña.html" style="font-family: 'Bree Serif', serif; color: #ff7e05;">¿Olvidaste tu contraseña?</a></p>
            </div>

        </div>



        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>


    </body>

</html>