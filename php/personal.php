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

				<?php include 'menu.php' ?>

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
					
					//TODO iets doen zodat de juiste user wordt geselecteerd
					$result = mysql_query("SELECT * FROM users") or die(mysql_error());  
					
					$row = mysql_fetch_array($result);
				?>
			
			<div class="picture">
				<img src="plus.jpg" alt="emperor" width="200" height="200"/>
				</div>
				
				<div class="overmij">
					<?php echo $row['personal info'];?>
				</div>
				
					<div class="lastposts">
				Dit zijn de laatste posts van de user
				</div>
				
				
				<div class="info">
					<?php echo "Username: ".$row['username'];?>
					<br />
					<?php
						echo "Sex:";
						switch ($row['sex'])
						{
							case 0:
								echo "Male";
								break;
							case 1:
								echo "Female";
								break;
							case 2:
								echo "Yes please";
								break;
						}
					?>
					<br />
					<?php 
						echo "Name: ".$row['first name'];
						echo " ".$row['last name'];
					?>
					<br />
					<?php 
						echo "E-mail: ".$row['email'];
					?>
					<br />
					<?php 
						echo "Favo browser: ".$row['favo browser'];
					?>
				</div>
				
			
				<div class="forumstatus">
				hier komt de forum status te staan
				</div>
				
				
				
				<div class="startedtopics">
					
					hier komen de gestarte topics van de persoon te staan deze lijst groeit 
					automatisch mee naar mate het er meer worden
					<br />
					<br />
					uisque viverra tempor est, id mollis risus blandit a. Morbi diam erat, dapibus
					vitae vestibulum vitae, cursus sit amet lacus. Vestibulum ante ipsum primis in 
					faucibus orci luctus et ultrices posuere cubilia Curae; Mauris lacinia ligula id 
					<br />
					<br />
					uisque viverra tempor est, id mollis risus blandit a. Morbi diam erat, dapibus
					vitae vestibulum vitae, cursus sit amet lacus. Vestibulum ante ipsum primis in 
					faucibus orci luctus et ultrices posuere cubilia Curae; Mauris lacinia ligula id 
					<br />
					<br />
					uisque viverra tempor est, id mollis risus blandit a. Morbi diam erat, dapibus
					vitae vestibulum vitae, cursus sit amet lacus. Vestibulum ante ipsum primis in 
					faucibus orci luctus et ultrices posuere cubilia Curae; Mauris lacinia ligula id 
					<br />
					<br />
					uisque viverra tempor est, id mollis risus blandit a. Morbi diam erat, dapibus
					vitae vestibulum vitae, cursus sit amet lacus. Vestibulum ante ipsum primis in 
					faucibus orci luctus et ultrices posuere cubilia Curae; Mauris lacinia ligula id 
					<br />
					<br />
					uisque viverra tempor est, id mollis risus blandit a. Morbi diam erat, dapibus
					vitae vestibulum vitae, cursus sit amet lacus. Vestibulum ante ipsum primis in 
					faucibus orci luctus et ultrices posuere cubilia Curae; Mauris lacinia ligula id 
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