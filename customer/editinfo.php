<?php
session_start();
include 'nav.php';
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
$customer_id=$_SESSION['customerid'];
$selectseller="SELECT * from customer where id=$customer_id";
$selectsellerquery=mysqli_query($con,$selectseller);

?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
  body {
  box-sizing: border-box;
  height: 200px;
  margin: 20px 
  padding: 20px;
  background-color: white;
}
.signupFrm {
  display:flex;
  justify-content: center;
  align-items: center; 
    transform: translatey(100px);
}
.form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px;
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}

.inputContainer {
  position: relative;
  height: 30px;
  width: 90%;
  margin-bottom: 17px;
  
}
/* Style the inputs */

.input {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 2px solid #7c7f82;
  border-radius: 10px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}
::placeholder {
  color: transparent;
}

.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #d3d7db;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}
.submitBtn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: #34a4eb;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.submitBtn:hover {
  background-color: #61eb34;
  transform: translateY(-2px);
}
	</style>
</head>
<body>
	<?php foreach($selectsellerquery as $value){?>
<div class="signupFrm">   
    <form method="post" action="" name = "adminloginform" onsubmit="return Validate()" class="form">
      <h1>Edit Information</h1>
      <div class="">
	</div>
      <div class="inputContainer">
        <input type="text" name="name" class="input" value="<?php echo $value['name']; ?>"  required>
        <label for="" class="label">Fullname:</label>
      </div>
      <div class="inputContainer">
        <input type="text" class="input" name="email" value="<?php echo $value['email'];?>" pattern="([a-z A-Z]{3,})?([0-9])*@([a-z]{3,7}).([a-z]{3,7})?(.[a-z]{1,5})?(.[a-z]{1,5})" required>
        <label for="" class="label">Email</label>
      </div>
      <div class="inputContainer">
        <input type="text" class="input" name="address" value="<?php echo $value['address'];?>"  required>
        <label for="" class="label">Address</label>
      </div>
      <div class="inputContainer">
        <input type="text" class="input" name="contact_number" value="<?php echo $value['contact_number'];?>"  pattern="9[78][0-9]{8}" required>
        <label for="" class="label">Contact no:</label>
      </div>
      <input type="submit" name="ok" class="submitBtn"  value="Enter" >
 
    </form>
</div>
	
<script type="text/javascript">
  
function Validate() {
         var pass = document.adminloginform.password.value;
        var confirmPass = document.adminloginform.confirmpassword.value;
        var error = false;
        if (pass!= confirmPass) {
            error=true;
            alert("Passwords do not match.");  
        }
          if(error == true){
          return false;
        }
            else{
          return true;
        }
        
    }
    
</script>
</body>


</html>
    <div class="cccc">
    <?php
        if(isset($_POST['ok'])){

            $name = $_POST['name'];           
            $email = $_POST['email'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $dml = "UPDATE customer set name='$name',email='$email',address='$address',contact_number='$contact_number' where id=$customer_id";
               if(!mysqli_query($con,$dml)){
                die(mysqli_error($con));
              
              }
              else{?>
                <script type="text/javascript">
              alert("Information is edited sucessfully");
            </script>
            <?php }
        }
      }
          ?>
        </div>