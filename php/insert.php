<?php session_start('test'); ?>
<?php include "dblogin.php"; ?>
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
					

$str1 =strip_tags($_POST["email"]);
$str2 =strip_tags($_POST["repeatemail"]);
$day =strip_tags($_POST["day"]);
$month =strip_tags($_POST["month"]);
$year =strip_tags($_POST["year"]);
$date =($day.$month.$year); 
$username = strip_tags($_POST["username"]);
$firstname = strip_tags($_POST["firstname"]);
$lastname = strip_tags($_POST["lastname"]);
$browser = strip_tags($_POST["browser"]);
$personal = strip_tags($_POST["overjouw"]);
$sex = strip_tags($_POST["sex"]);





$random = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',10)),10,10);

$userpass = md5($random);

if($str1 == $str2)
{

$sql="INSERT INTO users (first_name, last_name, email, favo_browser, personal_info, date_of_birth, username, sex, password)
VALUES
('$firstname', '$lastname' ,'$str1' ,'$browser' ,'$personal','$date','$username','$sex','$userpass')";


$to = "$str1";
$subject = "Your password";
$message = "This is your password $random";
$from = "fokke.dekker@me.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";


if (!mysql_query($sql,$dbhandle))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

}


else if($str1 != $str2)
{
	echo "emails zijn niet gelijk";
	
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