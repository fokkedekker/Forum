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
				<?php include 'menu.php';?>
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
				$id = 24;
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
				
				
				while($counter != 10)
				{
				
				$result2 = mysql_query("SELECT * FROM topics WHERE user_id = $id LIMIT $counter OFFSET $counter2 ") or die(mysql_error());  
					
					$row2 = mysql_fetch_array($result2);
					
					$lastpost = $row2['posttitle'];
					$lastpostcut = str_split($lastpost, 37);
					echo $lastpostcut[0];
					// als de string langer is dan 37 dan past hij niet in het hokje dus ... om aan te geven dat het niet de volledige titel is
					if (strlen($lastpostcut[0]) == 37)
					{
						echo "...";
					}
					$counter = $counter + 1;
					$counter2 = $counter2 +1;
					
					echo "<br />";
					
					
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
				<?php
				$forumstatus = $row['admin'];
				
				if($forumstatus == 0)
				{
					echo " Forum status: User";
				}
				else if($forumstatus == 1)
				{
					echo "Forum status: Admin";
				}
				
				echo  mysql_query("SELECT user_id, COUNT(*) FROM topics WHERE user_id=$id"); 
			
				?>
				</div>
				
				
				
				<div class="startedtopics">
				<?php
				
				$counter3 =1;
				$counter4 = 0;
				
				while($counter3 != 10)
				{					
					$result3 = mysql_query("SELECT * FROM topics WHERE user_id = $id ORDER BY starttime LIMIT $counter3 OFFSET $counter4") or die(mysql_error());  
					
					$row3 = mysql_fetch_array($result3);
					echo $row3['posttitle'];
					$counter3 = $counter3 + 1;
					$counter4 = $counter4 + 1;
					echo "<br />";
					
				}
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