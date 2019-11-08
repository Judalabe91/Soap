<?php
	if (isset($_POST['date'])) {
		$DATE = $_post['date']

		define('WS_URL', 'http://localhost/practica/webservice.php');

		try {
			$cliente = new SoapClient (null, 
			 array('location' => WS_URL,
			 	'uri' => 'http://localhost/practica',
			 	'trace' => 1
			 )
			);

			$res = $client->getwebservice($date);
			$doc = new DOMDocument () ;
			$doc -> loadXML($res) ;
			echo $doc->saveXML();

		} catch (SOAPFult $exception)  { 
			echo 'an exception ocurred: ' . $exception->faulstring;
		}
	}
	
?>