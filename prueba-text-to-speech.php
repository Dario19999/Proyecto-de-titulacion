<?php
// includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
include 'php/conexion.php';

// Imports the Cloud Client Library
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM procedimiento WHERE id_receta = 17";
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

echo 'Audio content written to '.$id_procedimiento.'.mp3' . PHP_EOL;

$query1= "UPDATE procedimiento SET audio = 'audio/paso$id_procedimiento.mp3' WHERE id_procedimiento = $id_procedimiento";
mysqli_query ($conexion, $query1) OR DIE ("Error: ".mysqli_error($conexion));
}


//GUARDA AUDIO DE NOMBRES

// instantiates a client
$client = new TextToSpeechClient();
$query= "SELECT * FROM receta WHERE id_receta = 17";
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

echo 'Audio content written to '.$id_receta.'.mp3' . PHP_EOL;

$query= "UPDATE receta SET audio = 'audio/nombre$id_receta.mp3' WHERE id_receta = $id_receta";
mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}

// return $audioContent;

//GUARDA AUDIO DE

// instantiates a client
$client = new TextToSpeechClient();
$query=("SELECT * FROM datos_receta WHERE id_receta=17");
$rs=mysqli_query($conexion, $query);
while ($row=mysqli_fetch_array($rs)){
    $id_datos=$row['id_datos'];
}


$query= ("SELECT porciones, cantidad, medida, ingrediente.nombre 
        FROM datos_receta, ingrediente WHERE id_receta=$id_receta AND datos_receta.id_ingrediente 
        = ingrediente.id_ingrediente");
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

echo 'Audio content written to '.$id_datos.'.mp3' . PHP_EOL;

$query= "UPDATE datos_receta SET audio = 'audio/datos$id_datos.mp3' WHERE id_datos = $id_datos";
mysqli_query ($conexion, $query) OR DIE ("Error: ".mysqli_error($conexion));
}

// return $audioContent;
?>