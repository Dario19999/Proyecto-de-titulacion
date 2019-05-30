
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
    </head>
    
    <body> 

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
                <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cousine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La cousine</h1>
            </div>
        

            <form action="php/prueba.php" method="POST">
                <div class="text-center">
                    <input name="usuario_correo" type="text" placeholder="Inserte su correo" required>
                    <button type="submit" name="rec" class="btn boton_generico">Recuperar contraseña</button>
                </div>

            </form>

        </div>
        
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        
    </body>

</html>