<?php
  include("configlocal.php");
  $pregunta = $_POST['Pregunta'];
  $respuesta = $_POST['Respuesta'];
  $complex = $_POST['Complejidad'];
  $subject = $_POST['Tema']
$sql="INSERT INTO preguntas(pregunta, respuesta, complejidad) VALUES ('$pregunta', '$respuesta',$complex)";

if (!mysql_query($sql))
{

die('Error: ' . mysql_error());
}

$xml = simplexml_load_file('preguntas.xml');
$assessmentItem = $xml->addChild('assessmentItem');
if(!empty($complex)) {
  $assessmentItem->addAttribute('complexity',$complex);
}
$assessmentItem->addAttribute('subject', 'dont fucking care');
$preg= $assessmentItem->addChild('itemBody');
$preg->addChild('p',$pregunta);
$res=$assessmentItem->addChild('correctResponse');
$res->addChild('value', $respuesta);

$xml->asXML('preguntas.xml');

echo "<center>1 question added</center><br>";
mysql_close();
?>
