<?php
  include("configlocal.php");
  $pregunta = $_POST['Pregunta'];
  $respuesta = $_POST['Respuesta'];
  $complex = $_POST['Complejidad'];
  $subject = $_POST['Tema'];
$sql="INSERT INTO preguntas(pregunta, respuesta, complejidad) VALUES ('$pregunta', '$respuesta',$complex)";

if (!mysql_query($sql))
{

die('Error: ' . mysql_error());
}

$xml = simplexml_load_file('preguntas.xml');
$assessmentItem = $xml->addChild('assessmentItem');
//if(!isset($complex)) {
  $assessmentItem->addAttribute('complexity',$complex);
//}
$assessmentItem->addAttribute('subject', $subject);
$preg= $assessmentItem->addChild('itemBody');
$preg->addChild('p',$pregunta);
$res=$assessmentItem->addChild('correctResponse');
$res->addChild('value', $respuesta);



echo "<br /><center>1 question added</center><br>";

if(!$xml->asXML('preguntas.xml')) {
  echo "<center><span class=error>Ha habido un error al guardar el XML</span></center>";
} else {
  echo "<center>Introducido correctamente al XML <br />Para verlo en forma de tabla, haga click <a href=\"verPreguntasXMLenTabla.php\">aquí</a> </center><br />";
  echo "<center>De lo contrario si quiere verlo en un formato no-prehistórico, haga click <a href=\"verPreguntasXML.php\">aquí</a> </center><br />";
}

mysql_close();
?>
