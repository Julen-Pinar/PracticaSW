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
		if(!(isset($_SESSION['login']) && $_SESSION['login'] != '') {
			header("Location: login.php");
		}
	?>
	<DIV class="container_form">
		<DIV class='title'>
      <h1>Insertar Pregunta</h1>
    <hr>
      </DIV>
	  <DIV class='formulario'>
	  <form id="insertar" method="GET" action="" name="insertar" onsubmit="">
	   <p>  Pregunta: <input name="Pregunta" id="Pregunta" type="text"></p>
	   <p>  Respuesta: <input name="Respuesta" id="Respuesta" type="text"></p>
	   <p> Complejidad (opcional): <input name="Complejidad" id="Complejidad" type="number" min="1" max="5"></p>
	    <input type=submit>
	   </DIV>
 </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
