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
				<?php include 'menu.php'; ?>
			</div>
			<div class="slidemenu">
				<?php include'adminslide.php'; ?>
			</div>
			<div class="center">
				<?php
					if (array_key_exists('admin',$_SESSION) && ($_SESSION['admin']) != "" && $_SESSION['admin'] == 1)
					{
						// Databaseconnectie.
						include 'dblogin.php';
						
						// Alle FAQ dingen uit de faq tabel halen.
						$result = mysql_query("SELECT * FROM faq") or die("Oops something went wrong you can try again in a few minutes.");  
						
						// Resultaat weergeven.
						while($row = mysql_fetch_array($result))
						{
							echo "<div class='faq'>";
							echo "<form action='delfaq.php?id=".$row['id']."' method='POST'>";
							echo "<input type='image' src='delete.jpg' alt='delete' value='Delete'/>";
							echo "</form>";
							echo "Question: ".$row['question'];
							echo "<br /><hr />Anwser: ".$row['awnser'];
							echo "</div>";
						}
						
						echo "<div class='faq'>";
						echo "<h1> New FAQ </h1>";
						echo "Question: <br />";
						echo "<form action='addfaq.php' method='POST'>";
						echo "<input type='text' size='75' name='question'/>";
						echo "<hr />Anwser: <br />";
						echo "<input type='text' size='75' name='anwser' />";
						echo "<br /> <input type='submit' value='Submit'/>";
						echo "</form></div>";
						
						// Database connectie afsluiten.
						mysql_close($dbhandle);
					}
					else
					{
						echo "You are not an admin, please login.";
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>