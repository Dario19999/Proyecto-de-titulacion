<?php

    require __DIR__ . '/../vendor/autoload.php';
    include 'conexion.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

function mailer ($correo, $nombre_usuario_receta, $asunto, $cuerpo)
{
    $mail = new PHPMailer(true);
        //Server settings
        // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.hostinger.mx';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lacuisine@lacousine.com';               // SMTP username
        $mail->Password   = '#BEgwTy`77jnhwj17k';                            // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('lacuisine@lacousine.com', 'La Cuisine');
        $mail->addAddress($correo, $nombre_usuario_receta);     // Add a recipient

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;
        $mail->AltBody = $cuerpo;

        $mail->send();
    }                      
?>