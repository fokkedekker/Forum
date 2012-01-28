<?php session_start('test'); ?>
<?php
include 'dblogin.php';

$delete_topic = strip_tags($_GET['id']);
mysql_query("DELETE FROM topics WHERE id ='$delete_topic'") or die (mysql_error());

?>