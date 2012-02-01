<?php session_start('test');?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			Gitmasters
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
				if (($_SESSION['admin']) != "" && ($_SESSION['admin']) == "1" )
				{
				$approve_topic = strip_tags($_GET['id']);
				mysql_query("UPDATE topics SET approved='1' WHERE id='$approve_topic'") or die (mysql_error());

				echo "Topic approved";
				}
				?>			
			</div>
			<div class="footer">
				&#169; 2012 Gitmasters 
			</div>
		</div>
	</body>
</html>