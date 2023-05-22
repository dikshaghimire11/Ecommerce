<?php
include '../connection.php';
include('mainpage.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
      .ttt{font-size: 20px;}
      .titl{
  position: absolute;
  top: 30%;
  left: 30%;
  transform: translate(10%,10%);


}
.titl h1{
  font-size:50px;

}
  </style>
</head>
<body>
		<div class="titl">

    <!-- //Welcoming a user.. -->
 <h1>Welcome <?php echo $_SESSION['sellername'];?> </h1></br>
  <div class="ttt"><p><strong>Today is:</strong></p> <!-- todays date -->
        
                        
                        <?php
                        $Today =  date('Y-m-d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                   
               </div>
    
  </div>

</body>
</html>