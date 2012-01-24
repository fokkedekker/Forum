
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
			<A HREF="home.html">Het Patriciaat Forum</A>
			</div>

			<div class="menu">

				<div class="menuknop">
				<A HREF="home.html">Home</A>
				</div>

				<div class="menuknop">
				<A HREF="login.html">Login</A>
				</div>

				<div class="menuknop">
				<A HREF="register.html">Register</A>
				</div>

				<div class="menuknop">
				<A HREF="personal.html">Personal</A>
				</div>

				<div class="menuknop">
				<A HREF="admin.html">Admin</A>
				</div>

				<div class="menuknop">
				<A HREF="faq.html">FAQ</A>
				</div>

			</div>
			
			
			<div class="slidemenu">

				 <div class="forum">
				 	Forum
				 </div>
				 <div class="categorie">
				 	<br />
				 	 &#8627; Categorie
				 </div>
				 <div class="thread">
				 	 &#8627; Thread
				 </div>
				 <div class="reactie">
				 	 &#8627; Reactie
				 </div>
			</div>
			
			<div class="center">
				<?php 
					// Connectie maken met database, geladen vanuit dblogin.php.
					include 'dblogin.php';
					
					// Variabelen uit login.php form verkrijgen.
					// Stript van tags met behulp van strip_tags();
					$GETusername = strip_tags($_POST["name"]);
					$GETpassword = strip_tags($_POST["pass"]);
					
					// Kijken of de combinatie van username en password in de database te vinden is
					$login = mysql_query("SELECT username, id FROM users WHERE username = '$GETusername' and password = '$GETpassword'") or die (mysql_error());
					$login = mysql_fetch_array($login);
					
					// TODO iets doen als login mislukt
					
					// Start sessie.
					session_start();
					
					// Geef waarde aan variabele 'username' is sessie.
					$_SESSION['username'] = $GETusername;
					// Geef waarde aan variabele 'userID' is sessie.
					$_SESSION['userID'] = $login['id'];
					
					//Prompt gebruiker met login bericht.
					echo "Thank you ".$_SESSION['username']." for logging in!";
					
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