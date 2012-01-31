<?php session_start('test'); ?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			Patriciaat Forum
		</title>
	</head>

	<body>
		<div class="container">
			<div class="header">
				<a href="index.php">Het Patriciaat Forum</A>
			</div>

			<div class="menu">

				<?php include 'menu.php' ?>

			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
				<?php
					
include 'dblogin.php';

$oldpw = $_POST['oldpassword'];
$newpw = $_POST['newpassword'];
$repeatnewpw = $_POST['repeatnewpw'];
$md5pwnew = md5($newpw);
$md5oldpw = md5($oldpw);

$id = $_SESSION['userID'];

$result = mysql_query("SELECT * FROM users WHERE id = '$id'") or die(mysql_error());
$row = mysql_fetch_array($result);

$password = $row['password'];


if($md5oldpw == $password && $newpw == $repeatnewpw)
{
	mysql_query("UPDATE users SET password = '$md5pwnew' WHERE id ='$id'");
	echo "password is changed";
}

else if('$newpw' != '$repeatnewpw')
{
	echo " Password are not the same";
}

else if('$oldpw' != '$password')
{
	echo "Old password is not correct";
}


// Database connectie afsluiten.
					mysql_close($dbhandle);

				?>
			</div>
			
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>