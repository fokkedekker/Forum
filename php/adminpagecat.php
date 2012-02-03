<?php session_start('test'); 
/* adminpagina waar een nieuwe categorie kan worden aangemaakt en categorien verwijdert kunnen worden,
ook kan hier de restrictie van een categorie worden bepaald */
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
						echo "
						<div class='catagorie_maker'>
						<form action='addcat.php' method='POST'>
						Category: <input type='text' name='name'/>
						<br />
						Approval:
						<select name='approval' method='POST'>
							<option value='1'>approve</option>
							<option value='0'>control</option>
						</select>
						<input type = 'submit' value='submit'/>
						</form>
						</div><br />";
						// Database login.
						include 'dblogin.php';
						
						$result = mysql_query("SELECT * FROM catagories") or die("Oops something went wrong you can try again in a few minutes.");  
						
						// Resultaat weergeven.
						while($row = mysql_fetch_array($result))
						{
							echo "<hr /><center>";
							echo "<form action='delcat.php?id=".$row['id']."' method='POST'>";
							echo "<input type='image' src='delete.jpg' alt='delete' value='Delete'/>";
							echo "</center></form>";
							echo "<h1 align = 'center'>".$row['name']."</h1>";
							echo "<hr />";
						}
					}
					else
						echo "You are not an admin.";
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>