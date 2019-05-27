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
// return $audioContent;
?>