<?php session_start('test');
/*addcat.php voegt een categorie toe aan de categorie database.
Dit doet hij alleen als alle vakjes correct zijn ingevoeld. Daarnaast wordt de approval ook in 
de database gezet. overal wordt mysql real escape gebruikt om te zorgen dat er geen mysql inject toegpast kan worden*/
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
					if (array_key_exists('admin',$_SESSION) && ($_SESSION['admin']) != "" && $_SESSION['admin'] == 1)
					{
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
							$result = mysql_query("INSERT INTO catagories(name, approval) VALUES ('$catagorie_name', '$catagorie_approval')") or die ("Oops something went wrong you can try again in a few minutes.");

							echo "Catagory added: ".$catagorie_name."<br />";
							echo "Approved: ".$catagorie_approval; 
						}
						else
						{
							echo "Please set a correct title for the category.";
						}
						
						// Sluit database connectie.
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