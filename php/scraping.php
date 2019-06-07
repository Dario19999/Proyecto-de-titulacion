<?php


// require 'simple_html_dom.php';
// echo $html = file_get_html("https://bodegaaurrera.net/category/cocina/");
// // foreach($html->find('ul') as $ul) 
// // {
// //        foreach($ul->find('li') as $li) 
// //        {
// //             $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
// //        }
// // }
// // $container = $html->find('ul.items');
// // foreach($container->find('ul') as $ul) 
// // {
// //        foreach($ul->find('li') as $li) 
// //        {
// //             $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
// //        }
// // }
// $ret = $html->find('a')->plaintext;

	try{
		if (isset ($_GET['producto'])){
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
				'producto' => $_GET['producto']
			);

			$client = new SoapClient('http://jessy.gearhostpreview.com/webservice.asmx?WSDL', $opts);
			$response = $client->jessyMethod($reponseParams);
			$col = ceil(count($response->jessyMethodResult->RespuestaModelo,0));
			
			// // header('Content-Type: application/json');
					
			// // for($i=0; $i < ($col); $i++) {

			// }

			echo json_encode($response->jessyMethodResult->RespuestaModelo);
		}
	}

	catch(Exception $e) {
		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	}

	return json_encode ($response->jessyMethodResult->RespuestaModelo);

?>