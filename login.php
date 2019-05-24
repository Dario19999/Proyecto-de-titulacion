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
            <?php

            ?>
            <form action = "" method="POST" class="needs-validation">

                <?php

                    if (isset($errorLogin)){
                        echo $errorLogin;
                    }



                ?>

                <input type="text" class="form-control" placeholder="Usuario" name ="username" required>
                <input type="password" class="form-control"  placeholder="Contraseña" name ="pass" required> 
                <p><button type="submit" class="btn boton_generico" name="iniciar_sesion">Iniciar Sesión</button></p>
            
            </form>

            <div class="hiperenlace text-center">
                <p> <a style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor: pointer;" id="btn_registrar" onclick="redirigir(this.id)">Registrarse</a></p>
                <p> <a style="font-family: 'Bree Serif', serif; color: #ff7e05; cursor: pointer;" id="btn_cambiar_contra" onclick="redirigir(this.id)">¿Olvidaste tu contraseña?</a></p>
            </div>

        </div>



        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>


    </body>

</html>