<?php
include '../connection.php';
include('mainpage.php');
$admin_id=$_SESSION['sellerid'];
$path=__DIR__;
$getcategory="Select * from categories";
$category_value=mysqli_query($con,$getcategory);
if(!$category_value){
	die(mysqli_error($con));
}

if(isset($_POST["saveitem"])){
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path."/itemsphoto"."/".$_FILES["photo"]["name"]);


	$name=$_POST["name"];
	$photo='/ecommerce/seller/itemsphoto/'.$_FILES["photo"]["name"];
	if($_FILES["photo"]["name"]==""){
		$photo=$oldphoto;
	}
	$price=$_POST["price"];
	$quantity=$_POST["quantity"];
	$category_id=$_POST["category_id"];
	$seller_id=$admin_id;
	$tag=$_POST["tag"];
	$expiry_date=$_POST["expiry_date"];
	$description=$_POST["description"];

	$insertitems="Insert into product(name,photo,seller_id,category_id,price,tag,quantity,expiry_date,description,status) values('$name','$photo','$seller_id','$category_id','$price','$tag','$quantity','$expiry_date','$description',1);";

	$insertitems_value=mysqli_query($con,$insertitems);
	if(!$insertitems_value){
		die(mysqli_error($con));
	}

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
    .btn_active{
			background:lightgreen;
			width:140px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
		}
		.textbox{
			width: 300px;
			height: 40px;
			border-radius:10px;
			transform: translateX(20px);
			background-color: #FFF5D1 ;
		}
	</style>
</head>
<body>
<form method="POST" enctype="multipart/form-data" >
	<fieldset style="width: 500px; transform: translateX(500px);">
		<legend><h2>Add Product:</h2></legend>
<label><b>ItemName:*</b></label>
<input type="text" name="name" required class="textbox" style="height: 50px;"><br><br>	
<label><b>Photo:*</b></label>
<input type="file" name="photo" accept="image/x-png,image/jpeg" required ><br><br>	
<label><b>Price:*</b></label>
<input type="text" name="price" required class="textbox" style="height: 50px;  transform: translateX(60px);"><br><br>
<label><b>Quantity:*</b></label>
<input type="text" name="quantity" required class="textbox" style="height: 50px;  transform: translateX(30px);"><br><br>
<label><b>Category:*</b></label>
<select name="category_id" id="category_id" required><br><br>
	<?php
	foreach($category_value as $value){?>
	<option value=<?php print_r($value["id"]); ?> ><?php print_r($value["category_name"]); ?></option>
<?php	
}
?>	
	
</select><br><br>
<label><b>Expiry Date:</b></label>
<input type="date" name="expiry_date" class="textbox" style="height: 50px;"><br><br>
<label><b>Description:</b></label>
<input type="text" name="description" required class="textbox" style="height: 50px;"><br><br>
<label><b>Tags:*</b></label>
<input type="text" name="tag" class="textbox" style="height: 50px; transform: translateX(65px);"><br><br>
<input type="submit" name="saveitem" value="Add Item" class="btn_active">
</fieldset>
</form>
</body>
</html>