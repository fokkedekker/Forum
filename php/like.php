<?php
session_start('test');
include "dblogin.php";


$userid = $_SESSION['userID'];


$result = mysql_query("SELECT * FROM `like` WHERE user_id = '$userid'");
$row = mysql_fetch_array($result);
$derp = $row['like_id'];
$q = mysql_real_escape_string($_GET['q']);

$exists = 0;
while($row = mysql_fetch_array($result))
{
	if ($userid == $row['user_id'] && $row['id'] == $q)
		$exists = 1;
}

if(array_key_exists('username',$_SESSION) && $exist == 0)
{

$z = $_SESSION['userID'];
	
$sql=sprintf(
	"INSERT INTO `like` (user_id, id) VALUES (%d, %d)",
	$z,
	$q
	);

if (!mysql_query($sql,$dbhandle))
  {
  die("Oops something went wrong you can try again in a few minutes.");
  }
  
echo "you like this post";
  
}

else if (!array_key_exists('username',$_SESSION))
{
	echo "You need to be loged in to like a post.";
}

else if($exists == 1)
{
	echo "You already";
}



?>