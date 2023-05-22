<?php
include '../connection.php';
include'mainpage.php';
if(!isset($_SESSION['sellerid'])){
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
	<style type="text/css">
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
		body{
			overflow-x: hidden; 
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
	</style>
</head>
<body>
	<div class="maincontain">
		<h3>Orders Details:</h3>
<table style="border: 1px solid black">
<tr>
<th class="space">Product Name</th>
<th class="space">Quantity</th>
<th class="space">Total Price</th>
<th class="space">Delivery Address</th>
</tr>
<?php foreach ($moredetailsquery as $value) { ?>
<tr>
<td id="tbl_display" ><?php echo $value['product_name'];?></td>
<td id="tbl_display"><?php echo $value['order_quantity'];?></td>
<td id="tbl_display"><?php echo $value['price'];?></td>
<td id="tbl_display"><?php echo $value['delivery_address'];?></td>
</tr>
<?php }}?>


</table>
</div>
</body>
</html>