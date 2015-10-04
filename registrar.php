<?php
include("config.php");

$otro= $_POST['Especialidad'];


if (strcmp ($otro, "Otros")==0)
{
	$otro=$_POST['otraEspecialidad'];
}

$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses) VALUES
('$_POST[Email]','$_POST[Nombre]','$_POST[Apellido1]','$_POST[Apellido2]','$_POST[Password]','$_POST[Telefono]', '$otro' ,'$_POST[Intereses]')";
if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
echo "1 record added";
mysql_close();
echo "<p> <a href='verUsuarios.php'> Ver usuarios </a>";
?>
