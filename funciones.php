<?php
include("config.php");
session_start();
if(isset($_GET['op'])) 
{
	$op = $_GET['op'];
	if(strcmp($op, "preguntasUsuario") == 0)
	{
		echo preguntas_usuario($_SESSION['usuario']);
	} else {
		echo preguntas_totales();
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


?>