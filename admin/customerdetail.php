<?php

include('../connection.php');
include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
$selectsql="SELECT * FROM customer";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.btn_edit{
			background:lightblue;
			width:170px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
			
		}
			body{
			overflow-x: hidden; 
		}
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
.space{
			max-width:150px;
			min-width:150px;
		}

			#tbl_display{
			padding:10px;
			max-width:180px;
			min-width:180px;
		}
		#inactive{
background: red;
}
#active{
background: white;
}
	</style>
</head>
<body>
	<table style="transform: translate(400px,70px);">
		<th class="space">Customer Name</th>
		<th class="space">Email</th>
		<th class="space">Address</th>
		<th class="space">Contact_Number</th>

	<h1 style="transform: translate(400px,70px);">List of Customer:</h1>
	<?php
	foreach ($executequery as  $value) {
		?>

	<tr  id="<?php if($value['active']==1){echo"active";}else{echo"inactive";} ?>">
		<td id="tbl_display"><h5><?php print_r($value['name']);?></h5></td>
		<td id="tbl_display"><h5><?php print_r($value['email']);?></h5></td>
		<td id="tbl_display"><h5><?php print_r($value['address']);?></h5></td>
		<td id="tbl_display"><h5><?php print_r($value['contact_number']);?></h5></td>
		<!-- <form method="Post" action="customeractive.php"><input type="hidden" name="customerid" value="<?php print_r($value['id'])?>"><input type="submit" name="active" value="Active/Inactive" style="transform: translate(1160px,150px);" class="btn_edit"></form> -->
		
	</tr>
</table>
<?php
}
?>
</body>
</html>