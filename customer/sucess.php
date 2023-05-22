<?php
session_start();
include('../connection.php');
include('nav.php');
if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
</head>
<body>
<a href="confirmorder.php">Your Payment is successfull.... please Click here to continue!!!</a>
</body>
</html>