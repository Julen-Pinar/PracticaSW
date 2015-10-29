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
				<table border="solid">
					<tr>
						<th>Tema</th>
						<th>Pregunta</th>
						<th>Complejidad</th>
					</tr>

	  <?php
      $xml = simplexml_load_file("preguntas.xml");
      foreach ($xml->xpath('//assessmentItems/assessmentItem') as $pregunta) {
				echo "<tr>";
        // Imprimimos Tema
        echo "<td>";
        echo $pregunta['subject'];
        echo "</td>\n";
        // Imprimimos enunciado
        echo "<td>";
        echo $pregunta->itemBody->p;
        echo "</td>\n";
        //Imprimimos complejidad
        echo "<td>";
        echo $pregunta['complexity'];
        echo "</td>";
				echo "</tr>";
      }
	   ?>
	 </table><br />
     </DIV>
 </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
