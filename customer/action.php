<?php
session_start();
$searchneeded=1;
include('nav.php');

if(!isset($_SESSION['customerid'])){
  die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
if(isset($_POST['searchbtn'])&& $_POST['keyword']!=""){
$serachkeyword= $_POST['keyword'];
}else{
    $serachkeyword="";
}

$customer_id=$_SESSION['customerid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    body{
      overflow-x: hidden; 
    }
  </style>
</head>
<body>
<div class="row">
<div class="col-md-2 bg-secondary p=0">
  <ul class="navbar-nav me-auto  ">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h2>Catagory</h2> </a>
    </li>

    <?php 
    $select_categories="select * from categories";
    $result_categories=mysqli_query($con,$select_categories);
   while($row_data=mysqli_fetch_assoc($result_categories)){
    $categories_title=$row_data['category_name'];
    $categories_id=$row_data['id'];
    ?>
    <form method="POST" action="action.php">
    	<input type="hidden" name="category_id" value="<?php echo $categories_id;?>">
    	<input type="submit" name="categoryname" value="<?php echo $categories_title;?>">
    </form>
    <?php
   }
   if(isset($_POST['categoryname'])){
   	$categoryid=$_POST['category_id'];
   }
   if($serachkeyword!=""){
    $select="SELECT product.id as product_id,product.photo as photo, product.name as name,product.description as description, product.price as price, product.quantity as quantity, seller.id,seller.status,product.status, seller.active, product. category_id as category_id  from product left join seller on product.seller_id=seller.id where tag like '%$serachkeyword%'and seller.status=1 and product.status=1 and seller.active=1";
}else{
$select="SELECT product.id as product_id,product.photo as photo, product.name as name,product.description as description, product.price as price, product.quantity as quantity, seller.id,seller.status,product.status, seller.active, product. category_id as category_id  from product left join seller on product.seller_id=seller.id where seller.status=1 and product.status=1 and seller.active=1 and category_id=$categoryid";
}
  //  echo $row_data['categories_title'];
   
   $data=mysqli_query($con,$select);
    while($row_data=mysqli_fetch_assoc($data)){
    $photo=$row_data['photo'];
    $id=$row_data['product_id'];
    $name=$row_data['name'];
    $description=$row_data['description'];
    $price=$row_data['price'];
    $quality=$row_data['quantity'];

    ?>
</div>
    <div class="col-md-3 mb-2"><div class="card" >
  <img src="<?php echo $photo;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Name:<?php echo $name;?></h5>
    <p class="card-text">Price: Rs.<?php echo $price;?></p>
    <p class="card-text">Description: <?php echo $description;?></p>
<form method="POST" action="addtocart.php">
    <label for="quantity">Quantity:</label><input type="number" name="quantity" required>
   <input type="hidden" name="customer_id" value="<?php echo $customer_id?>">
  <input type="hidden" name="product_id" value="<?php echo $id; ?>">
  <input type="submit" name="customername" value="Add to Cart" style="background-color: lightblue">
</form>
</form>
      </div>

</div>  <?php
}
?></div>
  </div>
</div>
</div>
</body>
</html>