
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
				<?php include 'menu.php';?>
			</div>
			
			<div class="slidemenu">
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
			
			<?php
			
			
			
			session_start('test');
			
			$user = $_SESSION['username'];
			
			if ($user)
			{
			
			if ($_POST['sumbit'])
			{
			$oldpassword = $_POST['oldpassword'];
			$newpassword = $_POST['newpassword'];
			$repeatnewpassword = $_POST['repeatnewpassword'];

			//check password db
			include 'dblogin.php';
			
			$queryget = mysql_query("SELECT password FROM users WHERE username='$user") or die (" Password NOT changed succesfully!!" ); 
			$row = mysql_fetch_assoc($queryget);
			
			$oldpassworddb = $row['password'];
			
			
			//check password
			
			if ($oldpassword==$oldpassworddb)
			{
			if ($newpassword==$repeatnewpassword)
			{
			//success & change
			
			echo "succeded!";
			
			$querychange = mysql_query("UPDATE users SET password='$newpassword' WHERE username='$user'");
			
			session_destroy();
			
			die ("Your password has been changed!. < a href='index.php'>Return</a> to the main page.");
			
			}
			else
				die("New passwords don't match!"); 
			
			}
			else 
				die ("Old password don't match!");
				
			
			
			}
			
			else
			{
			
			echo"
			
			<form action='changing.php' method='POST'>
			Old password: <input type= 'password' name='oldpassword'><p>
			New password: <input type='password' name='newpassword'><br>
			Repeat new password: <input type='password' name='reapeatnewpassword'><p>
			<input type='submit' name='submit' value='change password'>
			
			</form>
			";
			}
			
			}
			else
			
				die("You must be logged in to change your password!");
				
				
	
			
				
				
				
				
				
				
				
				
			mysql_close($dbhandle);
				?>
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>