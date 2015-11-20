<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
  }
    if($_SESSION['profesor'] == 0)  {
    header("Location: gestionPreguntas.php");
  }
include("config.php");
  $id = $_GET['id'];
  mysql_query("DELETE FROM preguntas WHERE id_pregunta=" . $id);
?>
