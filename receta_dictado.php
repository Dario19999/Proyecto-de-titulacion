<?php

    include_once 'plantilla.php';
    include_once 'php/conexion.php';

    if(isset($_GET ['id_receta'])) {
        $id_receta = $_GET ['id_receta'];
        $query = ("SELECT * FROM receta WHERE id_receta = $id_receta");
        $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))){ 
        $nombre_receta= $row['nombre_receta'];
        // $query = ("SELECT * FROM procedimiento WHERE id_receta =$id_receta");
        // $rs = mysqli_query ($conexion, $query);
        // while(($row=mysqli_fetch_array($rs))){ 
        // $paso= $row['paso'];
        // $audio = $row ['audio'];

?>
<html>
<body>
    <hr>
    <hr>
    <hr>
    <hr>
        
    <div class="container-fluid receta">


        <div class="nombre_receta">
            <h1><?php echo $nombre_receta;?></h1>
        </div>
    
        
        <div class="row align-items-end">
            <div class="col-7 col-sm-5 col-md-4 ingredientes">
                <hr>
                <h3>Ingredientes</h3>
                <ul class="list-group">
                    <?php 
                        $query = ("SELECT porciones, cantidad, medida, ingrediente.nombre 
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
<hr>
        <div class="procedimiento">
             <h3>Procedimiento</h3>
            <ol>

                    <?php 
                        $query = ("SELECT * FROM procedimiento WHERE id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);

                        while(($row=mysqli_fetch_assoc($rs))){ 
                        $paso=$row['paso'];
                        $audio=$row['audio'];
                    ?>

                        <li><?php echo $row['paso']?></small></li>
                        <audio src="<?php echo $audio ?>" autoplay></audio>
                        
                    <?php } ?>        
            </ol>

        </div>

    </div>
 
    <div class="reproductor">

        <a href="#"><i class="fas fa-redo"></i></a>
        <a href="#"><i class="fas fa-angle-double-left"></i></a>
        <a href="#"><i class="fas fa-play reproducir"></i></a>
        <a href="#"><i class="fas fa-angle-double-right"></i></a>
        <a href="#"><i class="far fa-clock"></i></a>

        <p id="escribe"></p>

        
    </div>


   
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>

        
    <script>
    if (annyang) {
    // Let's define our first command. First the text we expect, and then the function it should call
    var commands = {
        'hola': function() {
        alert("Hola");
        }
    };

    // Add our commands to annyang
    annyang.addCommands(commands);
    annyang.setLanguage ("es-MX");

    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
    }

    //Se establecen los comandos del teclado según el número equivalente a cada flecha 
        
    $(document).keydown(function(tecla){
        $('#keypress').html(tecla.keyCode);
        if (tecla.keyCode == 39){
            alert("Siguiente");
        }else if(tecla.keyCode == 37){
            alert("Anterior");
        }else if (tecla.keyCode == 40){
            alert("Repetir");
        }
    });


</script>

    </body>

</html>

<?php }
    } 
    ?>