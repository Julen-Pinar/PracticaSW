<DIV class="formulario_login">
<form method="post" action="cambiar.php" >
<p>  Password: <input name="Password" id="Password" type="password"></p>
<p>  Repeat Password: <input name="RepeatPassword" id="RepeatPassword" type="password"></p>
<input type="hidden" id="email" name="email" value="<?php echo $_REQUEST['email']; ?>">
<input type="hidden" id="token" name="token" value="<?php echo $_REQUEST['token']; ?>">
<input type=submit value="Cambiar Password"><br />
</form>
</DIV>
