<?php
session_start();
include('../connection.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
if(isset($_POST['delete'])){
	$categoryid=$_POST["categoryid"];
	$deletequery="DELETE from categories where id='$categoryid'";
    mysqli_query($con,$deletequery);
    header("location:addcategory.php");
}
?>