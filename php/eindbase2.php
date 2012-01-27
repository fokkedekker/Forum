<?php session_start(test); ?>
<?xml version="1.0"?>
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

				<div class="menuknop">
				<A HREF="home.html">Home</A>
				</div>

				<div class="menuknop">
				<A HREF="login.html">Login</A>
				</div>

				<div class="menuknop">
				<A HREF="register.html">Register</A>
				</div>

				<div class="menuknop">
				<A HREF="personal.html">Personal</A>
				</div>

				<div class="menuknop">
				<A HREF="admin.html">Admin</A>
				</div>

				<div class="menuknop">
				<A HREF="faq.html">FAQ</A>
				</div>

			</div>
			
			
			<div class="slidemenu">

				 <div class="forum">
				 	Forum
				 </div>
				 <div class="categorie">
				 	<br />
				 	 &#8627; Categorie
				 </div>
				 <div class="thread">
				 	 &#8627; Thread
				 </div>
				 <div class="reactie">
				 	 &#8627; Reactie
				 </div>
			</div>
		
			
			
			<div class="center">
			
			<?php 
					include 'dblogin.php';
					
					$result = mysql_query("SELECT * FROM topics") or die (mysql_error());

					while($row = mysql_fetch_array($result));
					
					{
					echo "<div.class= 'fuckedup'>";
					echo $row['posttitle'];
					echo "</div>";
					
					echo "<div.class= 'face'>";
					echo $row['catagorie_id'];
					echo "</div>";
					
					echo "<div.class= 'nose'>";
					echo $row['post_id'];
					echo "</div>";
					
					echo "<div.class= 'mouth'>";
					echo $row ['starttime'];
					echo "</div>";
					}
					
					
					
					
			mysql_close($dbhandle)?>
			
			
			<p style="height:1000px;">
			
			
	
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>