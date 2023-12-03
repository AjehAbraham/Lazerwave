<?php
session_start();

if(isset($_SESSION["New_user"])){


      header("Location: dashboard-home");
      exit;
}else{


      if(isset($_COOKIE["userId"]) && isset($_COOKIE["Token"])){

header("location: Authentication");
exit;


      }


}

?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/login.css">
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
<title>Login</title>



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
      
    </noscript>;



      <div class="form-container">

<h1>Login</h1>

<h2>Hi,welcome back</h2>

<p style="color: red;" class="error_message"><?php //echo $is_valid;  ?></p>

<form id="FormData">


<label><b>Email:</b></label>
    <br>
    <input type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>" autocomplete="on" name="email" placeholder="Email...">
    <br>

<label><b>Password:</b></label>
    <br>
    <input type="password" autocomplete="on" name="password" placeholder="password...">
    <br>

    <p class="remember-me"><input type="checkbox" name="remember-me"> Remember me</p>
   
    <div class="login">
<input type="submit" value="Login"  >
</div>

</form>

<br>


<div class="sign-in">
<a href="Register"><input type="submit" value="Sign in" ></a></div>


<p class="password-reset"><a href="Reset-password">Forgot password ?</a></p>

</div>

</div>


<?php

require_once "Loader-refresh.php";

?>


<script src="Src/Js/Login.js"></script>
</body>
</html>