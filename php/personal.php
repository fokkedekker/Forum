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
				$id = 1;
					include 'dblogin.php';
					
					//TODO iets doen zodat de juiste user wordt geselecteerd
					$result = mysql_query("SELECT * FROM users where id = '$id' ") or die(mysql_error());  
					
					$row = mysql_fetch_array($result);
				?>
			
			<div class="picture">
				<img src="plus.jpg" alt="emperor" width="200" height="200"/>
				</div>
				
				<div class="overmij">
					<?php echo $row['personal_info'];?>
				</div>
				
					<div class="lastposts">
				<?php
				
				$counter = 1;
				$counter2 = 0;
				
				while($counter != 5)
				{
				
				$result2 = mysql_query("SELECT * FROM topics WHERE user_id = $id LIMIT '$counter2' OFFSET 1") or die(mysql_error());  
					
					$row2 = mysql_fetch_array($result2);
					
					echo $row2['posttitle']; 
					$counter = $counter + 1;
					
					
				}
					
					
				
				?>
				</div>
				
				
				<div class="info">
					<?php echo "Username: ".$row['username'];?>
					<br />
					<?php
						echo "Sex:".$row['sex'];
					?>
					<br />
					<?php 
						echo "Name: ".$row['first_name'];
						echo " ".$row['last_name'];
					?>
					<br />
					<?php 
						echo "E-mail: ".$row['email'];
					?>
					<br />
					<?php 
						echo "Favo browser: ".$row['favo_browser'];
					?>
				</div>
				
			
				<div class="forumstatus">
				hier komt de forum status te staan
				</div>
				
				
				
				<div class="startedtopics">
				<?php
				
					$result3 = mysql_query("SELECT * FROM topics WHERE user_id = $id ORDER BY starttime LIMIT 5") or die(mysql_error());  
					
					$row3 = mysql_fetch_array($result3);
					echo $row3['posttitle'];
					
					
					?>
					
				</div>
				
			
					<?php mysql_close($dbhandle);
				?>
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>