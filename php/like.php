<?php
session_start('test');
include "dblogin.php";





if($_SESSION['username'] != "")
{

$q = $_GET['q'];

$z = $_SESSION['userID'];
	
$sql=sprintf(
	"INSERT INTO `like` (user_id, id) VALUES (%d, %d)",
	$z,
	$q
	);

if (!mysql_query($sql,$dbhandle))
  {
  die('Error: ' . mysql_error());
  }
  
echo "you like this post";
  
}

else if ($_SESSION == "")
{
	echo "you need to be loged in to like a post";
}



?>