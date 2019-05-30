<?php

    require __DIR__ . '/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    

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
        $mail->addAddress("jessicaamaralfranco@gmail.com", "Jessica");     // Add a recipient

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Hola";
        $mail->Body    = "Qué tal";
        $mail->AltBody = "Puto";

        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
            
                                              
                            
                        
?>