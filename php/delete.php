
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
			<A HREF="index.php">Het Patriciaat Forum</A>
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
if (($_SESSION['admin']) != "" && ($_SESSION['admin']) == "1" )
{
$delete_topic = strip_tags($_GET['id']);
mysql_query("DELETE FROM topics WHERE id ='$delete_topic'") or die (mysql_error());

echo "Topic Deleted";
}
?>



		</div>


			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>