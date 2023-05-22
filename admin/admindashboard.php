<?php
include ('../connection.php');
include('mainpage.php');
if(!isset($_SESSION['adminid'])){
	die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
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
  </style>
</head>
<body>
	<div class="titl">

    <!-- //Welcoming a user.. -->
 <h1 style="transform: translateX(400px);">Welcome Admin </h1></br>
  <div class="ttt" style="transform: translateX(400px); font-size: 50px;"><p><strong>Today is:</strong></p> <!-- todays date -->
        
                        
                        <?php
                        $Today =  date('Y-m-d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                   
               </div>
    
  </div>
</body>
</html>