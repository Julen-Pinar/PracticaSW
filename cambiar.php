<?php
include("config.php");
$email = $_REQUEST['email'];
$token = $_REQUEST['token'];
$password = $_REQUEST['Password'];
$passwordRepeat = $_REQUEST['RepeatPassword'];
if(strcmp($password,$passwordRepeat) != 0) {
    header("Location: changePassword.php?error=Las contraseñas no coinciden&email=".$email."&token=".$token);
} else {
  $password = sha1($password);
  $sql = "SELECT email,token FROM usuario WHERE email='$email'";
  $answer = mysql_query($sql);
    if(($row = mysql_fetch_array($answer)) != false) {
      if(strcmp($row['token'], $token) == 0) {
        $sql = "UPDATE usuario SET password='$password' WHERE email='$email'";
        mysql_query($sql);
        echo "<center><p>Todo correcto</p>";
        echo "<a href='layout.html'>Atrás</a> </center></p>";
      } else {
          header("Location: changePassword.php?error=Token incorrecto&email=".$email."&token=".$token);
      }
    } else {

    }
}
?>
