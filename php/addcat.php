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
			<A HREF="home.html">Het Patriciaat Forum</A>
			</div>

			<div class="menu">
				<?php include 'menu.php' ?>
			</div>


			<div class="slidemenu">
			<a href="adminpagecat.php">Add Catagory</a>
			<br />
			<a href="adminpage.php">Control Topics</a>
			</div>

			<div class="center">
				<?php
					include 'dblogin.php';
						
					$catagorie_name = strip_tags($_POST['name']);
					$catagorie_approval = strip_tags($_POST['approval']);

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
						echo "Please set a title for the categorie";
					}

					mysql_close($dbhandle);
				?>
			</div>


			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>