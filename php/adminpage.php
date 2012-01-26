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

	$result = mysql_query("SELECT * FROM topics") or die (mysql_error());
		
	while($row = mysql_fetch_array($result))
	{
	echo "<div class='topic_id'>";
	echo $row['id'];
	echo "</div>";
	
	echo "<div class='topic_title'>";
	echo $row['posttitle'];
	echo "</div>";
	
	echo "<div class='topic_starttime'>";
	echo $row['starttime'];
	echo "</div>";
	
	echo "<div class='topic_action'>";
	echo "<form action='approve.php?id=".$row['id']."'>";
	echo "<input type='submit' value='Y'/>";
	echo "</form>";
	echo "<form action='delete.php?id=".$row['id']."'>";
	echo "<input type='submit' value='X'/>";
	echo "</form>";

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