<?php
  include("config.php");
  $pregunta = $_POST['Pregunta'];
  $respuesta = $_POST['Respuesta'];
  $complex = $_POST['Complejidad'];

$sql="INSERT INTO preguntas(pregunta, respuesta, complejidad) VALUES ('$pregunta', '$respuesta','$complex')";
	
	if (!mysql_query($sql))
{

die('Error: ' . mysql_error());
}
echo "1 question added";
mysql_close();
?>