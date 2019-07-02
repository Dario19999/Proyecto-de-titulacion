<?php
// includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
include 'php/conexion.php';
require 'vendor/autoload.php';

use Google\Cloud\Core\ServiceBuilder;

// Authenticate using a keyfile path
$cloud = new ServiceBuilder([
    'keyFilePath' => 'credentials\lacousine-74f283cb1d17.json'
]);

// Authenticate using keyfile data
$cloud = new ServiceBuilder([
    'keyFile' => json_decode(file_get_contents('credentials\lacousine-74f283cb1d17.json'), true)
]);

// Imports the Cloud Client Library
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

// instantiates a client
$client = new TextToSpeechClient();

//GUARDA AUDIO PROCEDIMIENTO

// sets text to be synthesised
$synthesisInputText = (new SynthesisInput())

    ->setText('Hola');

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
file_put_contents('audio/prueba.mp3', $audioContent);

echo 'Audio content written to audio/prueba.mp3' . PHP_EOL .'<br>';

$query1= "UPDATE receta SET audio = 'audio/prueba.mp3' WHERE id_receta = 27";
mysqli_query ($conexion, $query1) OR DIE ("Error: ".mysqli_error($conexion));



// ?>

