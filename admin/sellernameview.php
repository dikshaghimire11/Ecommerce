<?php
include('../connection.php');

include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
$selectsql="SELECT * FROM seller";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.transparentbutton{
    width:400px;
    height: 50px;
  border-radius: 10px;
    background-color:white;
}.btn_edit{
		background:lightblue;
			width:170px;
			height:45px;
			font-size: 20px;
			    transform: translateX(500px);
}
#inactive{
background: red;
}
#active{
background: white;
}
body{
			overflow-x: hidden; 
		}
	</style>
</head>
<body>
	<h1 style="transform: translateX(400px);">List of Seller:</h1>
	<?php
	foreach ($executequery as  $value) {
		?>
	
	
<table style="transform: translateX(400px);">
	<tr>
		<td><h2><form method="Post" action="sellerdetail.php"><input type="hidden"  name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit"  class="transparentbutton" name="sellername" value="<?php print_r( $value['name']) ?> " id="<?php if($value['active']==1){echo"active";}else{echo"inactive";} ?>" ></form></h2></td>
		<form method="Post" action="selleractive.php"><input type="hidden" name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit" name="active" value="Active/Inactive" style="transform: translate(850px,70px);"  class="btn_edit"></form>
	</tr>
</table>
<?php
}
?>
</body>
</html>