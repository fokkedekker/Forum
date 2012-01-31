
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
				<A HREF="index.php">Gitmasters</A>
			</div>

			<div class="menu">
				<?php include 'menu.php' ?>
			</div>
			
			<div class="slidemenu">
				<?php include 'adminslide.php' ?>
			</div>

			<div class="center">
				<?php
					if (array_key_exists('admin',$_SESSION) && ($_SESSION['admin']) != "" && $_SESSION['admin'] == 1)
					{
						// Database login.
						include 'dblogin.php';
						
						$delete_topic = strip_tags($_GET['id']);
						mysql_query("DELETE FROM faq WHERE id ='$delete_topic'") or die (mysql_error());

						echo "FAQ succesfully deleted, press <a href='adminfaq.php'>here</a> to return.";
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>