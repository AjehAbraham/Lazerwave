<?php
session_start();
//var_dump($_SESSION);

if(!isset($_SESSION["reg_auth"])){


    header("Location:Login");
    exit;

}else{


//CHECK IF USER HAS FULLY REGISTER//


require_once "db_connection.php";

$select = "SELECT * FROM Register_db WHERE Email='$_SESSION[reg_auth]'";

$result = mysqli_query($conn,$select);

if(mysqli_num_rows($result) > 0){

//USER HAS FULLY REGISTER//

unset($_SESSION["reg_auth"]);

header("Location: Login");
exit;


}else{

//DO NOTHING//


}

mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Finish-profile.css">
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
<title>Just a moment</title>



<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>

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



<div class="container-image">
    

<div class="form-container-fluid">

<h2>Finish setting up your profile</h2>

<form id="FormData" onsubmit="return false">

<label>Surname</label>

<input type="text" name="surname" placeholder="Your surname....">
<br>
<label>Lastname</label>

<input type="text" name="lastname" placeholder="Your Middle name....">

<br>


<label>Firstname</label>

<input type="text" name="firstname" placeholder="Your name....">
<br>

<label>Gender</label>
<b>
Male
<input type="radio" name="gender" value="Male">
Female 
<input type="radio" name="gender" value="Female"></b>
<br>

<div class="select-type">
  <b>Choose your Account type</b>
    <ul>
      <li>
        <input type="radio" id="check_1" name="type" value="check_1">
        <label for="check_1">Current Account</label>
      </li>
      <li>
        <input type="radio" id="check_2" name="type" value="check_2">
        <label for="check_2">Savings Account</label>
      </li>
      <li>
        <input type="radio" id="check_3" name="type" value="check_3">
        <label for="check_3">Business Account</label>
      </li>
      <li>
        <input type="radio" id="check_4" name="type" value="check_4">
        <label for="check_4">Fixed Deposit Account</label>
      </li>
    </div>

<b class="error_message"></b>
<input type="submit" value="create account">
</form>
</div>
  

<?php require_once "Loader-refresh.php"; ?>

<script>
    

$(document).ready(function (e) {
      
      $("#FormData").on('submit', (function(e){
      
      
        e.preventDefault();
        
      document.querySelector(".loader-overlay-refresh").style.display= "block";
      
         $.ajax({
       
          url: 'Process/Register-user',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
        document.querySelector(".loader-overlay-refresh").style.display= "none";
      
           document.querySelector(".error_message").innerHTML = Data;
      
if(Data == "success"){
    document.querySelector(".error_message").innerHTML = "";

  window.location.href = "dashboard-home";


}else if(Data == "\r\nsuccess"){

    document.querySelector(".error_message").innerHTML = "";

  window.location.href = "dashboard-home";


}



           
          },
          error:function(Data){
           document.querySelector(".loader-overlay-refresh").style.display= "none";
      
            document.querySelector(".error_message").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      
        });

        //COMPELETE  FORM//


        
 function Checkmode(){
 
 var current_mode = localStorage.getItem("Theme");
 
 if(current_mode == "Dark-mode"){
 
 
 var dark = document.body;
 
 dark.classList.add("Dark-mode");
 
 
 document.querySelector("#theme").checked= true;
 
 
 }else{
 
 var dark = document.body;
 
 dark.classList.add("Light-mode");
 
 document.querySelector("#theme").checked= false;
 
 
 
 
 }
 
 
 }
 
 var mode = Checkmode();
 
 
 
        </script>


<?php //include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>
                </body>
                </html>