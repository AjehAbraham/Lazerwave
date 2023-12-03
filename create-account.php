<?php

//FIRST CHECK IF LINK IS PRESENT

if($_SERVER["REQUEST_METHOD"] == "GET"){

  if(isset($_GET["referalcode"])){
      
      
      $referal_code =htmlspecialchars($_GET["referalcode"]);
      
      if(!empty($referal_code)){
  
  
  
  require_once __DIR__.("/db_connection.php");
  
  //FETCH REFERAL LINK //
  
  
  $select ="SELECT * FROM Refer_and_Earn WHERE Link_key ='$referal_code'";
  
  //$result = $conn -> query($select);
  
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
    <link rel="stylesheet" href="Src/Css/create-account.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
      </head>

      <body>
      
<?php

//CHECK COOKIE POPUP//
//var_dump($_COOKIE);
if(isset($_COOKIE["uniqueID"]) && $_COOKIE["SessionID"] && isset($_COOKIE["status"])){


  //ALL NECCESSARY COOKIES HAVE BEEN ACCEPTED//


}else{

require_once "cookie-banner.php";
  
}
?>

      
<noscript>
<div class='noscript'>
    <p> <i class="fa fa-warning"></i> Your browser doesn't support JavaScript or javascript appear to have been turn off,please go to your browser setting to turn javascript ON.</p>
    </div>
      <style>
      .noscript{background:black;color: white;
      
      position: fixed; 
      top: 0; 
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 27px;
      width: 100%;
      height: 100%;
      z-index: 4;
          
          
      }
      noscript i{
        color: red;
      }
      </style>
      
    </noscript>
    
        <div class="Top-nav-bar">
            <b><a href="dashboard-home"><i class="fa fa-home"></i></a></b>
           <!--b><a href="Login"> <i class="fa fa-user-circle"></i></a></b-->
</div>



 

<div class="form-container-fluid">

<h2>Create Account</h2>

<form id="FormData">

<label>Email</label>
<br>

<input type="email" autocomplete='on' name="email" placeholder="Your email address....">

<br>

<label>Password</label>
<br>

<input type="password" name="password" placeholder="Enter  8 digit password...."autocomplete="off">

<div class="custom-select">
<p>Country</p>

<select name="country" class="select">

<option></option>
<option>Ghana</option>
<option>South Africa</option>
<option>Nigeria</option>

</select>

</div>

<?php
if(isset($details)){
    
    echo $details;
    
}
?>



<p>
<input type="checkbox"name="terms" value="yes"> i have agreed to the terms and conditions. </p>

<p><a href="#">
Terms and conditions</a></p>

<b class="error_message"></b>
<input type="submit" value="create account">
</form>
<p class="login-btn">Already have an account? <a href="Login">Login</p></a>
</div>


<br><br>
<?php require_once "Loader-refresh.php"; ?>

<script src="Src/Js/create-account.js"></script>


<?php 
include __DIR__.("/Non-script.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>


  <?php require_once __DIR__.("/footer.php") ?>

</body>
</html>

