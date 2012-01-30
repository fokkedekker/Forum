<?php session_start('test'); ?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">

<?php
//if(isset($_session['username'] == Admin)
//{
//echo "hij is gelijk";
//}
?>	
	
	
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
				<?php include 'adminslide.php' ?>
			</div>

			<div class="center">

<div class="catagorie_maker">
<form action="addcat.php" method="POST">
Catagorie: <input type="text" name="name"/>
<br />
Approval:
<select name="approval" method="POST">
	<option value="1">approve</option>
	<option value="0">control</option>
</select>
</form>

</div>


		</div>


			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>