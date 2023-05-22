<?php
if(isset($_GET['source'])){
$target=$_GET['source'];
}else{
	$target=1;
}
if($target==1){
	$target_name="Admin";
}
if($target==2){
	$target_name="Seller";
}
if($target==3){
	$target_name="Customer";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="loginform_style.css">
		<style type="text/css">
	body	{
			background-image:url("computer.jpg");
            background-size: cover;
		}
		#border{
			width: 530px;
			height: 300px;
			margin: auto;
			transform: translate(-18.5px,230px);
		padding: 10px;
		background-color: #DAE0F9;
		
		}
		.textbox{
			width: 200px;
			height: 20px;
			border-radius:10px;
			transform: translateX(20px);
		}
		.errorfield{
			color:red;

		}.link{
			text-decoration:none;
			color:blue;
		}

	</style>
</head>

<body>

	<form method="post"  name="loginform"action = "authentication.php" onsubmit = "return formValidation()">

<div id="border">
	
<h1><?php echo $target_name?> Login</h1>
<label>Email:</label>	
<input type="text" name="email" class="textbox">	
<center><p id="nameerror" class="errorfield" ></p></center>

<label>Password:</label>	
<input type="password" name="password" class="textbox"/>	
<center><p id="passerror" class="errorfield"></p></center>	
<input type="hidden" name="target" value="<?php echo $target?>">
<center><input type="submit" name="ok" value="Submit"  >
</center>
	
</div>
</center>
</form>
	
<script type="text/javascript">

	function formValidation(){
		var email=document.loginform.email.value;
		var password= document.loginform.password.value;
		var error=false;
		if(email==""){
			error=true;
			printErrorMessage("nameerror","Email can't be empty!!");
		}else{
			printErrorMessage("nameerror","");
		}
		if(password==""){
			error=true;
			printErrorMessage("passerror","Password can't be empty!!");
		}
		else{
			printErrorMessage("passerror","");
		}
		if(error==true){
			return false;
		}else{
			return true;
		}
 	}

 	function printErrorMessage(id,message){
 		document.getElementById(id).innerHTML=message;
 	}
 	


</script>
</body>
</html>
