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
				<a href="index.php">Het Patriciaat Forum</a>
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
				
				// Categorie ophalen.
				$categorie = strip_tags($_GET["cat"]);
				
				// Pagina ophalen.
				//$page = strip_tags($_GET["page"]);
				
				//TODO dit fixen vvvvvvv
				// Als categorie niet goed gespecificeert is (e.g. moet een getal zijn unsigned), dan 1 laten zien.
				
				//$categorie = mysql_query("SELECT id FROM catagories LIMIT 1");
			//	$categorie = mysql_fetch_array($categorie);
				//$categorie = $categorie['id'];
				//echo $categorie;
				
				// Verkrijg de laatst geposte berichten uit de catagorie.
				$GETposts = mysql_query("SELECT * FROM topics WHERE catagorie_id = '$categorie' and approved = '1' AND start = '1' ORDER BY starttime DESC");
				
				// Verkrijg catagorie naam.
				$cats = mysql_query("SELECT name FROM catagories where id = '$categorie'");
				$row = mysql_fetch_array($cats);
				
				// Print de tabel met gegevens.
				echo "<div class='catPostOver'>";
				echo "<form action='maketopic.php?cat=".$categorie."&topic=y' method='POST'>";
				echo "<input type='submit' value='Make topic'/>";
				echo "</form>";
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
						
					// Prompt post titel met link naar draad.
					echo "<div class='catPostTitle'> <a href='draadje.php?topicid=".$posts['post_id']."&cat=".$categorie."'>".substr($posts['posttitle'], 0, 31).$dots."</a></div>";
					
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
				
				// Database connectie afsluiten.
				mysql_close($dbhandle);
			?>
		</div>
		<div class="footer">
			&#169; 2012 Patriciaat 
		</div>
	</body>
</html>