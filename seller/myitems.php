<?php
include '../connection.php';
include('mainpage.php');
$myid=$_SESSION['sellerid'];
$getallitems="Select * from product where seller_id=$myid";

$getallitemsvalue=mysqli_query($con,$getallitems);
if(!$getallitems){
	die(mysqli_error($con));
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.changecolor{
			display: flex;
		}
		.btn_edit{
			background:lightblue;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
			
		}
		.btn_remove{
			background:#FF6347;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
		}
		.btn_active{
			background:;
			width:150px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
		}
		.space{
			max-width:200px;
			min-width:200px;}
	
	#tbl_display{
			padding:10px;
			max-width:200px;
			min-width:200px;
		}
		#inactive{
            background-color: red;
            width: 1150px;
}
#active{
background: white;
}
	</style>
</head>
<body>
<table id="myItemsTable">
<tr>
	<th class="space">Photo</th>
<th  class="space">Name</th>
<th class="space">Price</th>
<th class="space">Quantity</th>
<th class="space">Options</th>
</tr>
</table>
<?php
foreach ($getallitemsvalue as $value) { ?>
	<div id="<?php if($value['status']==1){echo"active";}else{echo"inactive";} ?>" >
	<table>
<tr>
<td><img  style="width: 2in; height: 2in;" src="<?php print_r($value["photo"])?>" ></td>
<td id="tbl_display"><?php print_r($value['name']) ?></td>
<td id="tbl_display"><?php print_r($value['price']) ?></td>
<td id="tbl_display"><?php print_r($value['quantity']) ?></td>
<td>
	<div class="changecolor">
	<form method="POST" action="edititem.php">
	<input type="hidden"name="itemid" value="<?php print_r($value['id'])?>">
	<input type="submit"  name="editbutton" value="Edit" class="btn_edit">
	</form>
	<form method="POST" action="deleteitem.php">
	<input type="hidden" name="itemid" value="<?php print_r($value['id'])?>">
	<input type="submit"  name="deletebutton" value="Delete" class="btn_remove">
	</form>
	<form method="POST" action="activeinactive.php">
	<input type="hidden" name="itemid" value="<?php print_r($value['id'])?>">
	<input type="submit"name="actioninactive" value="Active/Inactive"  class="btn_active">
	</form>
</div>
</td>	
</tr>
<?php
}
?>
	

</table>
</div>
</body>
</html>