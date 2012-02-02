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
				<?php include 'adminslide.php' ?>
			</div>
			<div class="center">
				<?php
					if (array_key_exists('admin',$_SESSION) && ($_SESSION['admin']) != "" && $_SESSION['admin'] == 1 && array_key_exists('id',$_GET))
					{
						// Database login.
						include 'dblogin.php';
						
						$delete_cat = mysql_real_escape_string(strip_tags($_GET['id']));
						mysql_query("DELETE FROM catagories WHERE id ='$delete_cat'") or die ("Oops something went wrong you can try again in a few minutes.");

						echo "Category succesfully deleted, press <a href='adminpagecat.php'>here</a> to return.";
					}
					else
					{
						echo "Something went wrong.";
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>