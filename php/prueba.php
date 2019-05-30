<?php
    include_once 'conexion.php';


    // $user_correo="jessica@gmail.com";
    // $query = ("SELECT * FROM usuario WHERE correo = '$user_correo'");
    // $rs = mysqli_query ($conexion, $query);
    // $existe = mysqli_num_rows($rs);
    // $asunto="Recuperación de contraseña";
    // $cuerpo ="Siga el siguiente link para recuperar su contraseña";
    // if($existe !==1){
    //     echo "<p class = 'error' style = 'color: red'>El nombre de usuario o correo no existe.</p>";

    // }else{
    //     while($row=mysqli_fetch_array($rs)){ 
    //         echo $correo = $row['correo'];
    //         echo $user = $row['nombre'];
    //         echo $actual_pass = $row['pass'];
    //     }


    // }
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    // // require 'vendor/phpmailer/phpmailer/src/Exception.php';
    // // require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    // // require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    // require '../vendor/autoload.php';

    // $user_correo = $_POST['usuario_correo'];
        
    

    // if (isset($_POST['rec'])){
     
    //     $query = "SELECT correo, nombre, pass FROM usuario WHERE correo = '$user_correo'";
    //     $rs = mysqli_query ($conexion, $query);
    //     $existe = mysqli_num_rows($rs);
        
    //     if($existe !==1){
    //         echo "<p class = 'error' style = 'color: red'>El correo no existe.</p>";

    //     }else{
    //         while($row=mysqli_fetch_array($rs)){ 
    //             $correo = $row['correo'];
    //             $user = $row['nombre'];
    //             $actual_pass = $row['pass'];
    //         }

    //         $asunto="Recuperación de contraseña";
    //         $cuerpo ="holamundo";

    //         $mail = new PHPMailer(true);
    //         try {
    //             //Server settings
    //             $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    //             $mail->isSMTP();                                            // Set mailer to use SMTP
    //             $mail->Host       = 'smtp.hostinger.mx';                    // Specify main and backup SMTP servers
    //             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //             $mail->Username   = 'contacto@lacousine.com';               // SMTP username
    //             $mail->Password   = 'hola12345';                            // SMTP password
    //             $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    //             $mail->Port       = 587;                                    // TCP port to connect to

    //             //Recipients
    //             $mail->setFrom('contacto@lacousine.com', 'La Cousine');
    //             $mail->addAddress($correo, $user);     // Add a recipient

    //             // Content
    //             $mail->isHTML(true);                                  // Set email format to HTML
    //             $mail->Subject = $asunto;
    //             $mail->Body    = $cuerpo;

    //             $mail->send();
    //             echo 'Message has been sent';
    //             return true;
    //         }catch (Exception $e) {
    //             return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         }

    //     }
    // }
?>