<?php session_start('test'); 
/* posten van een reactie */
?>
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
					// Laadt database login.
					include 'dblogin.php';
					// TODO iets doen zodat als pagina geladen zonder de maketopic.php
					// en dan hij dan niets in de db zet.
					
					$postTitle = "";
					$postContent = "";
					// Variabelen uit maketopic.php form.
					// Stript van tags met behulp van strip_tags() en mysql_real_escape_string().
					if (array_key_exists('topicname',$_POST))
						$postTitle = mysql_real_escape_string(strip_tags($_POST["topicname"]));
					if (array_key_exists('content',$_POST))
						$postContent = mysql_real_escape_string(strip_tags($_POST["content"]));
					
					if($postTitle != "" && $postContent !="" && array_key_exists('admin',$_SESSION))
					{
						// Haal gebruikersnaam uit sessie.
						$username = mysql_real_escape_string($_SESSION['username']);
						
						// Haal user ID uit sessie.
						$userID = mysql_real_escape_string($_SESSION['userID']);
						
						// Verkrijgt catagorie_id.
						$catagory = mysql_real_escape_string($_GET['cat']);
						
						// Laadt catagorie approval.
						$approval = mysql_query("SELECT approval FROM catagories where id = '$catagory'") or die (mysql_error());
						$approval = mysql_fetch_array($approval);
						
						// Prompt gebruiker.
						echo "Thank you for your submission. <br />";
											
						// Checkt of er een nieuw draad aangemaakt wordt of het een reply is.
						$checkThread = mysql_real_escape_string(strip_tags($_GET["topic"]));
						
						if ($checkThread === "y")
						{
							// Berekent nieuwe post id op basis van max in tabel.
							$getPost_id = mysql_query("SELECT MAX(post_id) as post_id FROM topics") or die (mysql_error());
							$row = mysql_fetch_array($getPost_id);
							$newPost_id = $row['post_id'] + 1;
							$start = 1;
						} 
						else
						{
							// Set post_id naar die van uit de GET van de url.
							$newPost_id = strip_tags($_GET["id"]);
							$start = 0;
						}
						
						// Prompt approval.
						if ($approval['approval'] == 0)
							echo "Your post is pending approval.<br />";
						else
						{
							echo "Your post has been approved.<br />";
							echo "Click <a href= draadje.php?topicid=".$newPost_id."&cat=".$catagory."> here </a> to visit your submission.";
						}
						$approval = $approval['approval'];
						// Prompt gebruiker.
						echo "<hr />";
						
						// Pompt titel van post.
						echo "<br />Title: ".$postTitle."<br />";
						
						//Prompt catagorie naam.
						$catagoryName = mysql_query("SELECT name FROM catagories WHERE id = '$catagory'") or die (mysql_error());
						$catagoryName = mysql_fetch_array($catagoryName);
						$catagoryName = $catagoryName['name'];
						echo "Catagory: ".$catagoryName."<br />";
						
						// Prompt username.
						echo "Username: <a href=personal.php?id=".$userID.">".$username."</a><br />";
						
						// Prompt postID.
						echo "PostID: ".$newPost_id."<br />";
						
						// Prompt content
						echo "<br />Content: ".$postContent."<br />";
						
						// Mysql query.
						mysql_query("INSERT INTO `webdb1236`.`topics`
						(approved, 
						posttitle, 
						postcontent, 
						post_id, 
						catagorie_id, 
						user_id, 
						starttime,
						start)
						VALUES ('$approval', 
						'$postTitle', 
						'$postContent', 
						'$newPost_id', 
						'$catagory', 
						'$userID', 
						CURRENT_TIMESTAMP,
						'$start')") or die (mysql_error());
					}
					else
					{
						echo "An error has occured, cannot post, please try again!";
					}
					
					// Connectie met database afsluiten.
					mysql_close($dbhandle);
				?>			
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>