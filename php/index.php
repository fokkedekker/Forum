<?php session_start('test'); ?>

<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			Gitmasters
		</title>
	</head>
	<body>
		<div class="container">

			<div class="header">
				<?php include 'header.php'; ?>
			</div>

			<div class="menu">
				<?php include 'menu.php' ?>
			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php' ?>
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
						$GETposts = mysql_query("SELECT * FROM topics WHERE catagorie_id = '$id' and approved = '1' AND start = '1' ORDER BY starttime DESC LIMIT 5");

						// Print de tabel met gegevens.
						echo "<div class='catPostOver'>";
						echo "<hr />";
						echo "<h1 align = 'center'><a href='category.php?cat=".$row['id']."'>".$row['name']."</h1>";
						echo "<hr />";
						while ($posts = mysql_fetch_array($GETposts))
						{
							// Initialiseer variabele dots.
							$dots = "";

							// Als titel groter is dan 33 chars, dan '...' toevoegen.
							if (strlen($posts['posttitle']) > 33)
								$dots = "...";

							// Prompt post titel.
							echo "<div class='catPostTitle'><a href='draadje.php?topicid=".$posts['post_id']."&cat=".$row['id']."'>".substr($posts['posttitle'], 0, 31).$dots."</a></div>";

							// Vekrijg naam van poster post.
							$userPoster = $posts['user_id'];
							$user = mysql_query("SELECT username FROM users where id = '$userPoster'");
							$user = mysql_fetch_array($user);

							// Prompt naam van poster post.
							echo "<div class='catPostUser'><a href=personal.php?id=".$userPoster.">".$user['username']."</a></div>";

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
		</div>
	</body>
</html>