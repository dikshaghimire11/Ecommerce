<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['sellerid'])){
  die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <!--boostrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <!--   <img src="../ecommerce.jpg" alt="" class="logo" style="width: 2%;height: 2%;"> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-5 mb-lg-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sellerdashboard.php">Dashboard</a>
        </li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="additem.php">Add Items</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="myitems.php">My Products</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="orders.php">Orders</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="editinfo.php">Edit</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
           
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

<!--third child-->
<div class="bg-light">
<h3 class="text-center">Hamro Pasal</h3>


</div>

<!--fourth child    nav bar-->

    
  <!--sidenav-->



<!--  -->

<!--bootstrap js link--> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>