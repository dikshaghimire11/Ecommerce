<?php
include('../connection.php');
include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
$selectsql="SELECT * FROM seller where status =0";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			overflow-x: hidden; 
		}
			.btn_edit{
			background:lightblue;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
			
		}
	</style>
</head>
<body>
	<h1 style="transform: translate(600px,100px);">New Register</h1>
	<?php
	if($executequery->num_rows!=1){?>
		<h1 style="text-align: center; color: red;transform: translate(100px,100px); ">No new register of any seller at this moment.</h1>
<?php
	}
	foreach ($executequery as  $value) {
		?>
	
	
<table style="transform: translate(600px,100px);">
	<tr>
		<td><h2><?php print_r($value['name']);?></h2></td>
		<form method="Post" action="accept.php"><input type="hidden" name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit" name="accept" value="Accept" class="btn_edit"></form>
		
	</tr>
</table>
<?php
}
?>
</body>
</html>