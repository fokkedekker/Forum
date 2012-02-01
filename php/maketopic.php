<?php session_start('test'); ?>

<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			Gitmasters
		</title>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<?php include 'header.php'; ?>
			</div>
			<div class="menu">
				<?php include 'menu.php' ?>
			</div>
			<div class="slidemenu">
				<?php include 'slidemenu.php' ?>
			</div>
			<div class="center">
				<?php 
				
					if (array_key_exists('admin',$_SESSION) && !empty($_SESSION['blah']))
					{
						echo "<div class='newtopic'>
							Title:<br \>
							Message:<br \>";
						
						$topic = strip_tags($_GET["topic"]);
						
						if ($topic === 'f')
							$id = strip_tags($_GET["id"]);
						else
							$id = 0;
							
						$cat = strip_tags($_GET["cat"]);
						
						$url = "posttopic.php?id=".$id."&topic=".$topic."&cat=".$cat;
					
						echo "<form action= ".$url." method='POST'>
							<input type='submit' value='Submit'/>
							</div>
							<div>
									<input type='text' size='40' maxlength='64' name='topicname' /><br />
									<input type='text' size='40' maxlength='4096' style='height:200px;' name='content' />
								</form>
							</div>";
					}
					else
					{
						
						echo "You need to be logged in in order to post.<br />";
						echo "Click <a href='login.php'>here</a> to login.";
						
					}
				?>
			</div>
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>