<?php
include('../connection.php');
include('mainpage.php');
$path=__DIR__;
$getcategory="Select * from categories";
$category_value=mysqli_query($con,$getcategory);
if(!$category_value){
	die(mysqli_error($con));
}
echo"<h1>Edit Item</h1>";
	if(isset($_POST['itemid'])){
		$_SESSION['itemid']=$_POST['itemid'];
	}
	$idtoedit=$_SESSION['itemid'];
	$olddata="SELECT * from product where id=$idtoedit";
	$olddatavalue=mysqli_query($con,$olddata);
	$fetchedoldvalue=mysqli_fetch_assoc($olddatavalue);
	$name=$fetchedoldvalue['name'];
	$price=$fetchedoldvalue['price'];
	$quantity=$fetchedoldvalue['quantity'];
	$category_id=$fetchedoldvalue['category_id'];
	$seller_id=$fetchedoldvalue['seller_id'];
	$tag=$fetchedoldvalue['tag'];
	$expiry_date=$fetchedoldvalue['expiry_date'];
	$description=$fetchedoldvalue['description'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
<label>ItemName*</label>
<input type="text" name="name" value="<?php echo $name ?>"required>		
<label>Price*</label>
<input type="text" name="price" value="<?php echo $price ?>" required>
<label>Quantity*</label>
<input type="text" name="quantity"value="<?php echo $quantity ?>" required>
<label>Category*</label>
<select name="category_id" id="category_id"value="<?php echo $category_id?>" required>
	<?php
	foreach($category_value as $value){?>
	<option <?php if($category_id==$value["id"]){echo 'selected="selected"';} ?>value=<?php print_r($value["id"]); ?> ><?php print_r($value["category_name"]); ?></option>
<?php	
}
?>	
	
</select>
<label>Expiry Date</label>
<input type="date" name="expiry_date"value="<?php echo $expiry_date ?>">
<label>Description</label>
<input type="text" name="description"value="<?php echo $description ?>" required>
<label>Tags*</label>
<input type="text" name="tag" value="<?php echo $tag ?>">
<input type="submit" name="saveitem" value="Edit Item">
</form>

</body>
</html>
<?php
if(isset($_POST['saveitem'])){
	$pname=$_POST["name"];
	$pprice=$_POST["price"];
	$pquantity=$_POST["quantity"];
	$pexpiry_date=$_POST["expiry_date"];
	$pdescription=$_POST["description"];
	$insertitems="UPDATE product set name='$pname', price='$pprice',quantity='$pquantity',expiry_date='$pexpiry_date', description='$pdescription' where id='$idtoedit' ";

	$insertitems_value=mysqli_query($con,$insertitems);
	if(!$insertitems_value){
		die(mysqli_error($con));
	}else{
		header('location:myitems.php');
	}
}

?>