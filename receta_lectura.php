<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();
    include_once 'plantilla.php';
    include 'php/conexion.php';

    if(isset($_GET ['id_receta'])) {
        $id_receta = $_GET ['id_receta'];
        $nombre =("SELECT nombre_receta FROM receta WHERE id_receta = $id_receta");
        $rs = mysqli_query ($conexion, $nombre);
        $cant = mysqli_num_rows($rs);
        while(($row=mysqli_fetch_array($rs))){ 
        $nombre_receta= $row['nombre_receta'];
        }
    }
?>
    <hr>
        <hr>
            <hr>
                <hr>

<?php
    if (isset ($_SESSION ['username'])) {
        $usuario = $_SESSION['username'];
    }

    $query =("SELECT * FROM usuario WHERE nombre = '$usuario'");
    $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))) {
            $id_usuario=$row['id_usuario'];
        }

    // echo $id_usuario.'<br>';
    // echo $id_receta.'<br>';
    // echo $cant.'<br>';

    $query =("SELECT * FROM receta WHERE id_receta=$id_receta ");
    $rs = mysqli_query($conexion, $query);     
        while(($row=mysqli_fetch_array($rs))) {
            $id_usuario_receta=$row['id_usuario'];
            $total = $row['reportes']; 
        }
    // echo $id_usuario_receta;
    if (isset ($id_usuario_receta)){
        $query = ("INSERT INTO reportes (id_reportes, id_receta, id_usuario) VALUES ($id_usuario,$id_receta,$id_usuario_receta )");
        mysqli_query ($conexion, $query);    
    }

    $query =("SELECT * FROM usuario WHERE id_usuario = '$id_usuario_receta'");
    $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))) {
            $correo=$row['correo'];
            $nombre_usuario_receta=$row['nombre'];
        }

    $query =("SELECT * FROM reportes WHERE id_reportes = $id_usuario AND id_receta=$id_receta");
    $rs = mysqli_query ($conexion, $query);

        while(($row=mysqli_fetch_array($rs))) {
            $den_receta=$row['receta_rep'];
            $den_usuario=$row['usuario_rep'];
            $cant_votos=$row['calificacion'];
        }

    if($cant!=0){?>

<div class="container-fluid receta">

        
    <div class="btn_calificar">
        <div style="float:right;">
        <button type="button" name="calificar" value="calificar" class="btn boton_generico" data-toggle="modal" data-target="#modal_calificar">Calificar</button>

        <div class="modal fade calificar" id="modal_calificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_calificar" style="text-align:center;">Calificar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="POST">
                            <p>Sabor</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor1" name="sabor" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="sabor1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor2" name="sabor" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="sabor2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor3" name="sabor" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="sabor3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor4" name="sabor" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="sabor4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sabor5" name="sabor" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="sabor5">5</label>
                            </div>

                            <p>Dificultad</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad1" name="dificultad" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="dificultad1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad2" name="dificultad" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="dificultad2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad3" name="dificultad" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="dificultad3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad4" name="dificultad" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="dificultad4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dificultad5" name="dificultad" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="dificultad5">5</label>
                            </div>

                            <p>Accesibilidad</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad1" name="accesibilidad" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="accesibilidad1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad2" name="accesibilidad" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="accesibilidad2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad3" name="accesibilidad" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="accesibilidad3">3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad4" name="accesibilidad" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="accesibilidad4">4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesibilidad5" name="accesibilidad" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="accesibilidad5">5</label>
                            </div>

                            <p>Tiempo</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo1" name="tiempo" class="custom-control-input"  value="1">
                                <label class="custom-control-label" for="tiempo1">1</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo2" name="tiempo" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="tiempo2">2</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo3" name="tiempo" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="tiempo3" >3</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo4" name="tiempo" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="tiempo4" >4</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiempo5" name="tiempo" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="tiempo5">5</label>
                            </div>

                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn boton_generico" name="cal" >Enviar</button>
                                

                                <?php 
                                if(isset($_POST['cal']) && $cant_votos!=1){
   
                                        if(isset($_POST ['sabor'])){
                                            $sabor = $_POST ['sabor'];
                                        }else $sabor=0;
                                        if(isset($_POST ['dificultad'])){
                                            $dificultad = $_POST ['dificultad'];
                                        }else $dificultad=0;
                                        if(isset($_POST ['accesibilidad'])){
                                            $accesibilidad = $_POST ['accesibilidad'];
                                        } else $accesibilidad=0;
                                        if(isset($_POST ['tiempo'])){
                                            $tiempo = $_POST ['tiempo'];
                                        } else $tiempo=0;

                                        
                                        $id_receta = $_GET ['id_receta'];
                                        $query="UPDATE receta SET cantidad_vot=cantidad_vot+1, sabor=(sabor+$sabor)/cantidad_vot, 
                                        dificultad= (dificultad+$dificultad)/cantidad_vot,
                                        accesibilidad= (accesibilidad+$accesibilidad)/cantidad_vot, tiempo= (tiempo+$tiempo)/cantidad_vot
                                        WHERE receta.id_receta = $id_receta;";
                                        $rs = mysqli_query ($conexion, $query);
                                        $query =("UPDATE reportes SET calificacion = '1' WHERE reportes.id_reportes =$id_usuario");
                                        mysqli_query ($conexion, $query);
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="nombre_receta">
  
                       <h1> <?php echo $nombre_receta;?></h1>
    
        </div>
    
        
        <div class="row align-items-end">
            <div class="col-7 col-sm-5 col-md-4 ingredientes">

                <h3>Ingredientes</h3>
                <ul class="list-group">

                    <?php 
                        require 'php/conexion.php';
                        $query = ("SELECT cantidad, medida, ingrediente.nombre 
                        FROM datos_receta, ingrediente WHERE id_receta=$id_receta AND datos_receta.id_ingrediente 
                        = ingrediente.id_ingrediente");
                        $rs = mysqli_query ($conexion, $query);

                        while(($row=mysqli_fetch_assoc($rs))){ 
                        
                    ?>

                        <li class="list-group-item">
                            <?php 
                                echo $row['nombre']."   " ?>
                            <small> <?php echo $row['cantidad']." ".$row['medida'] ?></small>
                        </li>
                        
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-2 col-md-1 align-items-end ingredientes">
                <?php 
                    $query_por = "SELECT porciones FROM receta WHERE id_receta = $id_receta";
                    $res_porciones = mysqli_query($conexion, $query_por);
                    while($row = mysqli_fetch_array($res_porciones)){
                        $porciones = $row['porciones'];
                    }
                ?>

                <form action="" method="POST" id="calc_porciones">
                    <h3>Porciones</h3>
                    <input type="number" name="porcion" id="porciones" value="<?php echo $porciones?>">
                    <button type="submit" class="btn boton_generico">Recalcular</button>
                </form>
            </div>
        </div>

        <hr>
        <div class="procedimiento">
            <ol>
                    <?php 
                        require 'php/conexion.php';
                        $query = ("SELECT paso FROM procedimiento WHERE id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);

                        while(($row=mysqli_fetch_assoc($rs))){ 
                        
                    ?>

                        <li><?php echo $row['paso']?></small></li>
                        
                    <?php } ?>     
            </ol>

        </div>

    </div>

    <div class="container-fluid botones">    

            <div class="btn_dictado">
                <a href="receta_dictado.php?id_receta=<?php echo $id_receta ?>" class="btn boton_generico"> Dictado</a>
                    
            </div>
        <hr>

        
    </div>

    <div class="container-fluid cotizacion">
        <div class="row align-items-center justify-content-center">
            <div class="col col-xs-4 col-md-3 ">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" id="super">Walmart</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="precio">$$$</h6>
                            <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                            <a href="https://www.walmart.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA4PQlONBDovv8-Z34GW2HqZ-yU14y7im4fMdLky41LtWH0PCeGcNSBoCdy4QAvD_BwE" target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                        </div>
                </div>

            </div>

            <div class="col col-xs-4 col-md-3 ">

                <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title" id="super1">Sam's</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="precio1">$$$</h6>
                            <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                            <a href="https://www.sams.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA-r4joKi7ty26ohaw2a36Rubjgn86ppcNByhGLz9fNpTqKnt6A8DNRoCA_wQAvD_BwE"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                        </div>
                </div>
            </div>
            <div class="col col-xs-4 col-md-3 ">

                    <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title" id="super2">Costco</h5>
                                <h6 class="card-subtitle mb-2 text-muted" id="precio2">$$$</h6>
                                <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                                <a href="https://www.costco.com.mx/"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                            </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="container-fluid pie">

    </div>

    <div class="btn_denunciar">
        <hr>
            <button type="button" name="denunciar_receta" value="denunciar_receta" class="btn boton_generico" data-toggle="modal" data-target="#modal_denuncia_receta">Denunciar receta</button>

            <div class="modal fade" id="modal_denuncia_receta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
    
                    <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_dreceta" style="text-align:center;">Denunciar receta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                <div class="modal-body">
                    <form action="" method="POST">
                            <div class="form-group">
                                <label for="motivo_receta">Motivo de denuncia</label>
                                <select class="form-control" id="motivo_receta">
                                <option>Es una mala receta</option>
                                <option>Es dañina para la salud</option>
                                <option>Los ingredientes son incorrectos</option>
                                <option>No da los resultados esperados</option>
                                <option>No corresponde a la nacionalidad que indica</option>
                                <option>Otra</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comentarios_receta">Comentarios</label>
                                <textarea class="form-control" id="comentarios_receta" rows="3"></textarea>
                            </div>
              
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" name="rep_receta" class="btn boton_generico">Enviar</button>
                            </div>

                        <?php
                            if (isset($_POST['rep_receta']) && $den_receta!=1){

                                if ($total>=0 && $total<5){
                                    $query = ("UPDATE receta SET reportes = reportes+1 WHERE receta.id_receta = $id_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    echo "Hacer reporte";                                          
                                    $query =("UPDATE reportes SET receta_rep = '1' WHERE reportes.id_reportes =$id_usuario");
                                    mysqli_query ($conexion, $query);
                                }else if ($total==5){
                                    $query = ("DELETE FROM receta WHERE receta.id_receta=$id_receta");
                                    $rs = mysqli_query ($conexion, $query);                              
                                    $query =("UPDATE reportes SET receta_rep = '1' WHERE reportes.id_reportes =$id_usuario");
                                    mysqli_query ($conexion, $query);
                                    echo "Eliminar";
                                    // $mail = new Mailer();
                                    $asunto="Receta eliminada";
                                    $cuerpo ="Lamentamos informarle que su receta de $nombre_receta ha sido eliminada";
                                    // if ($mail->email($nombre_usuario_receta, $correo, $asunto, $cuerpo)){
                                    //     echo "Enviado";
                                    // }else{
                                    //     echo $mensaje;
                                    // }

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
                                        echo 'Message has been sent';
                                        return true;
                                    } catch (Exception $e) {
                                        return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        
                                    }
                                }                
                            }
                        
                    ?>
                    </form>           
                </div>

                    </div>
                </div>
            </div>
    </div>

        <div class="btn_denunciar">
            <hr>
            <button type="button" name="denunciar_usuario" value="denunciar_usuario" class="btn boton_generico" data-toggle="modal" data-target="#modal_denuncia_usuario">Denunciar usuario</button>

            <div class="modal fade" id="modal_denuncia_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
    
                    <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_titulo_dusuario" style="text-align:center;">Denunciar usuario </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="motivo_usuario">Motivo de denuncia</label>
                                <select class="form-control" id="motivo_usuario">
                                <option>Es ofensivo</option>
                                <option>Es un bromista</option>
                                <option>Es molesto</option>
                                <option>Otra</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comentarios_usuario">Comentarios</label>
                                <textarea class="form-control" id="comentarios_usuario" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" name="rep_usuario" class="btn boton_generico">Enviar</button>
                            </div>
                    <?php
                        if (isset($_POST['rep_usuario']) && $den_usuario!=1){
     

                                $query = ("SELECT * FROM usuario WHERE id_usuario=$id_usuario_receta");
                                $rs = mysqli_query ($conexion, $query);

                                while(($row=mysqli_fetch_array($rs))){ 
                                    $total = $row['reportes'];
                                    $deshabilitada=$row['deshabilitada'];
                                }

                                if ($total>=0 && $total<5){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    echo "Reporte hecho";
                                
                                }else if($total>=5 && $total<10 && $deshabilitada!=1){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    $query = "UPDATE usuario SET fecha = CURDATE() WHERE usuario.id_usuario = $id_usuario_receta";
                                    $rs = mysqli_query ($conexion, $query); 
                                    $query = "UPDATE usuario SET desabilitada=1";
                                    $rs = mysqli_query ($conexion, $query); 
                                    $asunto="Cuenta deshabilitada temporalmente";
                                    $cuerpo ="Lamentamos informarle que su cuenta ha sido deshabilitada por el plazo de 10
                                    días debido a que usted ha recibido numerosas denuncias por comportamiento 
                                    inadecuado dentro de esta plataforma. Si vuelve a ser denunciado una vez que se 
                                    reactive, su cuenta será eliminada";
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
                                        echo 'Message has been sent';
                                        return true;
                                    } catch (Exception $e) {
                                        return $mensaje="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        
                                    }

                                }else if($total>=5 && $total<10 && $deshabilitada==1){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);  
                                }else {
                                    $query = ("DELETE FROM usuario WHERE usuario.id_usuario=$id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    //ENVIAR CORREO
                                }

                                $query =("UPDATE reportes SET usuario_rep = '1' WHERE reportes.id_reportes =$id_usuario");
                                mysqli_query ($conexion, $query);

                            }
                    ?>  
                        
                </div>
    

                    </div>
                </div>
            </div>
    </div>

    </form>

    <a href="descarga.php?id_receta=<?php echo $id_receta?>" type="button" name="descargar" class="btn boton_generico">Descargar</button>
   

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

</body>
<?php }else {echo "<h1>La receta no existe</h1>";} ?>
     

</html>