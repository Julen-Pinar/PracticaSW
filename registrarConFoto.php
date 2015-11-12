<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Registro</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_form">
		<DIV class='title'>
      <h1>Registro</h1>
    <hr>
      </DIV><center>
<?php
include("config.php");
if (empty($_REQUEST[Email]) || empty($_REQUEST[Nombre]) || empty($_REQUEST[Apellido1]) || empty($_REQUEST[Apellido2]) || empty($_REQUEST[Password]) || empty($_REQUEST[Telefono]))
{
	die('Error: Campos vacíos. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');

}

$otro= $_REQUEST['Especialidad'];

if (!filter_var($_REQUEST['Email'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Za-z]*\d{3}@ikasle.ehu.(es|eus)$/")))) {
		die('Error: Email no correcto. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if (!filter_var($_REQUEST[Nombre], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+$/")))){
		die('Error: Nombre no correcto. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if (!filter_var($_REQUEST[Apellido1], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Za-z]+$/")))){
		die('Error: Primer apellido no correcto. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if (!filter_var($_REQUEST[Apellido2], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Za-z]+$/")))){
		die('Error: Segundo apellido no correcto. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if (strlen($_REQUEST[Password]) < 6) {
			die('Error: Password requiere al menos 6 caracteres. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if ($_REQUEST[RepeatPassword] != $_REQUEST[Password]) {
			die('Error: Introduzca la contraseña correctamente en la verificación de contraseña. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

if (!filter_var($_REQUEST[Telefono], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\d{9}$/")))){
		die('Error: Telefono no correcto. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

// SWITCH para Especialidad
switch($otro) {
	case "Otros":
			$otro=$_REQUEST['otraEspecialidad'];
			if (!filter_var($otro, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Za-z]+$/")))){
					die('Error: Otra Especialidad no correcta. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
			}
			break;
	case "Ingenieria del Computadores":
	case "Computación":
	case "Ingenieria del Software":
			break;
	default:
			die('Error: Especialidad no correcta. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

//incluimos la clase nusoap.php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//creamos el objeto de tipo soapclient.
//http://www.mydomain.com/server.php se refiere a la url
//donde se encuentra el servicio SOAP que vamos a utilizar.
$comprobarSoapClient = new nusoap_client( 'http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', false);
$comprobacionCliente = $comprobarSoapClient->call('comprobar', array('x' => $_POST['Email']));

if(strcmp($comprobacionCliente, "NO") == 0) {
		die('Error: Email no matriculado. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

$validarSoapClient = new nusoap_client( 'http://localhost/PracticaSW/comprobarContrasena.php?wsdl', false);
$validacionCliente = $validarSoapClient->call('validarContrasena', array('x' => $_POST['Password']));

if(strcmp($validacionCliente, "INVALIDA") == 0)  {
		die('Error: Password no valido. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}

$file = $_FILES["foto"]["tmp_name"];
if(empty($file)) {
	$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses, foto) VALUES
	('$_REQUEST[Email]','$_REQUEST[Nombre]','$_REQUEST[Apellido1]','$_REQUEST[Apellido2]','$_REQUEST[Password]','$_REQUEST[Telefono]', '$otro' ,'$_REQUEST[Intereses]', NULL)";
} else {
	$image = addslashes(file_get_contents($file));
	$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses, foto) VALUES
	('$_REQUEST[Email]','$_REQUEST[Nombre]','$_REQUEST[Apellido1]','$_REQUEST[Apellido2]','$_REQUEST[Password]','$_REQUEST[Telefono]', '$otro' ,'$_REQUEST[Intereses]', '$image')";
}

if (!mysql_query($sql))
{

die('Error: ' . mysql_error() . '<br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}
echo "1 record added";
mysql_close();
echo "<p> <a href='verUsuariosConFoto.php'> Ver usuarios </a>";
?>

 </center></DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
