<?php
  $DOMAIN = "mysql.hostinger.es";
  $USERNAME = "u243202774_sw";
  $PASSWORD = "sistemasweb";
  $DB = "u243202774_quiz";
  mysql_connect($DOMAIN, $USERNAME, $PASSWORD) or die(mysql_error());
  mysql_select_db($DB) or die(mysql_error());
?>