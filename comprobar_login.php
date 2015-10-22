<?php
  include("config.php");
  $usuario = $_POST['Email'];
  $password = $_POST['Password'];

  $sql = "SELECT email,password FROM usuario WHERE email='$usuario'";
?>
