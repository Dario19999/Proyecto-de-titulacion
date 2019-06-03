
<?php
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();
    include_once 'plantilla.php';
    include 'php/conexion.php';
    if (isset ($_SESSION ['username'])) {
        $usuario = $_SESSION['username'];
    }

    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);

    while(($row=mysqli_fetch_assoc($rs))) {

        $usuario= ($row['nombre']);
        $sexo= ($row['sexo']);
        $edad = $row['edad'];
        $id_nacionalidad = ($row['id_nacionalidad']);
        $id_usuario=($row['id_usuario']);
        $votos=($row['votos']);
        $descargas=($row['descargas']);
        $img_perfil=($row['img_perfil']);

    }
                                            
    $nacionalidad="SELECT nombre FROM nacionalidad WHERE id_nacionalidad='$id_nacionalidad'";
    $nac = mysqli_query ($conexion, $nacionalidad);
    while(($row=mysqli_fetch_assoc($nac))) {
        $R_Nac= ($row['nombre']).'<br>';
    }

    $receta = "SELECT * FROM receta WHERE id_usuario='$id_usuario'";
    $recetas = mysqli_query ($conexion, $receta);
    $cant_recetas = mysqli_num_rows($recetas);

?>
 <hr>
 <hr>
 <hr>
 <hr>

    <div class="container-fluid">

        <div style="float: right;">
            <button class="boton_generico btn" id="btn_editar_perfil" onclick="redirigir(this.id)" style="width: 100%;">Editar Perfil</button>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col d-inline text-center">
                <img src="<?php echo $img_perfil?>" alt="Foto de perfil" width="300" height="300" name="img_perfil">
            </div>

            <div class="datos col d-inline">

                <h2>
                    Usuario: <?php echo $usuario?>
                </h2>
                <h2>
                    Nacionalidad: <?php echo $R_Nac?>
                </h2>
                <h2>
                    Género: 
                    <?php 
                    if ($sexo=='M'){
                        echo 'Masculino';
                        }else{
                        echo 'Femenino';}
                    ?>
                </h2>
                <h2>
                    Edad: <?php echo $edad?>
                </h2>

                <h2>Recetas:</h2>
 
                <h4>                     
                    <?php while(($row=mysqli_fetch_assoc($recetas))) {?>
                        <div class="card-body">
                            <a href="receta_lectura.php?id_receta=<?php echo ($row['id_receta'])?>"><?php echo ($row['nombre_receta'])?></a>     
                        </div>
                    <?php }?>

                    <?php 
                        if ($cant_recetas==0){ ?>

                        <h5>Usted no tiene recetas</h5>

                    <?php } ?>
                    

                </h4>


                </div>
            </div>
            
            <br>
            <hr>
            <br>

            <div class="row d-block">
                <div class="col mx-auto" style="width: 100px">
                    <h2>Insignias</h2>
                </div>
            </div>

            <br>
            <br>

            <div class="row insignias">
                <div class="col">
                    <div class="text-center">
                        <h2>Subidas</h2>
                            <?php if($cant_recetas>=1 && $cant_recetas<5){?>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($cant_recetas>=5 && $cant_recetas<10){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($cant_recetas>=10 && $cant_recetas<20){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($cant_recetas>=20 && $cant_recetas<50){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($cant_recetas>=20 && $cant_recetas<100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($cant_recetas>=100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                                <img src="img/insignia6.png" width="100" height="100">
                            <?php }else{?>
                                <p> No tienes insignias </p>
                           <?php } ?>
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <h2>Descargas</h2>
                            <?php if($descargas>=1 && $descargas<5){?>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($descargas>=5 && $descargas<10){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($descargas>=10 && $descargas<20){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($descargas>=20 && $descargas<50){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($descargas>=20 && $descargas<100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($descargas>=100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                                <img src="img/insignia6.png" width="100" height="100">
                            <?php }else{?>
                                <p> No tienes insignias </p>
                           <?php } ?>
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <h2>Votos</h2>
                            <?php if($votos>=1 && $votos<5){?>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($votos>=5 && $votos<10){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($votos>=10 && $votos<20){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($votos>=20 && $votos<50){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($votos>=20 && $votos<100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($votos>=100){?>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                                <img src="img/insignia6.png" width="100" height="100">
                            <?php }else{?>
                                <p> No tienes insignias </p>
                           <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>