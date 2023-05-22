<?php
include('../connection.php');
include('mainpage.php');
$create_order_view="CREATE or Replace view adminview as SELECT delivery.id as delivery_id,delivery.purchase_date,delivery.success_status as success_status,cart.id as cart_id,cart.seller_id as sellerid,cart.total_price as price,product.id as product_id,product.name as product_name, customer.name as customer_name,cart.order_quantity,cart.delivery_address ,delivery.involved_vendors as involved_vendors,delivery.ready_vendors as ready_vendors from delivery RIGHT JOIN orders on delivery.id=orders.delivery_id RIGHT JOIN cart on cart.id=orders.cart_id RIGHT JOIN product on cart.product_id= product.id RIGHT JOIN customer on cart.customer_id=customer.id where involved_vendors=ready_vendors";

$create_order_view_query=mysqli_query($con,$create_order_view);
if(!$create_order_view_query){
	die(mysqli_error($con));
}
$select_distinct_delivery="Select distinct delivery_id,purchase_date,customer_name,ready_vendors,involved_vendors,success_status  from adminview";
$select_distinct_delivery_query=mysqli_query($con,$select_distinct_delivery);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
			overflow-x: hidden; 
		}
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
		.maincontain {
			transform: translate(400px,50px);
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
		.btn_active{
			background:lightgreen;
			width:130px;
			height:30px;
			font-size: 20px;
			border-radius: 5px;
		}
		.btn_sent{
			background:lightblue;
			width:80px;
			height:30px;
			font-size: 20px;
			border-radius: 5px;
		}

	</style>
</head>
<body>
<table style="transform: translate(500px,100px);">
<tr>
<th class="space">Custumer Name</th>
<th class="space">Order Date</th>
<th class="space">Options</th>
<th class="space">Approve Order</th>
<th class="space">Delivery Status</th>
</tr>
<?php foreach ($select_distinct_delivery_query as $value) { 
$delivery_id= $value['delivery_id'];
$testsentstatus="SELECT success_status from delivery where id='$delivery_id' AND success_status=1";
$testsentstatusquery=mysqli_query($con,$testsentstatus);
if(!$testsentstatusquery){
	die(mysqli_error($con));
}
$numrows=mysqli_num_rows($testsentstatusquery);
	?>
<tr>
<td id="tbl_display"><?php echo $value['customer_name'];?></td>
<td id="tbl_display"><?php echo $value['purchase_date'];?></td>
<td><form method="POST" action="orderdetails.php">
	<input type="hidden" name="delivery_id" value="<?php echo $value['delivery_id'];?>">
	<input type="submit" name="ordersubmit" value="More Details" class="btn_active">
</form></td>


<td><form method="POST" action="adminapproval.php">
	<input type="hidden" name="delivery_id" value="<?php echo $value['delivery_id'];?>">
	<input type="submit" name="sent" value="Sent" style="display:<?php if($numrows==1){echo "none;";}?>" class="btn_sent">
</form></td>
<td><?php 
			if($value['success_status']==1){echo "This delivery is sent.";
		}
			 if($value['involved_vendors']!=$value['ready_vendors']) {echo "This delivery is being approve by seller.";} ?></td>
</tr>
<?php }?>


</table>
</body>
</html>