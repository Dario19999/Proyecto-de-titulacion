
<?php
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    include_once 'plantilla.php';
    include 'php/conexion.php';

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
                <img src="img/abstract-user-icon-3.svg" alt="Foto de perfil" width="300" height="300">
            </div>

            <div class="datos col d-inline">

            <?php

            if (isset ($_SESSION ['username'])) {

            // echo "Hay sesion";

                $usuario = $_SESSION['username'];
            }

            $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
            $rs = mysqli_query ($conexion, $query);



            while(($row=mysqli_fetch_assoc($rs))) {

                $usuario= ($row['nombre']);
                $sexo= ($row['sexo']);
                $id_nacionalidad = ($row['id_nacionalidad']);
                $id_usuario=($row['id_usuario']);
                $votos=($row['votos']);
                $descargas=($row['descargas']);

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
                

                <h2>Recetas</h2>
 
                <h4>                     
                    <?php while(($row=mysqli_fetch_assoc($recetas))) {?>
                        <div class="card-body">
                            <a href="receta_lectura.php?id_receta=<?php echo ($row['id_receta'])?>"><?php echo ($row['nombre_receta'])?></a>     
                        </div>
                <?php }?>
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
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg"
                        width="230" height="230">
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <h2>Descargas</h2>
                        <?php

                        if($descargas>=5 && $descargas<10){
                            
                        }else if($descargas>=10 && $descargas<20){

                        }else if($descargas>=20 && $descargas)
                        ?>
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg" 
                        width="230" height="230">
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <h2>Votos</h2>
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg"
                        width="230" height="230">
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>