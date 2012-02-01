<?php session_start('test'); ?>
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

				<?php include 'menu.php' ?>

			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
				<?php
					// Database connectie aanmaken.
					include 'dblogin.php';
					
					// Alle FAQ dingen uit de faq tabel halen.
					$result = mysql_query("SELECT * FROM faq") or die(mysql_error());  
					
					// Resultaat weergeven.
					while($row = mysql_fetch_array($result))
					{
						echo "<div class='faq'>";
						echo "Question: ".$row['question'];
						echo "<br /><hr />Anwser: ".$row['awnser'];
						echo "</div>";
					}
					
					// Database connectie afsluiten.
					mysql_close($dbhandle);
				?>
			</div>
			
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>