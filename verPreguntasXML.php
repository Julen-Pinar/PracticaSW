<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Visor preguntas.xml</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>

	<DIV class="container_form">
		<DIV class='title'>
      <h2>Visor preguntas.xml</h2>
    <hr>
      </DIV>
      <DIV class="preguntas"><br />

	  <?php
		if(isset($_POST['user'])) {
			
		}
      $xml = simplexml_load_file("preguntas.xml");
      foreach ($xml->xpath('//assessmentItems/assessmentItem') as $pregunta) {
        // Imprimimos Tema
        echo "<div class='tema'>";
        echo $pregunta['subject'];
        echo "</div>\n";
        // Imprimimos enunciado
        echo "<div class='enunciado'>";
        echo $pregunta->itemBody->p;
        echo "</div>\n";
        //Imprimimos complejidad
        echo "<div class='complejidadXML'>";
        echo $pregunta['complexity'];
        echo "</div>";
        //Barra y salto de linea
        echo "<br /><hr /><br />";
      }
	   ?>
     </DIV>
 </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
