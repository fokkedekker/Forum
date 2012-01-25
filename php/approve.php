<?php
include 'dblogin.php';

$approve_topic = strip_tags($_GET['id']);
mysql_query("UPDATE topics SET approved='1' WHERE id='$approve_topic'") or die (mysql_error());

?>