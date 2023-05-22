
<?php 

$con=mysqli_connect("localhost","root","","formvalidation");
if(!$con){
	echo "Not Connected to Database";
}

$first=$_GET["Name"];
$middle=$_GET["Middle"];
$last=$_GET["Last"];
$email=$_GET["Email"];

$sql="INSERT into users(First,Middle,Last,Email) values('$first','$middle','$last','$email')";
mysqli_query($con,$sql);

 ?>
