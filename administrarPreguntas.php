<?php
	include("config.php");
	session_start();
		if (!isset($_SESSION['usuario'])) {
			header("Location: login.php");
		}
			if($_SESSION['profesor'] == 0)  {
			header("Location: gestionPreguntas.php");
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Preguntas</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_form">
	<a href="logout.php" class="logout">Logout</a>
	<div id="light" class="white_content">
		<div id="editor"></div>
	</div>
	<div id="fade" class="black_overlay" onClick="closeEdit();"></div>
		<DIV class='title'>
      <h1>Preguntas</h1>
    <hr>
      </DIV>
			<DIV class="preguntas">
      <?php

        function mostrarPreguntas($user) {
          $preguntas = mysql_query("SELECT * FROM preguntas");
					while($row = mysql_fetch_array($preguntas))
					{
							echo "<div id='pregunta".  $row['id_pregunta']  ."'>";
							//Imprimimos opciones
							echo "<div class='opciones'>";
							echo "<a class='delete_icon' href='javascript:deletePregunta(". $row['id_pregunta'] .")'> Eliminar</a>";
							echo "<a href='#' class='edit_icon' onclick='javascript:showEdit(". $row['id_pregunta'] .")'> Editar</a>";
							echo "</div>";
						  // Imprimimos Tema
						  echo "<div class='temaTiny'>";
						  echo $row['tema'];
						  echo "</div>\n";
						   // Imprimimos Creador
						  echo "<div class='creador'>";
						  echo $row['usuario'];
						  echo "</div>\n";
						  // Imprimimos enunciado
						  echo "<div class='enunciado'>";
						  echo $row['pregunta'];
						  echo "</div>\n";
						  // Imprimimos enunciado
						  echo "<div class='respuesta'>";
						  echo $row['respuesta'];
						  echo "</div>\n";
						  //Imprimimos complejidad
						  echo "<div class='complejidadXML'>";
						  echo $row['complejidad'];
						  echo "</div><br />";
						  //Barra y salto de linea
						  echo "<br /><hr /><br /></div>";
					}
          switch($user)
          {
            case "anon":
							echo "<center>Watching as Anonymous</center><br />";
              break;
            default:
							echo "<center>Watching as ".$_SESSION['usuario']."</center><br />";

          }
        }
        session_start();
        if(!isset($_SESSION['usuario']))
        {
          $usuario = "anon";
        }
        mostrarPreguntas($usuario);

?>



		</DIV>
    </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
