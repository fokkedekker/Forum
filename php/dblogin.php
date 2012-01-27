<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';

	$dbhandle = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());  

	$dbname = 'webdb1236';
	mysql_select_db($dbname) or die(mysql_error());
?>