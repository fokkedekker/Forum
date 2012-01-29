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
					include 'dblogin.php';
					
					$getPostID = $_GET['topicid'];
					$getCat = $_GET['cat'];
					$result = mysql_query("SELECT * FROM topics WHERE approved = '1' and post_id = '$getPostID' ORDER BY starttime ASC") or die(mysql_error());  
					
					while($row = mysql_fetch_array($result))
					{
						echo "<div class='post'>";
						echo "Title: ".$row['posttitle'];
						echo "<br />UserID: ".$row['user_id'];
						echo "<br />PostID: ".$row['post_id'];
						echo "<br />Time: ".$row['starttime'];
						echo "<div class=button>
							  <form action='maketopic.php?id=".$getPostID."&topic=f&cat=".$getCat."' method='POST'>
							  <input type='submit' value='reply'/>
							  </form>
							  </div>";
						echo "<br /><hr />".$row['postcontent'];
						echo "</div>";
					}
					mysql_close($dbhandle);
				?>
			</div>	
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>