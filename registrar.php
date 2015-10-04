<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());
$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses) VALUES
('$_POST[Email]','$_POST[Nombre]','$_POST[Apellido1]','$_POST[Apellido2]','$_POST[Password]','$_POST[Telefono]','$_POST[Especialidad]','$_POST[Intereses]')";
if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
echo "1 record added";
mysql_close();
echo "<p> <a href='verUsuarios.php'> Ver usuarios </a>";
?>
