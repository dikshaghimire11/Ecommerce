<?php
session_start();
include 'nav.php';
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}

$quantity=$_POST["quantity"];
$customer_id=$_POST["customer_id"];
$product_id=$_POST["product_id"];
$order_quantity=$_POST["quantity"];
$getproduct_info="SELECT * from product where id =$product_id";
$getproduct_info_value= mysqli_query($con,$getproduct_info);
$fetch_getproduct_info_value=mysqli_fetch_assoc($getproduct_info_value);

$getcustomer_info="SELECT * from customer where id =$customer_id";
$getcustomer_info_value= mysqli_query($con,$getcustomer_info);
$fetch_getcustomer_info_value=mysqli_fetch_assoc($getcustomer_info_value);

$seller_id=$fetch_getproduct_info_value["seller_id"];
$price= $fetch_getproduct_info_value["price"];
$totalprice=$price*$quantity;
$delivery_location=$fetch_getcustomer_info_value["address"];
$order_date=date("Y-m-d");
$addtocart="INSERT into cart(customer_id,seller_id,product_id,order_date,order_quantity,total_price,delivery_address) VALUES($customer_id,$seller_id,$product_id,'$order_date',$order_quantity,$totalprice,'$delivery_location')";

$addtocartvalue=mysqli_query($con,$addtocart);
if(!$addtocartvalue){
	die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php
foreach($getproduct_info_value as $value){?>
<form method="POST" action="cart.php">
	<input type="hidden" name="id" value="<?php echo $value['id'] ;?>"><input type="submit" name="ViewMycart" value="View My cart" style="background-color: skyblue; transform: translateX(600px);">

<?php
}
?>
</body>
</html>