<?php
session_start();


if(isset($_SESSION["New_user"])){


header("Location: dashboard-home");
exit;

}

//CHECK IF YOU REDIECT USER OR IS A FAKE REDIRECT//

if(isset($_SESSION["Refresh_session"])){

//NOW CHECK SESSION COOKIE IF IT IS VALID //

if(isset($_COOKIE["Refresh_session"])){

//NOW CHECK IF COOKIE MATCH//

$refresh =
htmlspecialchars($_COOKIE["Refresh_session"]);



if(password_verify($refresh,$_SESSION["Refresh_session"]) == "password_hash"){


//LOGIN CREDIENTIAL IS VALID 


//NOW FETCH THE LOGIN DETAILS FROM COOKIE AND COMPARE TO DATABASE OWN//


if(isset($_COOKIE["userId"]) && isset($_COOKIE["Token"])){

//FIND USER DETAILS FROM DB AND SIGN IN USER//


require_once "db_connection.php";



$cook = htmlspecialchars($_COOKIE["userId"]);

$cook = mysqli_real_escape_string($conn,$cook);
$cook = trim($cook);
$cook = stripslashes($cook);


$check ="SELECT * FROM  Register_db WHERE id ='$cook'";

//$result = $conn -> query($check);
$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){


$results = mysqli_fetch_assoc($result);

//RESULT WAS FOUND//








}else{


//USER HAS TEMEPER COOKIE WE NEED TO REDIRECT//


// session_destroy();
unset($_SESSION["Refresh_session"]);

unset($_COOKIE["Refresh_session"]);


setcookie("Refresh_session","",time() -86400);


header("Location: logout");

exit;

}




}








}
}








}else{

header("Location: Login");
exit;


}



?>



<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Refresh-session.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

<title>Refresh session</title>
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
      
    </noscript>


<div class="refresh-session-container">

<p>Your session has expired.</p>

<p>Hello <?php echo $results["Surname"]; ?>,Welcome back.</p>

<p>Continue using <?php echo $results["Email"]; ?></p>


<p class="error_message"> </p>

<form id="FormData">
<input type="email" name="email" value="<?php echo  $results['Email']; ?>" style="display: none">

<label><b>Password</b></label>
<br>
<br>

<input type="password" name="password" placeholder="Your password">

<p>
<input type="checkbox" value="on" name="remember-me"> Remember me</p>



<input type="submit" value="Login">
</form>





<p><a href="Reset-password">Forgot password?</a></p>

<p><a href="logout">Login  in with a diffrent account</a></p>


</div>



<?php

require_once "Loader-refresh.php";

?>


<script>
            
 function Checkmode(){
 
 var current_mode = localStorage.getItem("Theme");
 
 if(current_mode == "Dark-mode"){
 
 
 var dark = document.body;
 
 dark.classList.add("Dark-mode");
 
 
 
 }else{
 
 var dark = document.body;
 
 dark.classList.add("Light-mode");
 
 
 
 }
 
 
 }
 
 var mode = Checkmode();
 
 </script>


<?php
// include __DIR__.("/Non-script.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>

<script src="Src/Js/refresh-session.js"></script>
</body>
</html>

