<?xml version="1.0"?>
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
				// Database connectie en login.
				include 'dblogin.php';
				
				// Selectie van categorien.
				$cats = mysql_query("SELECT name, id FROM catagories");
				
				// Lus om catagorie en de eerste 5 posts erin weer te geven.
				while($row = mysql_fetch_array($cats))
				{
					// Verkrijg id.
					$id = $row['id'];
					
					// Verkrijg de 5 laatst geposte berichten uit de catagorie.
					$GETposts = mysql_query("SELECT * FROM topics WHERE catagorie_id = '$id' ORDER BY starttime DESC LIMIT 5");
					
					// Print de tabel met gegevens.
					echo "<div class='catPostOver'>";
					echo "<hr />";
					echo "<h1 align = 'center'>".$row['name']."</h1>";
					echo "<hr />";
					while ($posts = mysql_fetch_array($GETposts))
					{
						// Initialiseer variabele dots.
						$dots = "";
						
						// Als titel groter is dan 33 chars, dan '...' toevoegen.
						if (strlen($posts['posttitle']) > 33)
							$dots = "...";
							
						// Prompt post titel.
						echo "<div class='catPostTitle'>".substr($posts['posttitle'], 0, 31).$dots."</div>";
						
						// Vekrijg naam van poster post.
						$userPoster = $posts['user_id'];
						$user = mysql_query("SELECT username FROM users where id = '$userPoster'");
						$user = mysql_fetch_array($user);
						
						// Prompt naam van poster post.
						echo "<div class='catPostUser'>".$user['username']."</div>";
						
						// Prompt tijd dat de post gepost is.
						echo "<div class='catPostTime'>".$posts['starttime']."</div>";
						echo "<br />";
					}
					echo "</div>";
				}// Einde lus.
				
				// Database connectie afsluiten.
				mysql_close($dbhandle);
			?>
		</div>
		<div class="footer">
			&#169; 2012 Patriciaat 
		</div>
	</body>
</html>