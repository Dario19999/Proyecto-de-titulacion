<?php
    require 'php/conexion.php';

    if(isset($_GET['id'])){
        $actual_pass=$_GET['id']?>
  
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Recuperar Contraseña</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
    </head>
    
    <body> 

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
                <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cuisine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La Cuisine</h1>
                <h3>Ventana de Recuperación de contraseña</h3>
                <h5>Usted está recuperando su contraseña</h5>
            </div>
        

            <form action="" method="POST">
                <input type="password" placeholder=" Contraseña nueva" name="new_pass"required>
                <input type="password" placeholder=" Confirmar contraseña" name="conf_new_pass"required>
                <button class="btn boton_generico" type="submit" name="rec">Pulse aquí para Recuperar su contraseña porque usted está en la ventana de recuperación de contraseña</button>
            </form>
        </div>

<?php
        if(isset($_POST['rec'])){
            
        $new_pass = $_POST['new_pass'];
        $conf_new_pass = $_POST['conf_new_pass'];
        $actual_pass = $_GET['id'];

        $en_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        if($new_pass == $conf_new_pass){
            $query = "UPDATE usuario SET pass='$en_pass' WHERE pass='$actual_pass'";
            mysqli_query ($conexion, $query);
            echo "Contraseña modificada";
            header('Location: http://localhost/lacousine.com/index.php');
            // header('Location: https://lacousine.com/index.php');
        }else{
            echo "<p class = 'error' style = 'color: red'>La confirmación de la contraseña y la contraseña deben ser iguales. Favor de corregir</p>";
        }
        
        }

        ?>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>

</html>

<?php }
?>