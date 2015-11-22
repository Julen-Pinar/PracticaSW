<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Login</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_login">
		<DIV class='title'>
      <h1>Recuperar Password</h1>
    <hr>
  </DIV>
    <?php
	session_start();
		if (isset($_SESSION['usuario'])) {
			header("Location: gestionPreguntas.php");
		}
		if(isset($_GET['error'])) {
			echo "<span class='error_login'>" . $_GET['error'] . "</span>";
		}
    $method = $_SERVER['REQUEST_METHOD'];
     switch ($method) {
       case 'GET':
         include('formulario_recuperar.php');
         break;

       case 'POST':
         include('recuperar.php');
         break;
     }

     ?>
    </DIV>
    <p><center><a href="recuperar_password.html">Recuperar Contraseña</a> <a href="layout.html">Atrás</a> </center></p>
</BODY>
</HTML>
