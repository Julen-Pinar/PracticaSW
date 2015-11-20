<?php
include("configlocal.php");
  $id = $_GET['id'];
  mysql_query("DELETE FROM preguntas WHERE id_pregunta=" . $id);
?>
