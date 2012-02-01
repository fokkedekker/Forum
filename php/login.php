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
				<?php include 'slidemenu.php'?>
			</div>
			
			<div class="center">
				<div class="login">
					<?php
						if (!array_key_exists('admin',$_SESSION))
							echo "
							<form action='checklogin.php' method='POST'>
								<table border = 0>
									<tr>
										<td>
											Username: 
										</td>
										<td>
											<input type='text' name='name' />
										</td>
									</tr>
									<tr>
										<td>
											Password:
										</td>
										<td>
											<input type='password' name='pass' />
										</td>
									</tr>
									<tr>
										<td>
											<a href='register.php'>Registreer</a>
										</td>
										<td>
											<input type='submit' value='Submit'/>
										</td>
									</tr>
								</table>
							</form>";
						else
							echo "You are already logged in.";
					?>
				</div>
			</div>
			
			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>
		</div>
	</body>
</html>