<?php
include("config.php");
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
      $usuarios = mysql_query("select * from usuario ORDER BY user_id ASC");
        while($row = mysql_fetch_array( $usuarios )) {
					echo "<div class='usuario'>";

					$foto = $row['foto'];
					if ($foto == NULL) {
						$image = 'img/default_profile.gif';
					} else {
						$image = base64_encode($foto);
						$image = 'data:image/png;base64,' . $image;
					}
					echo "<div id='foto'><img src='$image' width=100></div>";
					// Si interes vacio no lo muestra
					$intereses = $row['intereses'];
					$interesesText = "";
					if(!empty(trim($intereses))) {
						$interesesText .= "<br><b>Intereses:</b><br>".$intereses;
					}
          echo "<div id='datos'>".$row['email']."<br>".$row['nombre']." ".$row['primerapellido']." ".$row['segundoapellido']."<br>".$row['especialidad'].$interesesText."</div><br>";
					echo "</div><br>";
        }
      ?>

    </DIV>
    </DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
