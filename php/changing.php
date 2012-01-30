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
				<A HREF="index.php">Het Patriciaat Forum</A>
			</div>

			<div class="menu">
				<?php include 'menu.php';?>
			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
			
			<?php
			if (!empty($_SESSION['username']))
			{
				echo "
				<form action='changepw.php' method='POST'>
				Old password: <input type= 'password' name='oldpassword'><p>
				New password: <input type='password' name='newpassword'><br>
				Repeat new password: <input type='password' name='reapeatnewpassword'><p>
				<input type='submit' name='submit' value='change password'>
				</form>";
				
			}
			else
			{	
				die("You must be logged in to change your password!");
			}
				
				?>
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>