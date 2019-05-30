<?php
    include_once 'php/conexion.php';
    require __DIR__ . '/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // $query_groseria = "SELECT groseria FROM groseria";
    // $res_groseria = mysqli_query($conexion, $query_groseria);
    // $paso_1="lala puta";
    // $paso_2="hola como estas";
    // $paso_3="leche de";
    // $cant_pasos=3;
    // $p=0;
    
    // while($row = mysqli_fetch_array($res_groseria)){
    //     echo $row['groseria'];
    //     if($p != $cant_pasos){
    //         $p++;
    //         if(strpos($paso_1, $row['groseria']) !== false){
                
    //             $bandera = 0;
    //             $mostrar_paso_error = 1;
    //             echo $bandera;
    //             break;
                
                
    //         }else{    
    //             $bandera = 1; 
    //             $mostrar_paso_error = 0; 
    //             // echo ${"paso_" . $p};
    //             echo $bandera;
    //         }
    //         // echo ${"paso_" . $p};
    //     }else{
    //         break;

    //     }
       
    // }
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

    $user_correo = $_POST['usuario_correo'];
        
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

            $url="http://localhost/lacousine.com/nueva_contraseña?id='.$actual_pass .";

            $asunto="Recupearar contraseña";
            $cuerpo ="Hemos notado que deseas cambiar tu contraseña. De ser esto correcto, 
            por favor ingresa al siguiente enlace: <a href='$url'>$url</a>";

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
                $mail->addAddress($correo, $user);     // Add a recipient

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