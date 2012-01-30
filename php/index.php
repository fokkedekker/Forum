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
					
					// Selectie van categorien.
					$cats = mysql_query("SELECT name, id FROM catagories");
					
					// Verzameling van waar al gepost is.
					//$moeilijk[] = array()
					
					// Lus om catagorie en de eerste 5 posts erin weer te geven.
					while($row = mysql_fetch_array($cats))
					{
						// Verkrijg id.
						$id = $row['id'];
						
						// Hooste post_id verkijgen.
						$maxPost = mysql_query("SELECT MAX(post_id) as maxnum FROM topics WHERE catagorie_id = '$id' and approved = '1'");
						$maxPos = mysql_fetch_array($maxPost);

						echo "ppp".$maxPos['maxnum']."-";
						
						// Verkrijg de laatst geposte berichten uit de catagorie.
						$GETposts = mysql_query("SELECT * FROM topics WHERE catagorie_id = '$id' and approved = '1' ORDER BY starttime DESC");
						
						// Print de tabel met gegevens.
						echo "<div class='catPostOver'>";
						echo "<hr />";
						echo "<h1 align = 'center'><a href='category.php?cat=".$row['id']."'>".$row['name']."</h1>";
						echo "<hr />";
						while ($posts = mysql_fetch_array($GETposts))
						{
							// Post id ophalen.
							$idp = $posts['post_id'];
							
							// Topic selecteren.
							$firstPost = mysql_query("SELECT * FROM topics WHERE catagorie_id = '$id' and approved = '1' and post_id = '$idp' ORDER BY starttime ASC");
							$firstPost = mysql_fetch_array($firstPost);
							
							// Initialiseer variabele dots.
							$dots = "";
							
							// Als titel groter is dan 33 chars, dan '...' toevoegen.
							if (strlen($firstPost['posttitle']) > 33)
								$dots = "...";
								
							// Prompt post titel.
							echo "<div class='catPostTitle'><a href='draadje.php?topicid=".$firstPost['post_id']."&cat=".$row['id']."'>".substr($firstPost['posttitle'], 0, 31).$dots."</a></div>";
							
							// Vekrijg naam van poster post.
							$userPoster = $firstPost['user_id'];
							$user = mysql_query("SELECT username FROM users where id = '$userPoster'");
							$user = mysql_fetch_array($user);
							
							// Prompt naam van poster post.
							echo "<div class='catPostUser'><a href=personal.php?id=".$userPoster.">".$user['username']."</a></div>";
							
							// Prompt tijd dat de post gepost is.
							echo "<div class='catPostTime'>".$firstPost['starttime']."</div>";
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