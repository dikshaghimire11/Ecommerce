<?php
$database="ecommerce";
$host="localhost";
$username="root";
$password='';
$con=mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno()){
	die("Failed to connect to the Database!!");
}else{

}
?>