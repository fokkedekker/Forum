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
				Thank you for your submission, you have posted:
				<br />
				<hr />
				<?php 
					//TODO login aanpassen voor server, staat nu op local host.
					$dbhost = 'localhost';
					$dbuser = 'root';
					$dbpass = '';

					$dbhandle = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

					$dbname = 'webdb1236';
					mysql_select_db($dbname);
					
					//Variabelen uit maketopic.php form.
					$postTitle = $_POST["topicname"];
					$postContent = $_POST["content"];
					
					// Pompt titel van post.
					echo "<br />Title: ".$postTitle."<br />";
					
					// Berekent nieuwe post id op basis van max in tabel.
					$getPost_id = mysql_query("SELECT MAX(post_id) as post_id FROM topics") or die (mysql_error());
					$row = mysql_fetch_array($getPost_id);
					$newPost_id = $row['post_id'] + 1;
					//Prompt postID.
					echo "PostID: ".$newPost_id."<br />";
					
					//Prompt content
					echo "<br />Content: ".$postContent."<br />";
					
					//TODO: catagorie_id ophalen en posten
					//TODO: user_id ophalen en posten
					//TODO: iets tegen sql injecties
					
					mysql_query("INSERT INTO `webdb1236`.`topics`
					(posttitle, postcontent, post_id, catagorie_id, user_id, starttime)
					VALUES ('$postTitle', '$postContent', '$newPost_id', '1', '1', CURRENT_TIMESTAMP)") or die (mysql_error());
					
					mysql_close($dbhandle);
				?>			
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>
</html>