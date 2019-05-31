<?php
function producto() {
	try{
		if (isset ($_POST['producto'])){
			$opts = array(
				'ssl' => array(
					'ciphers' => 'RC4-SHA',
					'verify_peer' => false,
					'verify_peer_name' => false
				)
			);
			// SOAP 1.2 client
			$reponseParams = array(
				'pkSitio' => '1',
				'producto' => $_POST['producto']
			);

			$client = new SoapClient('http://jessy.gearhostpreview.com/webservice.asmx?WSDL', $opts);
			$response = $client->jessyMethod($reponseParams);
			$col = ceil(count($response->jessyMethodResult->RespuestaModelo,0));

			header('Content-Type: application/json');
					
			// for($i=0; $i < ($col); $i++)
			// {

			// }

			echo json_encode($response->jessyMethodResult->RespuestaModelo);
		}				
	}

	catch(Exception $e) {
		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	}
}
?>