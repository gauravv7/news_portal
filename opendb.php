<?php
/*$localhost="localhost";
$user="root";
$pwd="";
$database="metal_admin";

	mysql_connect($localhost,"$user","$pwd") or die(mysql_error());
	mysql_select_db($database) or die(mysql_error());*/
	$localhost="localhost";
	$user="root";
	$pwd="gaurav_sql";
	$database="indiaping_blkwallet";

	$con = mysql_connect("$localhost","$user","$pwd") or die(mysql_error());
	mysql_select_db($database, $con) or die(mysql_error());
?>
