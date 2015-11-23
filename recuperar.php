<?php
include("config.php");
$email = $_REQUEST['Email'];
$token = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "UPDATE usuario SET token = '$token' WHERE email='$email'";
mysql_query($sql);
echo "<br /><center><p>Para restablecer tu contraseña haga click <a href='changePassword.php?email=" . $email . "&token=" . $token . "'>aquí</a></p>";
?>
