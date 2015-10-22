<?php
  error_reporting(0);

   $DOMAIN = "localhost";
   $USERNAME = "root";
   $PASSWORD = "";
   $DB = "quiz";
   mysql_connect($DOMAIN, $USERNAME, $PASSWORD) or die(mysql_error());
   mysql_select_db($DB) or die(mysql_error());

?>
