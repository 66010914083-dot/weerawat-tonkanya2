<?php
$password = "1234";
$password2 = "4321";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_password2 = password_hash($password2, PASSWORD_DEFAULT);


echo $hashed_password . "<br>"; 
echo $hashed_password2;
?>