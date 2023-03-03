<?php

require_once __DIR__.("/sessionPage.php");
?>




<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="">
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
<title>Status</title>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>


      <script>

     
        function Open_account_limit_pop_up(){


          document.querySelector(".account-limit-overlay-container").style.display ="block";


          
        }



        function Close_account_limit_pop_up(){


document.querySelector(".account-limit-overlay-container").style.display="none";


          
        }

        </script>






<p onclick="Open_account_limit_pop_up()">open limit</p>


      <div class="account-limit-overlay-container">

      <div class="account-limit-container">
<p onclick="Close_account_limit_pop_up()"><i class='fa fa-close'></i></p>

      <h1>Account limit </h1>



      <?php 

//CHECK USER LIMIT//

$acct_limit_check = "SELECT * FROM More_information WHERE User_id ='$_SESSION[New_user]'";

$result_limit_check = $conn -> query($acct_limit_check);


if ($result_limit_check -> num_rows > 0){


$daily_limit = $result_limit_check -> fetch_assoc();

echo "<p>Your are on KYC2</p>";



}else{

//USER IS STILL IN KYC1

//CJECK THEIR DAILY LIMIT AND SEND RESPONSE//


$kyc1 = "SELECT * FROM Account_limit WHERE User_id = '$_SESSION[New_user]'";


$kyc1_result = $conn -> query($kyc1) -> fetch_assoc();








}

      ?>
      
      <p>Kyc 1 </p>
      <div class='Kyc1-container'>#20,000 daily</div>


      <p>Kyc 2 </p>
      <div class='Kyc2-container'>#100,000</div>



      <p>Kyc 3 </p>
      <div class='Kyc3-container'>Unlimited</div>




</div>
</div>

<style>

  .account-limit-overlay-container{
position: fixed;
background-color: rgba(0,0,0,0.4);
left: 0;
right: 0;
top: 0;
bottom: 0;
z-index: 2;
overflow: scroll;
display: none;
  }
.account-limit-container{
background-color: white;
padding: 10px 10px;
margin-top: 10%;
margin-left: auto;
margin-right: auto;
width: 85%;
text-align: center;
margin-bottom: 10%;
}
.account-limit-container p{

  font-size: 23px;
}
.account-limit-container h1{
  color: rgb(0,0,180);
}
.Kyc1-container{
  padding: 12px 12px;
  background-color: mediumseagreen;
  border-radius: 2rem;
  color: white;
}

.Kyc2-container{
  padding: 12px 12px;
  background-color: mediumseagreen;
  border-radius: 2rem;
  color: white;
}

.Kyc3-container{
  padding: 12px 12px;
  background-color: mediumseagreen;
  border-radius: 2rem;
  color: white;
  margin-bottom: 10%;
}
i{
  cursor: pointer;
}
  </style>x

  

<label class="switch">
  <input type="checkbox">
  <span class="slider"></span>
</label>


<style>
.switch{
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;

}

.siwtch input{
  opacity: 0;
  width: 0;
  height: 0;
}
.slider{
  position: absolute;
  cursor: pointer;
  top: 0;
  right: 0;
  bottom:0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider{
  background-color:  #2196F3;
}
input:focus + .slider{

  box-shadow: 0 0 1px #2196F3;

}

input:checked + .slider:before{
  -webkit-transform: translateX(25px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider.round{
  border-radius: 34px;
}

.slider.round:before{
  border-radius: 50%;
}

  </style>



<div class="login-container-fliud">

<p>Welcome to the future !</p>

<!--img src="images\image.jpeg"-->

</div>

<style>
  .login-container-fliud{

padding: 50px;
/*background-color: mediumseagreen;*/
background-color: rgb(0,0,52);
text-align: center;
color: white;
/*background-image: url("images\image.jpeg");*/
  }
.login-container-fliud p{
  text-align: center;
  font-size: 20px;
  font-family: 'Tilt Prism', cursive;
border-bottom: 10px;
}
  </style>