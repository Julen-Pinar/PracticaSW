<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Logout</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container" style="text-align:center;">
<img src="img/loading.gif">
<h3>Desconectando...</h3>
<?php
  header('Refresh: 2; url=layout.html');
?>
</BODY>
</HTML>
