<?php
  include("config.php");
  $usuario = $_POST['Email'];
  $password = $_POST['Password'];

  $sql = "SELECT email,password FROM usuario WHERE email='$usuario'";
  $answer = mysql_query($sql);

  if(($row = mysql_fetch_array($answer)) != false) {
    if(strcmp($row['password'],$password) == 0) {
      session_start();
      $_SESSION['usuario'] = $usuario;
      header("Location: insertarPregunta.php");
      print_r($_SESSION);
    } else {
          header("Location: login.php?error=No se puede loguear con este usuario y contraseña");
    }
  } else {
    header("Location: login.php?error=No se puede loguear con este usuario y contraseña");
  }
?>