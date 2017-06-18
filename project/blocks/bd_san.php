<?php  
$db=mysql_connect("localhost", "223387","731207");
mysql_select_db("223387",$db);
mysql_query("SET NAMES 'utf8'",$db);
include ("blocks/tracker.php");
?>