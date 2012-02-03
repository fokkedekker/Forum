<?php session_start('test'); 
/*Deze file verandert de waarde van het password in de database
hier wordt eerste het oude password gevraagd. er wordt gekeken door middel van de session
of dit het goede password is. Daarna wordt er het nieuwe password gevraagd als het nieuwe password en repeat 
new password gelijk zijn dan mag er upgedate worden in de databse*/
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
				<?php include 'slidemenu.php';?>
			</div>
			<div class="center">
				<?php
					// Database connectie.
					include 'dblogin.php';
					
					// Variabelen instantieren.
					$oldpw = "";
					$newpw = "";
					$repeatnewpw = "";
					
					// Variabelen verkrijgen.
					if (array_key_exists('oldpassword',$_POST))
						$oldpw = mysql_real_escape_string($_POST['oldpassword']);
					if (array_key_exists('newpassword',$_POST))	
						$newpw = mysql_real_escape_string($_POST['newpassword']);
					if (array_key_exists('repeatnewpw',$_POST))
						$repeatnewpw = mysql_real_escape_string($_POST['repeatnewpw']);
					
					if ($oldpw != "" && $newpw != "" && $repeatnewpw != "")
					{
						// Md5 encriptie.
						$md5pwnew = md5(mysql_real_escape_string($newpw));
						$md5oldpw = md5(mysql_real_escape_string($oldpw));

						$id = $_SESSION['userID'];

						$result = mysql_query("SELECT * FROM users WHERE id = '$id'") or die("Oops something went wrong you can try again in a few minutes.");
						$row = mysql_fetch_array($result);

						$password = $row['password'];

						if($md5oldpw == $password && $newpw == $repeatnewpw)
						{
							mysql_query("UPDATE users SET password = '$md5pwnew' WHERE id ='$id'");
							echo "password is changed";
						}

						else if($newpw != $repeatnewpw)
						{
							echo " Password are not the same";
						}

						else if($oldpw != $password)
						{
							echo "Old password is not correct";
						}
					}
					else
					{
						echo "An error has occured, we are sending our highly trained monkeys to fix it.";
					}
					// Database connectie afsluiten.
					mysql_close($dbhandle);
				?>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>