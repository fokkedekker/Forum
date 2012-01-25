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
			
			
			<div class="newtopic">
				Topicname:<br \>
				Message:<br \>
				<?php 
					//TODO redirect als niet ingelogd
					$topic = strip_tags($_GET["topic"]);
					
					if ($topic === 'f')
						$id = strip_tags($_GET["id"]);
					else
						$id = 0;
						
					$cat = strip_tags($_GET["cat"]);
					
					$url = "posttopic.php?id=".$id."&topic=".$topic."&cat=".$cat;
				?>
				<form action=<?php echo $url; ?> method="POST">
					<input type="submit" value="Submit"/>
			</div>
			<div>
					<input type="text" size="40" maxlength="64" name="topicname" /><br />
					<input type="text" size="40" maxlength="4096" style="height:200px;" name="content" />
				</form>
			</div>
			</div>
			

			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>