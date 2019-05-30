<?php
function consultaDefinicion() {
	try{
		
	if($_GET['producto']!=""){
$client = new SoapClient("http://namestormingwebservice.gearhostpreview.com/WebService.asmx?WSDL", array('cache_wsdl' => WSDL_CACHE_NONE)); 
		
       $params = array(
  "producto" => $_GET['producto']
);
      
$response = $client->jessyMethod($params);
$col = ceil(count($response->jessyMethodResult->RespuestaModelo,0));

echo '<h2>DEFINICIONES</h2>';
echo "<table class='tablaResultado' style='border:1px solid #000'>";
		
for($i=0; $i < ($col); $i++)
{
	echo "<tr>";
	echo "<td style='border:1px solid #000'>".$response->jessyMethodResult->RespuestaModelo->valor."</td>";
	echo "</tr>";
	}
			echo "</table>";
	//

	}
			
	}
	
	catch(Exception $e){echo 'Excepción capturada: ',  $e->getMessage(), "\n";}
}
consultaDefinicion();
?>