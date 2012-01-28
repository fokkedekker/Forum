<div class="menuknop">
<A HREF="index.php">Home</A>
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
<A HREF="register.php">Register</A>
</div>

<div class="menuknop">
<A HREF="personal.php">Personal</A>
</div>

<div class="menuknop">
<A HREF="adminpage.php">Admin</A>
</div>

<div class="menuknop">
<A HREF="faq.php">FAQ</A>
</div>