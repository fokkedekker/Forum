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
				<a href="index.php">Het Patriciaat Forum</A>
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
					
					echo "<br />";
					
					// Als er een admin is ingelogd, submit formulier laten zien.
					if (!empty($_SESSION['admin']) && $_SESSION['admin'] == 1)
					{
						echo "<div class='faq'>";
						echo "<h1> New FAQ </h1>";
						echo "Question: <br />";
						echo "<form action='addfaq.php' method='POST'>";
						echo "<input type='text' size='40' name='question'/>";
						echo "<hr />Anwser: <br />";
						echo "<input type='text' size='40' name='anwser' />";
						echo "<br /> <input type='submit' value='Submit'/>";
						echo "</form></div>";
					}
					
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