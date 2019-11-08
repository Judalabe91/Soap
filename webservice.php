<?php

	try {
		
		$server = new SoapServer (null,
		array('uri' => 'http://localhost/practica')
		);
		$server->addFunction('getwebservice');

		$server->handle() ;

	} catch (SoapFault $exception) {
		echo 'an excepton ocurred' . $exception;		
	}

	function createXml ($weather, $precipitation, $umidity) {
		$domtree = new DOMDocument('1.0','UTF-8') ;
		$xmlroot = $domtree->createElement ("xml");
		$xmlroot = $domtree->appendChild($xmlroot);

		$currentTrack = $domtree->createElement("weatherData");
		$currentTrack = $xmlroot->appendChild($currentTrack);

		$currentTrack->appendChild($domtree->createElement('weather', $weather));
		$currentTrack->appendChild($domtree->createElement('precipitation', $precipitation ));
		$currentTrack->appendChild($domtree->createElement('umidity', $umidity));

		return $domtree->saveXML () ;


	}

?>