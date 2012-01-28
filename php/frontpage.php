<?php session_start('test'); ?>
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

				<?php include 'menu.php' ?>

			</div>
			
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
			
			
			
			
			
			<div class="first">
			
				<h3>
				Forum
				</h3>
			

			</div>
			
			<div class="fourth">
			<h3>
			topic
			</h3>
			</div>
			
			<div class="fifth">
			<h3>
			post
			</h3>
			</div>
			
			<div class="sixth">
			<h3>
			Last post
			</h3>
			
			</div>
			
		
					<?php 
					include 'dblogin.php';
					
					$result = mysql_query("SELECT * FROM catagories");
					
					$resultpost = mysql_query("SELECT * FROM topics WHERE catagorie_id = 2") or die (mysql_error());
					while($row = mysql_fetch_array($resultpost))
					{
						echo $row['posttitle'];
					}
					while($row = mysql_fetch_array($result))
					
					{
					echo "<div class= 'hunderd'>";
					echo $row['name'];
					echo "</div>";
					
					echo "<div class= 'seventh'>";
					//echo $row['catagorie_id'];
					echo "</div>";
					
					echo "<div class= 'eight'>";
					//echo $row['post_id'];
					echo "</div>";
					
					echo "<div class= 'ninth'>";
					//echo $row ['starttime'];
					echo "</div>";
					}
					
					
					
					
			mysql_close($dbhandle);?>
				
		
		
			
			
	
			
		

		</div>

	</body>





</html>