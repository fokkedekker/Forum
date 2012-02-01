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
				<?php include 'adminslide.php'; ?>
			</div>
			<div class="center">
				<?php
					// Database connectie.
					include 'dblogin.php';
						
					$catagorie_name = mysql_real_escape_string(strip_tags($_POST['name']));
					$catagorie_approval = mysql_real_escape_string(strip_tags($_POST['approval']));

					if($catagorie_approval == "approved")
						$catagorie_approval = 1;
					else
						$catagorie_approval = 0;
						
					if($catagorie_name != "")
					{
						$result = mysql_query("INSERT INTO catagories(name, approval) VALUES ('$catagorie_name', '$catagorie_approval')") or die (mysql_error());

						echo "Catagory added: ".$catagorie_name."<br />";
						echo "Approved: ".$catagorie_approval; 
					}
					else
					{
						echo "Please set a title for the category.";
					}
					// Sluit database connectie.
					mysql_close($dbhandle);
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>