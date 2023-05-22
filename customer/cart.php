<?php
session_start();
include 'nav.php';
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}

$getscustomer_id=$_SESSION['customerid'];
$data=mysqli_query($con,"SELECT * from cart where customer_id='$getscustomer_id'");
$product="SELECT cart.id,product.name, product.photo, cart.order_date,cart.total_price,cart.order_quantity,cart.delivery_address,cart.status FROM product LEFT JOIN cart ON product.id = cart.product_id where customer_id='$getscustomer_id' && cart.status='0'";
$fetch=mysqli_query($con,$product);
if (!$fetch) {
	die(mysqli_error($con));
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
	<form method="POST" action="cartoptions.php">
		<input type="hidden" name="customer_id" value="<?php echo $getscustomer_id?>">
		<input type="submit" name="buyall" value="Purchase" style="width: 80px; height: 40px; background-color: skyblue; transform: translateX(700px);">
	</form>
  <?php
foreach($fetch as $value){?>
<div style="float: left; border:solid lightblue 1px ; margin-left: 20px; ">
	<tr><img src="<?php echo $value["photo"]  ?> " style="width:2in; height:2in; margin-right:1in; display:flex;"></tr>
<div style="width: 270px; "><tr><h5 style="" > Product Name:<?php echo $value['name']; ?> </h5></tr>
	<tr><h5 style="" > Order_date:<?php echo $value["order_date"]  ?> </h5></tr>
<tr><h5 style="" >Order_Quantity:<?php echo $value["order_quantity"]  ?> </h5></tr>
<tr><h5 style="" > Total_price: Rs.<?php echo $value["total_price"]  ?> </h5></tr>
<tr><h5 style="" > Delivery Address:<?php echo $value["delivery_address"]  ?> </h5></tr>
<form method="POST" action="cartoptions.php"> <input type="hidden" name="cart_id" value="<?php echo  $value["id"] ?>"><input type="submit" name="remove_id" value="Remove" style="background-color: lightgreen;"> 
</tr></div>
  </div>
<?php
}
?>
</body>
</html>