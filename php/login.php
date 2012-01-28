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
				<?php include 'menu.php' ?>
			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
				<div class="login">
					<form action="checklogin.php" method="POST">
						Username: <input type="text" name="name" />
						<br />
						Password: <input type="password" name="pass" />
						<br />
						<input type="submit" value="Submit"/>
						<br />
						<a href="register.php">Registreer</a>
					</form>
				</div>
			</div>
			
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>