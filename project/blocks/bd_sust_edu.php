<?php  
$db=mysql_connect("localhost", "sustdeve_223387","223387");
mysql_select_db("sustdeve_223387",$db);
mysql_query("SET NAMES 'utf8'",$db);
include ("blocks/tracker.php");
?>