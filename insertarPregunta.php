<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Insertar Pregunta</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<?php
	session_start();
		if (!isset($_SESSION['usuario'])) {
			header("Location: login.php");
		}
		
		 $method = $_SERVER['REQUEST_METHOD'];
     switch ($method) {
       case 'GET':
         include('formulario_insertarPreguta.php');
         break;

       case 'POST':
         include('add_insertarPregunta.php');
         break;
     }
		
	?>
	<DIV class="container_form">
		<DIV class='title'>
      <h1>Insertar Pregunta</h1>
    <hr>
      </DIV>
 </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
