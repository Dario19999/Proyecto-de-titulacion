<?php
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();
    include_once 'plantilla.php';
    include 'php/conexion.php';
    include 'php/consultasUsuario.php';

    if(isset($_SESSION['username'])){
        $usuario = $_SESSION['username'];
    }

    $usuario = getUsuario ($usuario);
    $sexo = getGenero($usuario);
    $edad = getEdad($usuario);
    $id_nacionalidad = getIdNacionalidad ($usuario);
    $id_usuario = getIdUsuario ($usuario);
    $votos = getVotos ($usuario);
    $descargas = getDescargas ($usuario);
    $img_perfil = getImgPerfil ($usuario);
    $R_Nac = getNacionalidad ($id_nacionalidad);
    $cant_recetas = getCantRecetas ($id_usuario);
    $recetas = getRecetas ($id_usuario);
?>
 <hr>
 <hr>
 <hr>
 <hr>

    <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col d-inline text-center">
                    <!-- <div style="float: right;">
                        <button class="boton_generico btn" id="btn_editar_perfil" onclick="redirigir(this.id)" style="width: 100%;">Editar Perfil</button>
                    </div> -->
                    <img src="<?php echo $img_perfil?>" alt="Foto de perfil" width="300" height="300" name="img_perfil">
                </div>
            </div>

        <div class="row justify-content-center align-items-center text-center">

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
                            <?php if($cant_recetas>=1 && $cant_recetas<5){
                                echo "Has ganado una insignia por subir 1 receta"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($cant_recetas>=5 && $cant_recetas<10){
                                echo "Has ganado una insignia por subir 5 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($cant_recetas>=10 && $cant_recetas<20){
                                echo "Has ganado una insignia por subir 10 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($cant_recetas>=20 && $cant_recetas<50){
                                echo "Has ganado una insignia por subir 20 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($cant_recetas>=50 && $cant_recetas<100){
                                echo "Has ganado una insignia por subir 50 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($cant_recetas>=100){
                                echo "Has ganado una insignia por subir 100 recetas"?>
                                <br>
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
                            <?php if($descargas>=1 && $descargas<5){
                                echo "Has ganado una insignia por descargar 1 receta"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($descargas>=5 && $descargas<10){
                                echo "Has ganado una insignia por descargar 5 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($descargas>=10 && $descargas<20){
                                echo "Has ganado una insignia por descargar 10 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($descargas>=20 && $descargas<50){
                                echo "Has ganado una insignia por descargar 20 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($descargas>=50 && $descargas<100){
                                echo "Has ganado una insignia por descargar 50 recetas"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($descargas>=100){
                                echo "Has ganado una insignia por descargar 100 recetas"?>
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
                            <?php if($votos>=1 && $votos<5){
                                echo "Has ganado una insignia por votar 1 receta"?>
                                <br>
                                <img src="img/insignia1.png" width="100" height="100">
                            <?php }else if($votos>=5 && $votos<10){
                                echo "Has ganado una insignia por votar 5 recetas"?>
                            <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                            <?php }else if($votos>=10 && $votos<20){
                                 echo "Has ganado una insignia por votar 10 recetas"?>
                            <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                            <?php }else if($votos>=20 && $votos<50){
                                 echo "Has ganado una insignia por votar 20 recetas"?>
                            <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                            <?php }else if($votos>=50 && $votos<100){
                                 echo "Has ganado una insignia por votar 50 recetas"?>
                            <br>
                                <img src="img/insignia1.png" width="100" height="100">
                                <img src="img/insignia2.png" width="100" height="100">
                                <img src="img/insignia3.png" width="100" height="100">
                                <img src="img/insignia4.png" width="100" height="100">
                                <img src="img/insignia5.png" width="100" height="100">
                            <?php }else if($votos>=100){
                                 echo "Has ganado una insignia por votar 100 recetas"?>
                            <br>
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