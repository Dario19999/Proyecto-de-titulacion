<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'php/conexion.php';

    if(isset($_POST['reg'])){
        $user_correo = $_PSOT['usuario_correo'];
        
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
    </head>
    
    <body> 

        <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">
                <a href="#" class="navbar-brand brand" style="color: #fffaa3; font-size: 40px;">La Cousine</a>
        </nav>

        <div class="login">

            <div class="titulo">
                <h1>La cousine</h1>
            </div>
        

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="text-center">
                    <input name="usuario_correo" type="text" placeholder="Inserte su correo" required>
                    <button type="submit" name="rec" class="btn boton_generico">Recuperar contraseña</button>
                </div>

            </form>

        </div>

        <?php
            if (isset($_POST['rec'])){
     
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

                    $asunto="Recuperación de contraseña";
                    $cuerpo ="Siga el siguiente link para recuperar su contraseña<br>"?>
                            <a href="nueva_contraseña.php?key=<?php. $actual_pass ?><?php."Pulse aquí para recuperar su contraseña</a>'";
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                        $mail->isSMTP();                                            // Set mailer to use SMTP
                        $mail->Host       = 'smtp.hostinger.mx';                    // Specify main and backup SMTP servers
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'contacto@lacousine.com';               // SMTP username
                        $mail->Password   = 'hola12345';                            // SMTP password
                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                        $mail->Port       = 587;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom('contacto@lacousine.com', 'La Cousine');
                        $mail->addAddress($correo, $username);     // Add a recipient

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $asunto;
                        $mail->Body    = $cuerpo;

                        $mail->send();
                        echo 'Message has been sent';
                        return true;
                    }catch (Exception $e) {
                        return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            }

        ?>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>

</html>