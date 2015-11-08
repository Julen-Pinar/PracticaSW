<?php
include("config.php");
session_start();
if(isset($_GET['op'])) 
{
	$op = $_GET['op'];
	if(strcmp($op, "preguntasUsuario") == 0)
	{
		echo preguntas_usuario($_SESSION['usuario']);
	} else if(strcmp($op,"preguntasTotales")==0){
		echo preguntas_totales();
	} else if (strcmp($op,"usuariosConectados")==0){
		echo usuariosConectados();
	}
}
function preguntas_usuario($usuario){
$query = "select * from preguntas WHERE usuario='". $usuario . "'";
$preguntas = mysql_query($query);
$cont=0;
while($row = mysql_fetch_array( $preguntas )) {
	$cont++;
}
echo $cont;
}

function preguntas_totales(){
$query = "select * from preguntas";
$preguntas = mysql_query($query);
$cont=0;
while($row = mysql_fetch_array( $preguntas )) {
	$cont++;
}
echo $cont;
}

function usuariosConectados(){
$number_of_users = count(scandir(ini_get("session.save_path"))) -3;
echo $number_of_users;	
}

?>