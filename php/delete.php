<?php session_start('test');?>
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
					if (($_SESSION['admin']) != "" && ($_SESSION['admin']) == "1" )
					{
						$delete_topic = strip_tags($_GET['id']);
						mysql_query("DELETE FROM topics WHERE id ='$delete_topic'") or die (mysql_error());

						echo "Topic deleted";
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