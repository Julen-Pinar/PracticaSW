<?php
  include("configlocal.php");
  $pregunta = $_POST['Pregunta'];
  $respuesta = $_POST['Respuesta'];
  $complex = $_POST['Complejidad'];
/*
$sql="INSERT INTO preguntas(pregunta, respuesta, complejidad) VALUES ('$pregunta', '$respuesta',$complex)";
	
if (!mysql_query($sql))
{

die('Error: ' . mysql_error());
}
*/
$xml = simplexml_load_file('preguntas.xml');
//$ais = $xml->addChild('assessmentItems');
$ai = $xml->addChild('assessmentItem');
$preg= $ai->addChild('itemBody');
$preg->addChild('p',$_POST['Pregunta']);
$res=$ai->addChild('correctResponse');
$res->addChild('value', $_POST['Respuesta']);

echo $xml->asXML();
$xml->asXML('preguntas.xml');

echo "<center>1 question added</center><br>";
mysql_close();
?>