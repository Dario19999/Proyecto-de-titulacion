<?php

    include_once 'conexion.php';
    require __DIR__ . '/../vendor/autoload.php';

    // Imports the Cloud Client Library
    use Google\Cloud\TextToSpeech\V1\AudioConfig;
    use Google\Cloud\TextToSpeech\V1\AudioEncoding;
    use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
    use Google\Cloud\TextToSpeech\V1\SynthesisInput;
    use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
    use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

    function audio ($texto, $contenido, $id){
    
    $client = new TextToSpeechClient();

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
            file_put_contents('audio/'.$contenido.''.$id.'.mp3', $audioContent);

            // echo 'Audio content written to audio/nombre'.$id_receta.'.mp3' . PHP_EOL .'<br>';

    }

?>