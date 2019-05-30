<?php

    include_once 'plantilla.php';
    include_once 'php/conexion.php';
    require __DIR__ . '/vendor/autoload.php';
    include 'php/conexion.php';

    // Imports the Cloud Client Library
    use Google\Cloud\TextToSpeech\V1\AudioConfig;
    use Google\Cloud\TextToSpeech\V1\AudioEncoding;
    use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
    use Google\Cloud\TextToSpeech\V1\SynthesisInput;
    use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
    use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

    if(isset($_GET ['id_receta'])) {
        $nombre=0;
        $paso_actual=-1;
        $id_receta = $_GET ['id_receta'];

        if (isset ($_GET['paso'])){
            $paso_actual=$_GET['paso'];
        }else{
            $paso_actual=-1;
    
        }

        $query = ("SELECT * FROM receta WHERE id_receta = $id_receta");
        $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_array($rs))){ 
        $nombre_receta= $row['nombre_receta'];

        $json = array();
        $i=0;

        $query = ("SELECT * FROM datos_receta WHERE id_receta=$id_receta ");
        $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_assoc($rs))){ 
            $row ['id'] = $i;
            $json[$i] = $row;
            $i++;
        }

        // $query = ("SELECT * FROM receta WHERE id_receta=$id_receta ");
        // $rs = mysqli_query ($conexion, $query);
        // while(($row=mysqli_fetch_assoc($rs))){ 
        //     $row ['id'] = $i;
        //     $json[$i] = $row;
        //     $i++;
        // }

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

<html>
<body>
    <hr>
    <hr>
    <hr>
    <hr>
        
    <div class="container-fluid receta">


        <div class="nombre_receta">
            <h1><?php echo $nombre_receta;?></h1>
            <?php
            if ($paso_actual==-1){

                $query = ("SELECT audio FROM receta WHERE id_receta=$id_receta");
                $rs = mysqli_query ($conexion, $query);         
                while(($row=mysqli_fetch_assoc($rs))){ 
                    $audio=$row['audio'];                       
                }               
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
                        $query = ("SELECT cantidad, medida, id_datos, ingrediente.nombre, receta.porciones 
                        FROM datos_receta, ingrediente, receta WHERE datos_receta.id_receta=$id_receta 
                        AND receta.id_receta=$id_receta AND datos_receta.id_ingrediente = ingrediente.id_ingrediente");
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

                    ?>

                        <li><?php echo $row['paso']?></small></li>
                        
                        
                    <?php }?>        
            </ol>

        </div>

    </div>

    <h3 id="nombre">Temporizadores</h3>
    <h1 id="tiempo">00:00:00</h1>

    Horas<input type="number" id="h">
    Minutos<input type="number" id="m">
    Segundos<input type="number" id="s">


    <button type="button" class ="btn" onclick="Empezar()">Empezar</button>
    <button type="button" class ="btn" id="detener">Detener</button>
    <button type="button" class ="btn" id="reiniciar">Continuar</button>
    <button type="button" class ="btn" id="eliminar">Eliminar</button>

    <!-- <div class="reproductor">

        <a href="#"><i class="fas fa-redo"></i></a>
        <a href="#"><i class="fas fa-angle-double-left"></i></a>
        <a href="#"><i class="fas fa-play reproducir"></i></a>
        <a href="#"><i class="fas fa-angle-double-right"></i></a>
        <a href="#"><i class="far fa-clock"></i></a>

        <p id="escribe"></p>
    
    </div> -->




<?php


$query= "SELECT audio FROM receta WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);
while(($row=mysqli_fetch_assoc($rs))) {
    $set_audio = ['audio'];
}

if (!isset ($set_audio)){



// PROCEDIMIENTO


// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM procedimiento WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);

//GUARDA AUDIO PROCEDIMIENTO

while(($row=mysqli_fetch_assoc($rs))) {
    $texto = $row['paso'];
    $id_procedimiento = $row ['id_procedimiento'];

// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText($texto);

// build the voice request, select the language code ("en-US") and the ssml
// voice gender
$voice = (new VoiceSelectionParams())
    ->setLanguageCode('es-ES')
    ->setSsmlGender(SsmlVoiceGender::FEMALE);

// Effects profile
$effectsProfileId = "telephony-class-application";

// select the type of audio file you want returned
$audioConfig = (new AudioConfig())
    ->setAudioEncoding(AudioEncoding::MP3)
    ->setEffectsProfileId(array($effectsProfileId));

// perform text-to-speech request on the text input with selected voice
// parameters and audio file type
$response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
$audioContent = $response->getAudioContent();

// the response's audioContent is binary
file_put_contents('audio/paso'.$id_procedimiento.'.mp3', $audioContent);

echo 'Audio content written to audio/paso'.$id_procedimiento.'.mp3' . PHP_EOL .'<br>';

$query1= "UPDATE procedimiento SET audio = 'audio/paso$id_procedimiento.mp3' WHERE id_procedimiento = $id_procedimiento";
mysqli_query ($conexion, $query1) OR DIE ("Error: ".mysqli_error($conexion));
}


// //GUARDA AUDIO DE NOMBRES

// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM receta WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs))) {
    $texto = $row['nombre_receta'];
    $id_receta = $row ['id_receta'];

// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText($texto);

// build the voice request, select the language code ("en-US") and the ssml
// voice gender
$voice = (new VoiceSelectionParams())
    ->setLanguageCode('es-ES')
    ->setSsmlGender(SsmlVoiceGender::FEMALE);

// Effects profile
$effectsProfileId = "telephony-class-application";

// select the type of audio file you want returned
$audioConfig = (new AudioConfig())
    ->setAudioEncoding(AudioEncoding::MP3)
    ->setEffectsProfileId(array($effectsProfileId));

// perform text-to-speech request on the text input with selected voice
// parameters and audio file type
$response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
$audioContent = $response->getAudioContent();

// the response's audioContent is binary
file_put_contents('audio/nombre'.$id_receta.'.mp3', $audioContent);

// echo 'Audio content written to audio/nombre'.$id_receta.'.mp3' . PHP_EOL .'<br>';

$query= "UPDATE receta SET audio = 'audio/nombre$id_receta.mp3' WHERE id_receta = $id_receta";
mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}

// return $audioContent;

//GUARDA AUDIO DE DATOS

// instantiates a client
$client = new TextToSpeechClient();
$query=("SELECT * FROM datos_receta WHERE id_receta=$id_receta");
$rs=mysqli_query($conexion, $query);
while ($row=mysqli_fetch_array($rs)){
    $id_datos=$row['id_datos'];
}


$query= ("SELECT cantidad, medida, id_datos, ingrediente.nombre, receta.porciones 
        FROM datos_receta, ingrediente, receta WHERE datos_receta.id_receta=$id_receta 
        AND receta.id_receta=$id_receta AND datos_receta.id_ingrediente = ingrediente.id_ingrediente");
        $rs = mysqli_query ($conexion, $query);

    while(($row=mysqli_fetch_assoc($rs))){ 
        $porciones=$row ['porciones'];
        $cantidad=$row['cantidad'];
        $medida=$row['medida'];
        $ingrediente=$row['nombre'];
        $texto=$cantidad.$medida.$ingrediente;


// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText($texto);

// build the voice request, select the language code ("en-US") and the ssml
// voice gender
$voice = (new VoiceSelectionParams())
    ->setLanguageCode('es-ES')
    ->setSsmlGender(SsmlVoiceGender::FEMALE);

// Effects profile
$effectsProfileId = "telephony-class-application";

// select the type of audio file you want returned
$audioConfig = (new AudioConfig())
    ->setAudioEncoding(AudioEncoding::MP3)
    ->setEffectsProfileId(array($effectsProfileId));

// perform text-to-speech request on the text input with selected voice
// parameters and audio file type
$response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
$audioContent = $response->getAudioContent();

// the response's audioContent is binary
file_put_contents('audio/datos'.$id_datos.'.mp3', $audioContent);

// echo 'Audio content written to audio/datos'.$id_datos.'.mp3' . PHP_EOL .'<br>';

$query= "UPDATE datos_receta SET audio = 'audio/datos$id_datos.mp3' WHERE id_datos = $id_datos";
mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}


// // return $audioContent;


        }


// //GUARDA AUDIO DE INICIO CRONÓMETROS

// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM receta WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs))) {
    $nombre = $row['nombre_receta'];
    $id_receta = $row ['id_receta'];
    $inicio ="Se ha iniciado el temporizador ";
    $texto=$inicio.$nombre;

// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText($texto);

// build the voice request, select the language code ("en-US") and the ssml
// voice gender
$voice = (new VoiceSelectionParams())
    ->setLanguageCode('es-ES')
    ->setSsmlGender(SsmlVoiceGender::FEMALE);

// Effects profile
$effectsProfileId = "telephony-class-application";

// select the type of audio file you want returned
$audioConfig = (new AudioConfig())
    ->setAudioEncoding(AudioEncoding::MP3)
    ->setEffectsProfileId(array($effectsProfileId));

// perform text-to-speech request on the text input with selected voice
// parameters and audio file type
$response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
$audioContent = $response->getAudioContent();

// the response's audioContent is binary
file_put_contents('audio/inicio'.$id_receta.'.mp3', $audioContent);

echo 'Audio content written to audio/inicio'.$id_receta.'.mp3' . PHP_EOL .'<br>';

$query= "UPDATE receta SET audio = 'audio/inicio$id_receta.mp3' WHERE id_receta = $id_receta";
mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}



// //GUARDA AUDIO DE FIN DE CRONÓMETROS

// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM receta WHERE id_receta = $id_receta";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs))) {
    $nombre = $row['nombre_receta'];
    $id_receta = $row ['id_receta'];
    $inicio ="Se ha terminado el temporizador ";
    $texto=$inicio.$nombre;

// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText($texto);

// build the voice request, select the language code ("en-US") and the ssml
// voice gender
$voice = (new VoiceSelectionParams())
    ->setLanguageCode('es-ES')
    ->setSsmlGender(SsmlVoiceGender::FEMALE);

// Effects profile
$effectsProfileId = "telephony-class-application";

// select the type of audio file you want returned
$audioConfig = (new AudioConfig())
    ->setAudioEncoding(AudioEncoding::MP3)
    ->setEffectsProfileId(array($effectsProfileId));

// perform text-to-speech request on the text input with selected voice
// parameters and audio file type
$response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
$audioContent = $response->getAudioContent();

// the response's audioContent is binary
file_put_contents('audio/fin'.$id_receta.'.mp3', $audioContent);

echo 'Audio content written to audio/fin'.$id_receta.'.mp3' . PHP_EOL .'<br>';

$query= "UPDATE receta SET audio = 'audio/fin$id_receta.mp3' WHERE id_receta = $id_receta";
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

        // alert("Siguiente");
        if ( paso_actual < total_pasos ){
            paso_actual = paso_actual+1;
            location.replace(window.location.href + "&paso=" + paso_actual) ;
            }

        },
        
        'repetir': function() {

        // alert("Repetir");
            paso_actual = paso_actual;
            location.replace(window.location.href + "&paso=" + paso_actual) ;

        },

        'anterior': function() {

        // alert("Anterior");
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

    function Empezar(){
        audio_fin.pause();
        audio_inicio.pause();
        audio_fin.currentTime=0;
        audio_inicio.currentTime=0;
        audio_inicio.play();

        $("#tiempo").timer('remove');

        //pause an existing timer
        $("#detener").on('click', function(){
            $("#tiempo").timer('pause')
        });

        //resume a paused timer
        $("#reiniciar").on('click', function(){
            $("#tiempo").timer('resume')
        });

        $("#eliminar").on('click', function(){
            $("#tiempo").timer('remove')
        });
        // $("#tiempo").timer('remove');
        $("#tiempo").timer({
            countdown:true, 
            duration:$("#h").val()+'h'+
            $("#m").val()+'m'+$("#s").val()+'s',
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
    }
    ?>