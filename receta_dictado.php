<?php

    include_once 'plantilla.php';
    include_once 'php/conexion.php';
    require __DIR__ . '/vendor/autoload.php';
    include 'php/conexion.php';
    include 'php/consultasReceta.php';
    include 'php/generar_audios.php';

    if(isset($_GET ['id_receta'])) {
        $nombre=0;
        $paso_actual=-1;
        $id_receta = $_GET ['id_receta'];

        if (isset ($_GET['paso'])){
            $paso_actual=$_GET['paso'];
        }else{
            $paso_actual=-1;
        }

        $nombre_receta = getReceta($id_receta);

        $json = array();
        $i=0;

        $query = ("SELECT * FROM datos_receta WHERE id_receta=$id_receta ");
        $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_assoc($rs))){ 
            $row ['id'] = $i;
            $json[$i] = $row;
            $i++;
        }

        $query = ("SELECT * FROM procedimiento WHERE id_receta=$id_receta");
        $rs = mysqli_query ($conexion, $query);
        $rs=mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_assoc($rs))){ 
            $row ['id'] = $i;
            $json[$i] = $row;
            $i++;
        }$res = json_encode($json);

        $array = json_decode($res);
        ($array);

        foreach($array as $obj){
            $id = $obj->id;
            $audio = $obj->audio;
            $id." ".$audio." <br>";
        }

        $total_pasos = $array[$i-1]->id;
        
?>


    <hr>
    <hr>
    <hr>
    <hr>
        
    <div class="container-fluid receta">


        <div class="nombre_receta">
            <h1><?php echo $nombre_receta;?></h1>
            <?php
            if ($paso_actual==-1){
            
                $audio = getAudio($id_receta);
                $set_audio = getSetAudio ($id_receta);
            ?>

            <audio src="<?php echo $audio ?>" autoplay></audio>
            <?php } else if (isset ($_GET['paso'])){ ?>
        <audio src="<?php echo $array[$paso_actual]->audio; ?>" autoplay></audio>
        <?php } ?>
        
        <div class="row align-items-end">
            <div class="col-7 col-sm-5 col-md-4 ingredientes">
                <hr>
                <h3>Ingredientes</h3>
                <ul class="list-group">
                    <?php 
                        $query = ("SELECT cantidad, medida, id_datos, nombre_ingrediente, receta.porciones 
                        FROM datos_receta, receta WHERE datos_receta.id_receta=$id_receta 
                        AND receta.id_receta=$id_receta");
                        $rs = mysqli_query ($conexion, $query);
                        while(($row=mysqli_fetch_array($rs))){     
                        
                    ?>

                        <li class="list-group-item">
                            <?php 
                                echo $row['nombre_ingrediente']."   " ?>
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

                    ?>

                        <li><?php echo $row['paso']?></small></li>
                        
                        
                    <?php }?>        
            </ol>

        </div>

    </div>
    <hr>
    <h2>Temporizadores</h2>                  
    <?php
    
    $query =("SELECT * FROM cronometros WHERE id_receta=$id_receta");
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_array($rs))) {
        $horas=$row['horas'];
        $minutos=$row['minutos'];
        $segundos=$row['segundos'];
        $id_crnm = $row['id_cronometro'];
        $nombre_crnm = $row['nombre'];?>

      
        <?php if(isset($nombre_crnm)) {?>
        <br>
        <h3> <?php echo $nombre_crnm ?> </h3>

        <h3 id="tiempo<?php echo $id_crnm ?>"><?php echo $horas ?>:<?php echo $minutos ?>
        :<?php echo $segundos ?></h3>           
    
        <button type="button" id="<?php echo $id_crnm ?>" data-h="<?php echo $horas ?>" 
        data-m="<?php echo $minutos ?>" data-s="<?php echo $segundos ?>" onclick="Empezar(this.id)">Empezar</button>
        <button type="button" id="detener<?php echo $id_crnm ?>">Detener</button>
        <button type="button" id="reiniciar<?php echo $id_crnm ?>">Continuar</button>
        <br>
      
    <?php } else echo "No hay temporizadores";}?>
     
<?php

// $query = ("SELECT audio FROM receta WHERE id_receta=$id_receta");
// $rs = mysqli_query ($conexion, $query);         
// while(($row=mysqli_fetch_assoc($rs))){        
//     $set_audio =$row['audio'];                
// }          
 
// if (!isset ($set_audio)){

// NOMBRE RECETA 
    $query= "SELECT * FROM receta WHERE id_receta = $id_receta";
    $rs = mysqli_query ($conexion, $query);

    while(($row=mysqli_fetch_assoc($rs))) {
        $texto = $row['nombre_receta'];
        $id_receta = $row ['id_receta'];
        $contenido = "nombre";

        audio ($texto, $contenido, $id_receta);

        $query= "UPDATE receta SET audio = 'audio/nombre$id_receta.mp3' WHERE id_receta = $id_receta";
        mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
    }


// PROCEDIMIENTO

$query= "SELECT * FROM procedimiento WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs))) {
    $texto = $row['paso'];
    $id_procedimiento = $row ['id_procedimiento'];
    $contenido = "paso";

    audio ($texto, $contenido, $id_procedimiento);

    $query1= "UPDATE procedimiento SET audio = 'audio/paso$id_procedimiento.mp3' WHERE id_procedimiento = $id_procedimiento";
    mysqli_query ($conexion, $query1) OR DIE ("Error: ".mysqli_error($conexion));
}

//GUARDA AUDIO DE DATOS

// instantiates a client
$query=("SELECT * FROM datos_receta WHERE id_receta=$id_receta");
$rs=mysqli_query($conexion, $query);
while ($row=mysqli_fetch_array($rs)){
    $id_datos=$row['id_datos'];
}

$query= ("SELECT cantidad, medida, id_datos, nombre_ingrediente, receta.porciones 
        FROM datos_receta, receta WHERE datos_receta.id_receta=$id_receta 
        AND receta.id_receta=$id_receta");
        $rs = mysqli_query ($conexion, $query);

    while(($row=mysqli_fetch_assoc($rs))){ 
        $porciones=$row ['porciones'];
        $cantidad=$row['cantidad'];
        $medida=$row['medida'];
        $ingrediente=$row['nombre_ingrediente'];
        $texto=$cantidad.$medida.$ingrediente;
        $contenido = "datos";

        audio ($texto, $contenido, $id_datos);

        $query= "UPDATE datos_receta SET audio = 'audio/datos$id_datos.mp3' WHERE id_datos = $id_datos";
        mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}


?>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/timer.jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
        
    <script>

        if (annyang) {

        var paso_actual=<?php echo $paso_actual ?>;
        var total_pasos = <?php echo $total_pasos ?>;
        var paso_inicial =-1;

    // Let's define our first command. First the text we expect, and then the function it should call
    var commands = {

        'siguiente': function() {

        alert("Siguiente");
        if ( paso_actual < total_pasos ){
            paso_actual = paso_actual+1;
            location.replace(window.location.href + "&paso=" + paso_actual) ;
            }

        },
        
        'repetir': function() {

        alert("Repetir");
            paso_actual = paso_actual;
            location.replace(window.location.href + "&paso=" + paso_actual) ;

        },

        'anterior': function() {

        alert("Anterior");
            if ( paso_actual > paso_inicial){
                paso_actual = paso_actual-1;
                location.replace(window.location.href + "&paso=" + paso_actual) ;
            }
        },

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
        // alert("Siguiente");
        if ( paso_actual < total_pasos ){
            paso_actual = paso_actual+1;
            location.replace(window.location.href + "&paso=" + paso_actual) ;
        }
        // else {
        //     paso_actual = paso_actual;
        //     location.replace(window.location.href + "&paso=" + paso_actual) ;
        // }

    }else if(tecla.keyCode == 37){
        // alert("Anterior");
            if ( paso_actual > paso_inicial){
                paso_actual = paso_actual-1;
                location.replace(window.location.href + "&paso=" + paso_actual) ;
            }

    }else if (tecla.keyCode == 40){
        // alert("Repetir");
            paso_actual = paso_actual;
            location.replace(window.location.href + "&paso=" + paso_actual) ;
    }
    // document.location.href="http://localhost/lacousine.com/perfil.php" ;

    })
        audio_fin=new Audio("audio/fin.mp3");
        audio_inicio=new Audio("audio/inicio.mp3");

    function Empezar(id){
        audio_fin.pause();
        audio_inicio.pause();
        audio_fin.currentTime=0;
        audio_inicio.currentTime=0;
        audio_inicio.play();

        var horas = parseInt($("#"+id).attr("data-h"));
        var minutos = parseInt($("#"+id).attr("data-m"));
        var segundos = parseInt($("#"+id).attr("data-s"));

        $("#tiempo"+id).timer('remove');

        //pause an existing timer
        $("#detener"+id).on('click', function(){
            $("#tiempo"+id).timer('pause')
        });

        //resume a paused timer
        $("#reiniciar"+id).on('click', function(){
            $("#tiempo"+id).timer('resume')
        });

        $("#eliminar"+id).on('click', function(){
            $("#tiempo"+id).timer('remove')
        });
        // $("#tiempo").timer('remove');
        $("#tiempo"+id).timer({
            countdown:true,
            duration:horas+'h'+minutos+'m'+segundos+'s',   
            callback:function(){
                // audio.addEventListener('ended', function(){
                //     this.currentTime=0;
                //     this.play();
                //     }, false);
                    audio_fin.play();
                // alert("Time up!");

                },
                format:'%H:%M:%S'
            
        });
    }    
 
</script>

    </body>

</html>

<?php }
    
    ?> 