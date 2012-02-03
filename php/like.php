<?php
/*Deze file wordt geactiveerd als er in het forum op like gedrukt wordt. Hier wordt de post id gekoppeld 
aan de user id. 
Samen worden ze in de database gezet. Voordat dat gebeurt wordt er eerst gekeken of de combinatie van de post_id en 
de user_id niet al voor komen in de database. Op die manier kan 1 user nooit twee keer de zelfde post liken.e*/
	session_start('test');

	include "dblogin.php";

	$userid = $_SESSION['userID'];

	$result = mysql_query("SELECT * FROM `like` WHERE user_id = '$userid'");

	$q = mysql_real_escape_string($_GET['q']);

	$exists = 0;
	while($row = mysql_fetch_array($result))
	{
		echo $row['user_id']."a".$row['id'];
		if ($userid == $row['user_id'] && $row['id'] == $q)
			$exists = 1;
	}

	if(array_key_exists('username',$_SESSION) && $exists == 0)
	{
		$z = $_SESSION['userID'];
		$sql=sprintf(
			"INSERT INTO `like` (user_id, id) VALUES (%d, %d)",
			$z,
			$q);

		if (!mysql_query($sql,$dbhandle))
		{
			die("Oops something went wrong you can try again in a few minutes.");
		}
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