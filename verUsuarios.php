<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Usuarios</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_form">
		<DIV class='title'>
      <h1>Usuarios</h1>
    <hr>
      </DIV>
    <DIV class="usuarios">
      <?php
      $usuarios = mysql_query("select * from usuario");
        while($row = mysql_fetch_array( $usuarios )) {
					echo "<div class='usuario'>";
					echo "<div id='foto'><img src='img/default_profile.gif' width=100></div>";
          echo "<div id='datos'>".$row['email']."<br>".$row['nombre']." ".$row['primerapellido']." ".$row['segundoapellido']."<br>".$row['especialidad']."<br><b>Intereses:</b><br>".$row['intereses']."</div><br>";
					echo "</div><br>";
        }
      ?>

    </DIV>
    </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
