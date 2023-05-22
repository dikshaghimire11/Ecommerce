<?php
session_start();
include 'nav.php';
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
$customer_id=$_SESSION['customerid'];
$selectorder="SELECT delivery.id as delivery_id,delivery.purchase_date,delivery.success_status as success_status,cart.id as cart_id,cart.seller_id as sellerid,cart.total_price as price,cart.status as cartstatus,product.id as product_id,product.name as product_name, seller.name as seller_name ,cart.order_quantity as quantity,delivery.involved_vendors as involved_vendors,delivery.ready_vendors as ready_vendors from delivery RIGHT JOIN orders on delivery.id=orders.delivery_id RIGHT JOIN cart on cart.id=orders.cart_id RIGHT JOIN product on cart.product_id= product.id RIGHT JOIN seller on cart.seller_id=seller.id where cart.customer_id=$customer_id";
$selectorderquery=mysqli_query($con,$selectorder);
if(!$selectorderquery){
                die(mysqli_error($con));
              
              }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			overflow-x: hidden; 
		}
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
		.maincontain {
			transform: translate(200px,50px);
		}
		.space{
			max-width:150px;
			min-width:150px;
		}

			#tbl_display{
			padding:5px;
			max-width:150px;
			min-width:150px;
		}
			#tbl_display_delivery{
			padding:5px;
			max-width:350px;
			min-width:350px;
		}
		#tbl_display_date{
			padding:5px;
			max-width:250px;
			min-width:250px;
		}

	</style>
</head>
<body>
	<div class="maincontain">
<table>
	<tr>
	<th class="space">Product Name</th>
	<th class="space">Quanity</th>
	<th class="space">Purchase Date</th>
	<th class="space">Price</th>
	<th class="space">Seller Name</th>
	<th class="space">Delivery Status</th>
</tr>
<?php foreach($selectorderquery as $value)
if(!$value['cartstatus']==0){{?>
	<tr>
		<td id="tbl_display"><?php echo $value['product_name'] ;?></td>
		<td id="tbl_display"><?php echo $value['quantity'] ;?></td>
		<td id="tbl_display_date"><?php echo $value['purchase_date'] ;?></td>
		<td id="tbl_display"><?php echo $value['price'] ;?></td>
		<td id="tbl_display"><?php echo $value['seller_name'] ;?></td>
		<td id="tbl_display_delivery"><?php 
		if($value['involved_vendors']==$value['ready_vendors'] && $value['success_status']==0){echo "Your delivery is being approve by admin.";  }
			if($value['success_status']==1){echo "Your delivery is on the way.";
		}
			 if($value['involved_vendors']!=$value['ready_vendors']) {echo "Your delivery is being approve by seller.";} ?></td>
	</tr>
	<?php }} ?>
</table>
</div>
</body>
</html>
