
<DIV class="preguntas" style="text-align:left;"><br />

<?php
session_start();
$usuario = $_SESSION['usuario'];
include("configlocal.php");
$query = "select * from preguntas WHERE usuario='". $usuario . "'";
$preguntas = mysql_query($query);
while($row = mysql_fetch_array( $preguntas )) {
  // Imprimimos Tema
  echo "<div class='tema'>";
  echo $row['tema'];
  echo "</div>\n";
  // Imprimimos enunciado
  echo "<div class='enunciado'>";
  echo $row['pregunta'];
  echo "</div>\n";
  //Imprimimos complejidad
  echo "<div class='complejidadXML'>";
  echo $row['complejidad'];
  echo "</div>";
  //Barra y salto de linea
  echo "<br /><hr /><br />";
}
?>
</DIV>
