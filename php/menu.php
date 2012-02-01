<div class="menuknop">
	<a href="index.php">Home</A>
</div>
<div class="menuknop">
	<?php
		if (empty($_SESSION['loggedIn']))
			echo "<a href='login.php'>Login</a>";
		else if ($_SESSION['loggedIn'] == 1)
			echo "<a href='logout.php'>Logout</a>";
	?>
</div>
<div class="menuknop">
	<a href="register.php">Register</a>
</div>
<div class="menuknop">
	<a href="<?php echo "personal.php?id=";
		if (!empty($_SESSION['userID'])) 
			echo $_SESSION['userID'];
	?>">Personal</A>
</div>
<div class="menuknop">
	<a href="adminpage.php">Admin</a>
</div>
<div class="menuknop">
	<a href="faq.php">FAQ</a>
</div>