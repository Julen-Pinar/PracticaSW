<?php
	session_start();
		if (!isset($_SESSION['usuario'])) {
			header("Location: login.php");
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Dashboard</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
	<SCRIPT>
	showModificar();
	showPreguntas();
	showConectados();
	</SCRIPT>
</HEAD>
<BODY>
	<DIV class="container_form">
		<a href="logout.php" class="logout">Logout</a>
		<DIV class='title'>
			<h1>Dashboard</h1>

		</DIV>
		<div class="formulario">
		usuarios conectados: <div id="usuariosConectados"></div> 		
		<DIV class="info">Preguntas del Usuario: <div id="preguntasUsuario"></div>/ Preguntas Totales: <div id="preguntasTotales"></div></DIV>
	   </div>
    <hr>
    <DIV class="formulario">
      <ul class="opciones">
        <li><a href="#" class="edit_icon" onClick="showModificar()">Modificar Preguntas</a></li>
          <li><a href="#" class="preview_icon" onClick="showVer()">Ver Preguntas</a></li>
      </ul>
      <div id="page">
      </div>
	<br />
	   </DIV>
	   </DIV>
	   <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
