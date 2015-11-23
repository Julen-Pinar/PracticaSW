<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Cambiar password</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_cambiar">
		<DIV class='title'>
      <h2>Cambiar Password</h2>
    <hr>
  </DIV>
    <?php
		if(isset($_GET['error'])) {
			echo "<span class='error_login'>" . $_GET['error'] . "</span>";
		}
    $method = $_SERVER['REQUEST_METHOD'];
     switch ($method) {
       case 'GET':
         include('formulario_cambiar.php');
         break;

       case 'POST':
         include('cambiar.php');
         break;
     }

     ?>
    </DIV>
    <p><center><a href="recuperar_password.php">Recuperar Contraseña</a> <a href="layout.html">Atrás</a> </center></p>
</BODY>
</HTML>
