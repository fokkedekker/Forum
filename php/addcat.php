<?php session_start(test); ?>
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
	
$catagorie_name = strip_tags($_POST['name']);
$catagorie_approval = strip_tags($_POST['approval']);

if($catagorie_approval == "approved")
	$catagorie_approval = 1;
else
	$catagorie_approval = 0;
	
$result = mysql_query("INSERT INTO catagories(name, approval) VALUES ('$catagorie_name', '$catagorie_approval')") or die (mysql_error());

echo "Catagory added: ".$catagorie_name."<br />";
echo "Approved: ".$catagorie_approval; 

mysql_close($dbhandle);?>


		</div>


			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>