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

				<?php include 'menu.php' ?>

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
					include 'dblogin.php';
					
					//TODO juiste draad weergeven
					$getPostID = $_GET['topicid'];
					
					$result = mysql_query("SELECT * FROM topics WHERE approved = '0' and post_id = '$getPostID'") or die(mysql_error());  
					
					while($row = mysql_fetch_array($result))
					{
						echo "<div class='post'>";
						echo "Title: ".$row['posttitle'];
						echo "<br />UserID: ".$row['user_id'];
						echo "<br />PostID: ".$row['post_id'];
						echo "<br />Time: ".$row['starttime'];
						echo "<div class=button>
							  <button type='button'>Reply</button>
							  </div>";
						echo "<br /><hr />".$row['postcontent'];
						echo "</div>";
					}
					mysql_close($dbhandle);
				?>
				</div>	
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>