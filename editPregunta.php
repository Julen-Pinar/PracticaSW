<?php
include("config.php");
session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
  }
    if($_SESSION['profesor'] == 0)  {
    header("Location: gestionPreguntas.php");
  }
$method = $_SERVER['REQUEST_METHOD'];
 switch ($method) {
   case 'GET':
     break;

   case 'POST':
     $pregunta = $_POST['pregunta'];
     $respuesta = $_POST['respuesta'];
     $complejidad = $_POST['complejidad'];
     $usuario = $_POST['usuario'];
     $tema = $_POST['tema'];
     $id_pregunta = $_POST['id_pregunta'];
     $query = mysql_query("UPDATE preguntas SET pregunta='$pregunta',respuesta='$respuesta',complejidad='$complejidad',tema='$tema' WHERE id_pregunta=$id_pregunta");
     echo "<script>window.close()</script>";
     break;
 }

?>
<form action="editPregunta.php" method="POST">
<?php

  $id = $_GET['id'];
  $pregunta = mysql_query("SELECT * FROM preguntas WHERE id_pregunta = $id");
  $row = mysql_fetch_array($pregunta);
  echo "Pregunta: <br /><input id='pregunta' name='pregunta' type=text value='". $row['pregunta'] ."' size=70><br/>";
  echo "Respuesta: <br /><input id='respuesta' name='respuesta' type=text value='". $row['respuesta'] ."' size=70><br />";
  echo "Complejidad: <br /><input id='complejidad' name='complejidad' type=text value='". $row['complejidad'] ."' size=10><br />";
  echo "Tema: <br /><input id='tema' name='tema' type=text value='". $row['tema'] ."' size=30><br />";
  echo "Autor: <br /><input id='usuario' name='usuario' disabled type=text value='". $row['usuario'] ."' size=50><br />";
  echo "<input id='id_pregunta' name='id_pregunta' type=hidden value='". $row['id_pregunta'] ."'><br />";
?>
<input type="submit" value="Actualizar">
</form>
