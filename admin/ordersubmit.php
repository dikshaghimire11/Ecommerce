<?php
session_start();
include '../connection.php';

if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
$seller_username=$_SESSION['seller_username'];
if(isset($_POST['ordersubmit'])){
$delivery_id=$_POST['delivery_id'];
$moredetails="SELECT * from $seller_username where delivery_id=$delivery_id";
$moredetailsquery=mysqli_query($con,$moredetails);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
<tr>
<th>Product Name</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Delivery Address</th>
</tr>
<?php foreach ($moredetailsquery as $value) { ?>
<tr>
<td><?php echo $value['product_name'];?></td>
<td><?php echo $value['order_quantity'];?></td>
<td><?php echo $value['price'];?></td>
<td><?php echo $value['delivery_address'];?></td>
</tr>
<?php }}?>


</table>
</body>
</html>






