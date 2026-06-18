<?php

//FIRST CHECK IF LINK IS PRESENT

if($_SERVER["REQUEST_METHOD"] == "GET"){

  if(isset($_GET["referalcode"])){
          
      $referal_code =htmlspecialchars($_GET["referalcode"]);
      
      if(!empty($referal_code)){  
  
  require_once __DIR__.("/db_connection.php");
  
  //FETCH REFERAL LINK //
  
  $select ="SELECT * FROM Refer_and_Earn WHERE Link_key ='$referal_code'";
  
  $result = mysqli_query($conn,$select);
  
  if(mysqli_num_rows($result)> 0){  

      //CODE MATCH ONE IN DATABASE//
      $code_result = mysqli_fetch_assoc($result);
          
      $details = "<br><label>Referal code</label>
      
  <input type='text' name='code' value='$code_result[Link_key]' readonly>  
      "
  ;
      
  }else{
      
      //NO CODE MATCH   
      $details = "";
      
  }
  
  
  }
  
  
  
  }
  
  
  }
  ?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="Src/Css/create-account.css">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Create Account</title>

<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->
 <link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>
      
<?php

//CHECK COOKIE POPUP//
if(isset($_COOKIE["uniqueID"]) && $_COOKIE["SessionID"] && isset($_COOKIE["status"])){

  //ALL NECCESSARY COOKIES HAVE BEEN ACCEPTED//

}else{

require_once "cookie-banner.php";
  
}
require_once "default_sidebar.php";
?>

  
<div class="form-container-fluid">

<h2>Create Account</h2>

<form id="FormData">

<label>Email</label>

<input type="email" autocomplete='on' name="email" placeholder="Your email address....">
<br>
<div class="custom-select">
<label><b>Country</b></label>
<select name="country" class="select">
<option></option>
<option>Ghana</option>
<option>South Africa</option>
<option>Nigeria</option>
</select>
</div>
<br>
<?php
if(isset($details)){
    
    echo $details;
    
}
?>
<label>Password</label>

<input type="password" name="password" onkeyup="verifypass()" id="passw" placeholder="Enter  8 digit password...."autocomplete="off">

<label><input type="checkbox" onclick="passwordReveal()"><b class="show_passowrd_text">Show password</label>

</div>
<div class="validate-data-container">
<p class="check1"><i class="fa fa-close" id="box1"></i> Lowercase letter</p>
<p class="check2"><i class="fa fa-close" id="box2"></i> A Capital(Uppercase) letter</p>
<p class="check3"><i class="fa fa-close" id="box3"></i> A Number</p>
<p class="check4"><i class="fa fa-close" id="box4"></i> A Minimum 8 in length</p>
<p class="check5"><i class="fa fa-close" id="box5"></i> At least one special charater</p>
</div>

<div class="form-container-fluid">
<p><input type="checkbox"name="terms" value="yes" > i have agreed to the terms and conditions. </p>

<p><a href="#">
Terms and conditions</a></p>

<b class="error_message"></b>
<input type="submit" value="create account">
</form>
<p class="login-btn">Already have an account? <a href="Login">Login</p></a>
</div>

<?php require_once "Loader-refresh.php"; ?>

<script src="Src/Js/create-account.js"></script>

<?php 
include __DIR__.("/Non-script.php"); 
        
require_once __DIR__.("/Network.php");
        
require_once __DIR__.("/footer.php") ?>

</body>
</html>

