<?php
session_start();
include('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> 
  
  <style type="text/css">
    <?php
include('style1.php');

    ?>
  </style>
</head>
<body>

  <div class="sidebar">
    <div class="sidebar-brand">
        <a href=""><img src="ecommerce.jpg"></a>
        <!-- <span style="color:white;font-size:30px;">Hamro Upachar</span> -->
      <h2><span class="lab la-hamroUpachar"></span>Hamro Pasal</h2>
      
    </div>
    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="admindashboard.php" class="active"><span class="las la-adjust"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="addcategory.php" class="active"><span class="las la-adjust"></span>
            <span>Category</span></a>
        </li>
        <li>
          <a href="sellernameview.php"><span class="las la-list"></span>
            <span>Seller List</span></a>
        </li>
        <li>
          <a href="newregistercontrol.php"><span class="las la-adjust"></span>
            <span>New Register</span></a>
        </li>
        <li>
          <a href="customerdetail.php"><span class="las la-list"></span>
            <span>Customer List</span></a>
        </li>
        <li>
          <a href="orders.php"><span class="las la-list"></span>
            <span>Orders</span></a>
        </li>

        <li>
          <a href="logout.php"><span class="las la-adjust"></span>
            <span>Logout</span></a>
        </li>
      </ul>
    </div>

  </div>
</body>
</html>