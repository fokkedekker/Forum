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
						include 'dblogin.php';
							
						$question = mysql_real_escape_string(strip_tags($_POST['question']));
						$anwser = mysql_real_escape_string(strip_tags($_POST['anwser']));
							
						$result = mysql_query("INSERT INTO faq(question, awnser) VALUES ('$question', '$anwser')") or die ("Oops something went wrong you can try again in a few minutes.");
						
						echo "<h1>New FAQ succesfully added.</h1><br />";
						echo "Click <a href='adminfaq.php'>here</a> to return.";
						echo "<div class='faq'>";
						echo "Question: ".$question;
						echo "<br /><hr />Anwser: ".$anwser;
						echo "</div>";

						mysql_close($dbhandle);
					}
					else
					{
						echo "You are not an admin.";
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>