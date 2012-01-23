<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("webdb1236", $con);



$str1 ='$_POST[email]';
$str2 = $_post[repeatemail];

$stringcompare = strcmp ($str1 ,$str2 );

echo $stringcompare;
echo $str1;
echo $str2;
echo $_post["email"];




if($stringcompare == 9)
{

$sql="INSERT INTO users (first_name, last_name, email, favo_browser, personal_info, date_of_birth)
VALUES
('$_POST[firstname]', '$_POST[lastname]' ,'$_POST[email]' ,'$_POST[browser]' ,'$_POST[overjouw]','$_post[day]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
echo '$_post[day]';
}


else if($stringcompare != 0)
{
	echo "emails zijn niet gelijk";
}






mysql_close($con)
?>