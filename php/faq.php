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
				<!-- De login moet nog even aangepast worden. -->
				<?php
					include 'dblogin.php';
					
					$result = mysql_query("SELECT * FROM faq") or die(mysql_error());  
					
					while($row = mysql_fetch_array($result))
					{
						echo "<div class='faq'>";
						echo "Question: ".$row['question'];
						echo "<br /><hr />Awnser: ".$row['awnser'];
						echo "</div>";
					}
					mysql_close($dbhandle)?>
			
				
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>