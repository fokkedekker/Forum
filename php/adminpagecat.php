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
						echo "
						<div class='catagorie_maker'>
						<form action='addcat.php' method='POST'>
						Catagorie: <input type='text' name='name'/>
						<br />
						Approval:
						<select name='approval' method='POST'>
							<option value='1'>approve</option>
							<option value='0'>control</option>
						</select>
						</form>
						</div>";
					else
						echo "Your not an admin, please login.";
				?>
			</div>
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>