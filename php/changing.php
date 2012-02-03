<?php session_start('test');
/*Deze file geeft de html weer om het password te veranderen zodra alles velden ingevuld zijn en er op submit wordt gedruk of op enter
wordt er door gelinkt naar changepw.php die de waardes daadwerkelijk in de database zet*/?>
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
				<?php include 'menu.php';?>
			</div>
			<div class="slidemenu">
				<?php include 'slidemenu.php';?>
			</div>
			<div class="center">
				<?php
					if (!empty($_SESSION['username']))
					{
						echo "
						<form action='changepw.php' method='POST'>
						<table border ='0'>
						<tr>
						<td>Old password: </td> <td> <input type= 'password' name='oldpassword'> </td>
						</tr>
						<tr>
						<td>New password: </td> <td> <input type='password' name='newpassword'> </td>
						</tr>
						<tr>
						<td> Repeat new password: </td> <td> <input type='password' name='repeatnewpw'> </td>
						</tr>
						<input type='submit' name='submit' value='change password'>
						</table>
						</form>";
					}
					else
					{	
						die("You must be logged in to change your password!");
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>