<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("webdb1236", $con);



$str1 =strip_tags($_POST["email"]);
$str2 =strip_tags($_POST["repeatemail"]);
$day =strip_tags($_POST["day"]);
$month =strip_tags($_POST["month"]);
$year =strip_tags($_POST["year"]);
$date =($day.$month.$year); 
$username = strip_tags($_POST["username"]);
$firstname = strip_tags($_POST["firstname"]);
$lastname = strip_tags($_POST["lastname"]);
$browser = strip_tags($_POST["browser"]);
$personal = strip_tags($_POST["overjouw"]);
$sex = strip_tags($_POST["sex"]);
$password = md5(strip_tags($_POST["password"]));




if($str1 == $str2 && $str3 == $str4)
{


$sql="INSERT INTO users (first_name, last_name, email, favo_browser, personal_info, date_of_birth, user_name, sex, password)
VALUES
('$firstname', '$lastname' ,'$str1' ,'$browser' ,'$personal','$date','$username','$sex','$password')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

}


else if($str1 != $str2)
{
	echo "emails zijn niet gelijk";
	
}






mysql_close($con)
?>