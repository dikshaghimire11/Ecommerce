<?php
include('../connection.php');
include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
if (isset($_POST['sellername'])) {
	$_SESSION['sellerId']=$_POST['sellerid'];
	$sellerid=$_SESSION['sellerId'];
	$sql="SELECT * from seller where id='$sellerid'";
	$executequery=mysqli_query($con,$sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	foreach ($executequery as  $value) {
		?>
	
	
<table style="transform: translateX(400px);">
	<tr>
		<td><h2><?php print_r($value['name']);?></h2></td>
		<td><h2><?php print_r($value['email']);?></h2></td>
		<td><h2><?php print_r($value['address']);?></h2></td>
		<td><h2><?php print_r($value['contact_number']);?></h2></td>
		
	</tr>
</table>
<?php
}
?>
</body>
</html>