<?php
include('nav.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    body{
       overflow-x: hidden;
    }
    .Section_top{
 height: 600px;
    background-image: url(images/clothes.jpg);
    background-position: center;
    background-size: cover;
    text-align: center;
    justify-content: center;
    animation: animated 10s infinite ease-in-out;
}
.content{
    top: 50%;
    left: 50%;
    transform: translate(0%, 200%);
    text-transform: uppercase;

}
.content h1{
    color: black;
    font-size: 25px;
    letter-spacing: 5px;
}
.content a{
    background: #85c1ee;
    padding: 10px 24px;
    text-decoration: none;
    font-size: 18px;
    border-radius: 20px;
}
.content a:hover{
    background: #034e88;
    color: #fff;
}
.footer{
  background-color: lightblue;

}
@keyframes animated{
    0%
    {
        
           background-image: url(images/clothes.jpg);

    }
    20%
    {
          background-image: url(images/dairy.jpg);
         }
    40%
    {
       background-image: url(images/makeup.jpg);
    }
    60%
    {
      background-image: url(images/vegetabls.jpg);
    }
    80%
    {
        
          background-image: url(images/computer.jpg);
    }
    100%
    {
         background-image: url(images/cake.jpg);
    }
  </style>
</head>
<body>
<!--fourth child    nav bar-->
<div class="Section_top">
        <div class="content">
            <h1>Looks so Good on the Outside,</h1>
            <h1> It'll Make You Feel Good Inside.</h1>
            <a href="loginform.php?source=3">Shop Now</a>
        </div>
    </div> 
    <div class="footer">
      <h1 style="transform: translateX(600px);">Contact us:</h1>
      <p style="transform: translateX(600px);">Email: hamropasal@gmail.com</p>
       <p style="transform: translateX(600px);">Contact Number: 9845115153 </p>
      <p style="transform: translateX(600px);">Copyright@2022 diksha All Rights Reserved </p>
    </div>
</body>
</html>