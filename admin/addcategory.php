<?php
include('../connection.php');
include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
if(isset($_POST['submit'])){
$CategoryName=$_POST["Categoryname"];
$selectcategory="SELECT category_name from categories where category_name='$CategoryName'";
$selectdata=mysqli_query($con,$selectcategory);
if($selectdata->num_rows!=1){
	$data="INSERT into categories(category_name)values('$CategoryName')";
	$insertdata=mysqli_query($con,$data);
	?>
	<script type="text/javascript">
	alert("Category is sucessfully inserted");
</script>
<?php
}
else{
	?>
	<script type="text/javascript">
	alert("Already Category is added");
</script>
<?php
}
}
$select="SELECT * from categories";
$allinformation=mysqli_query($con,$select);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.btn_edit{
			background:lightblue;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
			
		}
		.btn_remove{
			background:#FF6347;
			width:75px;
			height:45px;
			font-size: 20px;
			border-radius: 5px;
		}
		 body{
       overflow-x: hidden;
    }
    .btn_active{
			background:lightgreen;
			width:75px;
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
<form method="POST" style="transform: translateX(500px);">
	
		<h1><legend>Add Category:</legend></h1>
		<label>CategoryName*:<input type="text" name="Categoryname" required class="textbox"></label><br>
	
		<input type="Submit" style="height:30px; background: lightgreen; border-radius: 20px; padding:5px; " name="submit" value="Add" class="btn_active">
	
</form>
<table style="transform: translateX(400px);">
<?php
foreach ($allinformation as $value) {
?>
	<tr>
		<td><h3><?php print_r($value['category_name']);?></h3></td>
		<td><form method="Post" action="editcategory.php"><input type="hidden" name="categoryid" value="<?php print_r($value['id'])?>"><input type="submit" name="edit" value="Edit" class="btn_edit"></form></td>
		<td><form method="Post" action="deletecategory.php"><input type="hidden" name="categoryid" value="<?php print_r($value['id'])?>"><input type="submit" name="delete" value="Delete"  class="btn_remove"></form></td>
	</tr>

<?php
}
?>
</table>
</body>
</html>