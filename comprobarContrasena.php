<?php
//incluimos la clase nusoap.php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//creamos el objeto de tipo soap_server
$ns="http://jpinarsw.esy.es/PracticaSW";
$server = new soap_server;
$server->configureWSDL('validarContrasena',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//registramos la función que vamos a implementar
$server->register('validarContrasena',
array('x'=>'xsd:string'),
array('y'=>'xsd:string'),
$ns);
//implementamos la función
function validarContrasena($x){
	$filePointer = fopen("toppasswords.txt", "r") or die("Error en lectura de fichero");
	$y = "VALIDA";
	while(!feof($filePointer)) {
		$password = fgets($filePointer);
		$password=trim($password);
		if(strcmp($password, $x) == 0) {
			$y = "INVALIDA";
			break;
		}
	}	
	fclose($filePointer);
	return $y;
}
//llamamos al método service de la clase nusoap
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>