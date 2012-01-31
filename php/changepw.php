<?php session_start('test'); ?>
<?php 

include 'dblogin.php';

$oldpw = $_POST['oldpassword'];
$newpw = $_POST['newpassword'];
$repeatnewpw = $_POST['repeatnewpw'];
$md5pwnew = md5($newpw);
$md5oldpw = md5($oldpw);

$id = $_SESSION['userID'];

$result = mysql_query("SELECT * FROM users WHERE id = '$id'") or die(mysql_error());
$row = mysql_fetch_array($result);

$password = $row['password'];


if($md5oldpw == $password && $newpw == $repeatnewpw)
{
	mysql_query("UPDATE users SET password = '$md5pwnew' WHERE id ='$id'");
	echo "password is changed";
}

else if('$newpw' != '$repeatnewpw')
{
	echo " Password are not the same";
}

else if('$oldpw' != '$password')
{
	echo "Old password is not correct";
}


?>