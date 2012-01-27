<?php session_start(test); ?>
<?php
$random = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',10)),10,10);
echo $random;
?>


