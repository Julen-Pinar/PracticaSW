<?php
$token = bin2hex(openssl_random_pseudo_bytes(16));
echo "La password solo se puede cambiar usando este token: ".$token;

echo "<br /><center><span style='color:red'>Aun sin terminar</span>";
?>
