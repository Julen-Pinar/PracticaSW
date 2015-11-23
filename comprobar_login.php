<?php
  include("config.php");
  $usuario = $_POST['Email'];
  $password = $_POST['Password'];

  $sql = "SELECT email,password,profesor,intentos FROM usuario WHERE email='$usuario'";
  $answer = mysql_query($sql);

  if(($row = mysql_fetch_array($answer)) != false) {
    $intentos = $row['intentos'];
    if($intentos > 3) {
      header("Location: login.php?error=Agotados inicios de sesion con este usuario");
    } else {
        if(strcmp($row['password'],sha1($password)) == 0) {
          session_start();
          $_SESSION['usuario'] = $usuario;
    	    $_SESSION['profesor'] = $row['profesor'];
          mysql_query("UPDATE usuario SET intentos=0 WHERE email='$usuario'");
          header("Location: gestionPreguntas.php");
        } else {
                mysql_query("UPDATE usuario SET intentos=($row[intentos]+1) WHERE email='$usuario'");
                header("Location: login.php?error=No se puede loguear con este usuario y contraseña");
        }
      }
    } else {
        header("Location: login.php?error=No se puede loguear con este usuario y contraseña");
      }

?>
