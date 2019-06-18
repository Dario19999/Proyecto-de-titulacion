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
        $query =("SELECT nombre_receta FROM receta WHERE id_receta = $id_receta");
        $rs = mysqli_query ($conexion, $query);
        $cant = mysqli_num_rows($rs);
        while(($row=mysqli_fetch_array($rs))){ 
        $nombre_receta= $row['nombre_receta'];
        }
    }
?>
    <br>
    <br>
    <br>
    <br>


<?php
if($cant!=0){
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
    $reporte_exists=NULL;
    $query =("SELECT id_reportando FROM reportes WHERE id_receta = $id_receta AND id_reportando=$id_usuario LIMIT 1");
    $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))) {
            $reporte_exists=$row['id_reportando'];
        }

    if ($reporte_exists==NULL){
        $query = ("INSERT INTO reportes (id_reportando, id_receta, id_usuario) VALUES ($id_usuario,$id_receta,$id_usuario_receta )");
        mysqli_query ($conexion, $query);    
    }

    $query =("SELECT * FROM usuario WHERE id_usuario = '$id_usuario_receta'");
    $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))) {
            $correo=$row['correo'];
            $nombre_usuario_receta=$row['nombre'];
        }

    $query =("SELECT receta_rep, usuario_rep, calificacion FROM reportes WHERE id_reportando = $id_usuario AND id_receta=$id_receta LIMIT 1");
    $rs = mysqli_query ($conexion, $query);

        while(($row=mysqli_fetch_array($rs))) {
            $den_receta=$row['receta_rep'];
            $den_usuario=$row['usuario_rep'];
            $cant_votos=$row['calificacion'];
        }

    ?>

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
                    <?php if ($cant_votos!=1 && $cant_votos==0){ ?>
                        <form action="" method="POST">
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

                    <?php if(isset($_POST['cal'])){
   
                                        // if(isset($_POST ['sabor'])){
                                        //     $sabor = $_POST ['sabor'];
                                        // }else $sabor=0;
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
                                        $query="UPDATE receta SET cantidad_vot=+1,  
                                        dificultad= (dificultad+$dificultad)/cantidad_vot,
                                        accesibilidad= (accesibilidad+$accesibilidad)/cantidad_vot, tiempo= (tiempo+$tiempo)/cantidad_vot
                                        WHERE receta.id_receta = $id_receta;";
                                        $rs = mysqli_query ($conexion, $query);

                                        $query =("UPDATE reportes SET calificacion = '1' WHERE reportes.id_reportando =$id_usuario");
                                        mysqli_query ($conexion, $query);

                                        $query="UPDATE usuario SET votos = +1 WHERE usuario.id_usuario = $id_usuario;";
                                        $rs = mysqli_query ($conexion, $query);
                                        }
                                } else { echo "Sólo puedes votar una vez por esta receta.";}
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
        <hr>
        <div class="row">
            <div class="col-5 col-md-5 align-items-end ingredientes">
                <?php 
                    $query_por = "SELECT porciones FROM receta WHERE id_receta = $id_receta";
                    $res_porciones = mysqli_query($conexion, $query_por);
                    while($row = mysqli_fetch_array($res_porciones)){
                        $actual_porciones = $row['porciones'];
                    }
                    $max = $actual_porciones+5;
                ?>

                <form action="" method="POST" id="calc_porciones">
                    <h3>Porciones</h3>
                    <input type="number" name="porcion" id="porciones" min="1" max= "<?php echo $max ?>" value="<?php echo $actual_porciones?>">
                    <button type="submit" class="btn boton_generico" id="recalcular" style="margin-top: 15px;">Recalcular</button>
                    
                    <div class="align-items-end">
                    <hr>
                    <h3>Ingredientes</h3>   
                    <br> 
                    <div>
                  
                            
                    <?php
                        $array=[];
                        if (isset($_POST['porcion'])){
                            $new_porcion = $_POST['porcion'];
                        }else{
                            $new_porcion = $actual_porciones;
                        }

                        $query = ("SELECT cantidad FROM datos_receta WHERE id_receta = $id_receta");
                        $rs = mysqli_query ($conexion, $query);
                        while ($row = mysqli_fetch_assoc($rs)){
                            $cant_original =$row ['cantidad'];
                        }
                                
                        $query = ("SELECT TRUNCATE (cantidad*$new_porcion/$actual_porciones,1) Recalculo, medida, nombre_ingrediente 
                        FROM datos_receta WHERE id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);

                        while($row = mysqli_fetch_assoc($rs)){
                            $new_cantidad = $row['Recalculo']; 
                            $medida=$row['medida'];
                            $ingrediente=$row['nombre_ingrediente']; 
                            
                               


                    ?>
                          <div>
                            <ul>
                                
                                
                                <!-- <?php 
                                // if($new_cantidad>($cant_original*3)){
                                //     $max=
                                    
                                // } ?> -->
                                    <li> <?php  echo $ingrediente."   " .$new_cantidad." ".$medida ; ?> </li>
                               
                                
                                
                            <ul>
                            
                        </div>
                </form>
        <?php
  

                }?>
    </div>
        </div>
        </div>
        </div>
        <hr>

        <div class="procedimiento">
            <h3>Procedimiento</h3>
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
<hr>
            <div class="btn_dictado">
                <a href="receta_dictado.php?id_receta=<?php echo $id_receta ?>" class="btn boton_generico"> Dictado</a>
            </div>
        

        
    </div>

    

    <div class="container-fluid ">
        <div class="row text-center" style="display:block;">
            <div class="col col-xs-4 col-md-3">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" id="super">Bodega Aurrera</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="precio">$$$</h6>
                            <?php 
                        $query = ("SELECT TRUNCATE (cantidad*$new_porcion/$actual_porciones,1) Recalculo, medida, nombre_ingrediente 
                        FROM datos_receta WHERE id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);
                        $cot=0;
                        while($row = mysqli_fetch_assoc($rs)){
                            $new_cantidad = $row['Recalculo']; 
                            $medida=$row['medida'];
                            $ingrediente=$row['nombre_ingrediente']; 

                            $opts = array(
                                'ssl' => array(
                                'ciphers' => 'RC4-SHA',
                                'verify_peer' => false,
                                'verify_peer_name' => false
                                )
                            );
                            // SOAP 1.2 client
                            $reponseParams = array(
                                'pkSitio' => '1',
                                'producto' => $ingrediente
                            );

                            $client = new SoapClient('http://jessy.gearhostpreview.com/webservice.asmx?WSDL', $opts);
                            $response = $client->jessyMethod($reponseParams);
                            if (isset ($response->jessyMethodResult->RespuestaModelo)){
                                $col = ceil(count($response->jessyMethodResult->RespuestaModelo,0));                                          
                                $data=($response->jessyMethodResult->RespuestaModelo);
                                // var_dump($data);
                                echo $producto = $data[0]->valor;
                                echo $valor = $data[1]->valor;
                                echo "<br>";
                                $precio=substr($valor, 3);
                                // echo $new_cantidad;
                                // echo "<br>";
                                $cot=($cot+$precio)*$new_cantidad;
                            }else echo $ingrediente." no se encontró <br>";
                        }
                        echo "Precio total: $".$cot."<br>";
                            ?>
                            <a href="https://bodegaaurrera.net/" target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                        </div>
                </div>

            </div>

        </div>

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
                <?php if ($id_usuario_receta!=$id_usuario && $den_receta!=1 && $den_receta==0){ ?>
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

                    <?php if (isset($_POST['rep_receta'])){
                                 
                                if ($total>=0 && $total<4){
                                    $query = ("UPDATE receta SET reportes = reportes +1 WHERE receta.id_receta = $id_receta");
                                    $rs = mysqli_query ($conexion, $query);                                         
                                    $query =("UPDATE reportes SET receta_rep = '1' WHERE reportes.id_reportando =$id_usuario");
                                    mysqli_query ($conexion, $query);
                                }else if ($total>4){
                                    $query = ("DELETE FROM receta WHERE receta.id_receta=$id_receta");
                                    $rs = mysqli_query ($conexion, $query);                              
                                    $query =("UPDATE reportes SET receta_rep = '1' WHERE reportes.id_reportando =$id_usuario");
                                    mysqli_query ($conexion, $query);
                                    echo "Eliminar";
                                    // $mail = new Mailer();
                                    $asunto="Receta eliminada";
                                    $cuerpo ="Lamentamos informarle que su receta de $nombre_receta ha sido eliminada porque su contenido
                                    ha ofendido o molestado a varios usuarios.";
                                    // if ($mail->email($nombre_usuario_receta, $correo, $asunto, $cuerpo)){
                                    //     echo "Enviado";
                                    // }else{
                                    //     echo $mensaje;
                                    // }

                                    mailer ($correo, $nombre_usuario_receta, $asunto, $cuerpo);
                                }
                                
                            }
                            }else if ($id_usuario_receta==$id_usuario){
                                    echo "No puedes reportarte a ti mismo, bro";  
                                } else  {
                                    echo "No puedes reportar más de una vez esta receta.";
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


            <a href="descarga.php?id_receta=<?php echo $id_receta?>&id_usuario=<?php echo $id_usuario?>" name="descargar" class="btn boton_generico" target="_blank">Descargar</a>

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
                            <?php if ($id_usuario_receta!=$id_usuario && $den_usuario!=1){ ?>

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
                            if(isset ($_POST['rep_usuario'])){
                                $deshabilitada=0;
                                $query = ("SELECT reportes, deshabilitada FROM usuario WHERE id_usuario=$id_usuario_receta");
                                $rs = mysqli_query ($conexion, $query);
                                while(($row=mysqli_fetch_array($rs))){ 
                                    $total = $row['reportes'];
                                    $deshabilitada=$row['deshabilitada'];
                                }

                                if ($total>=0 && $total<5){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query); 
                                
                                }else if($total>4 && $total<10 && $deshabilitada!=1){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    $query = "UPDATE usuario SET fecha = CURDATE(), deshabilitada=1 WHERE usuario.id_usuario = $id_usuario_receta";
                                    $rs = mysqli_query ($conexion, $query); 
                                    $asunto="Cuenta deshabilitada temporalmente";
                                    $cuerpo ="Lamentamos informarle que su cuenta ha sido deshabilitada por el plazo de 10
                                    días debido a que usted ha recibido numerosas denuncias por comportamiento 
                                    inadecuado dentro de esta plataforma. Si vuelve a ser denunciado una vez que se 
                                    reactive, su cuenta será eliminada";
                                    mailer($correo, $nombre_usuario_receta, $asunto, $cuerpo);

                                }else if($total>=5 && $total<10 && $deshabilitada==1){
                                    $query = ("UPDATE usuario SET reportes = reportes+1 WHERE usuario.id_usuario = $id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);  
                                }else {
                                    $query = ("DELETE FROM usuario WHERE usuario.id_usuario=$id_usuario_receta");
                                    $rs = mysqli_query ($conexion, $query);
                                    //ENVIAR CORREO
                                    $asunto="Cuenta eliminada";
                                    $cuerpo ="Lamentamos informarle que su cuenta ha sido eliminada debido a que ha vuelto a ser
                                    reportado por conducta inadecuada después de la reactivación de su cuenta.";
                                    mailer ($correo, $nombre_usuario_receta, $asunto, $cuerpo);
                                }

                                $query =("UPDATE reportes SET usuario_rep = '1' WHERE reportes.id_reportando =$id_usuario");
                                mysqli_query ($conexion, $query);
                                }

                            }else if ($id_usuario_receta==$id_usuario){
                                echo "No puedes reportarte a ti mismo, bro";  
                            } else  {
                                echo "No puedes reportar más de una vez a este usuario.";
                            }
                    ?>  
                        
                </div>
    

                    </div>
                </div>
            </div>
    </div>

    </form>
    

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

</body>
<?php } else {
    echo "<h1>La receta no existe</h1>";
    }   

    
        function mailer ($correo, $nombre_usuario_receta, $asunto, $cuerpo)
        {
            $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.hostinger.mx';                    // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'otro@lacousine.com';               // SMTP username
                $mail->Password   = 'hola12345';                            // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('otro@lacousine.com', 'La Cousine');
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
     

</html>