<?php session_start('test'); ?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			<?php include 'forumname.php'; ?>
		</title>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<?php include 'header.php'; ?>
			</div>
			<div class="menu">
				<?php include 'menu.php'; ?>
			</div>
			<div class="slidemenu">
				<?php include 'slidemenu.php'; ?>
			</div>
			<div class="center">
				<?php 
					// Connectie maken met database, geladen vanuit dblogin.php.
					include 'dblogin.php';
					
					// Variabelen uit login.php form verkrijgen.
					// Stript van tags met behulp van strip_tags() en mysql_real_escape_string
					$GETusername = mysql_real_escape_string(strip_tags($_POST["name"]));
					$GETpassword = md5(mysql_real_escape_string(strip_tags($_POST["pass"])));
					
					// Kijken of de combinatie van username en password in de database te vinden is
					$login = mysql_query("SELECT username, id, admin FROM users WHERE username = '$GETusername' and password = '$GETpassword'") or die (mysql_error());
					
					// Als login geluk is, variabelen in sessie opslaan.
					if(	$login = mysql_fetch_array($login))
					{
						// Geef waarde aan variabele 'username' is sessie.
						$_SESSION['username'] = $GETusername;
						// Geef waarde aan variabele 'userID' is sessie.
						$_SESSION['userID'] = $login['id'];
						// Geef waarde aan variabele 'loggedIn' in sessie.
						$_SESSION['loggedIn'] = 1;
						// Geef waarde aan variabele 'rights' in sessie.
						$_SESSION['admin'] = $login['admin'];
						
						//Prompt gebruiker met login bericht.
						echo "Thank you ".$_SESSION['username']." for logging in!";
					}
					else
					{
						// Prompt gebruiker.
						echo "Fout u bent niet ingelogd";
					}
					// Database connectie afsluiten.
					mysql_close($dbhandle);
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>