<?php
include("configlocal.php");
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
		<DIV class='title'>
      <h1>Preguntas</h1>
    <hr>
      </DIV>
			<DIV class="preguntas">
      <?php

        function mostrarPreguntas($user) {
          $preguntas = mysql_query("SELECT * FROM preguntas");
          switch($user)
          {
            case "anon":
              while($row = mysql_fetch_array($preguntas))
              {
                echo "<div class='pregunta'>". $row['pregunta'] ."</div><div class='complejidad'>".$row['complejidad']."</DIV><br /><br /><br /><hr>";
              }
              break;
            default:

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
