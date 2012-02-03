<?php session_start('test');
/* mogelijkheid voor de admin om een post zichtbaar te maken voor alle gebruikers (accepteren/approven) */
?>
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
				<?php include 'adminslide.php'; ?>
			</div>
			<div class="center">
				<?php
					include 'dblogin.php';
					if (($_SESSION['admin']) != "" && ($_SESSION['admin']) == "1" && array_key_exists('id', $_GET))
					{
						$approve_topic = mysql_real_escape_string(strip_tags($_GET['id']));
						mysql_query("UPDATE topics SET approved='1' WHERE id='$approve_topic'") or die ("Oops something went wrong you can try again in a few minutes.");

						echo "Topic approved";
					}
					else
					{
						echo "An error has occured, we have send a group of highly trained parrots to fix the situation.";
					}
					mysql_close($dbhandle);
				?>			
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>