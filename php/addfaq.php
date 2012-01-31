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
				<a href="index.php">Gitmasters</A>
			</div>

			<div class="menu">
				<?php include 'menu.php' ?>
			</div>

			<div class="slidemenu">
				<?php include'adminslide.php'; ?>
			</div>

			<div class="center">
				<?php
					if (!empty($_SESSION['admin']) && $_SESSION['admin'] == 1)
					{
						include 'dblogin.php';
							
						$question = strip_tags($_POST['question']);
						$anwser = strip_tags($_POST['anwser']);
							
						$result = mysql_query("INSERT INTO faq(question, awnser) VALUES ('$question', '$anwser')") or die (mysql_error());
						
						echo "<h1>New FAQ succesfully added.</h1><br />";
						echo "Click <a href='adminfaq.php'>here</a> to return.";
						echo "<div class='faq'>";
						echo "Question: ".$question;
						echo "<br /><hr />Anwser: ".$anwser;
						echo "</div>";

						mysql_close($dbhandle);
					}
				?>
			</div>

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>