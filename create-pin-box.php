<?php
$fileNames = $_SERVER["SCRIPT_NAME"];

$fileNames = basename($fileNames,".php");

//echo "<title>$fileNames</title>";

?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/create-payment-link.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!--ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">


<!-- AUTO INCREASE TEXT AREAS SIZE-->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.3.min.js"></script>

<!--END OF TEXT AREA -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
<title><?php echo $fileNames;?></title>
</head>
<body>
<style>
    .container-container-pin-fluid{

        overflow: hidden;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  width: 100%;
  font-size: 13px;
text-align: center;
background-color: white;
z-index: 2;
position: fixed;
transition: 0.2s;


    }
    .container-container-pin-fluid input[type=number],input[type=numeric]{
padding: 8px 8px;
font-size: 18px;
border-radius: 2rem;
border: 2px solid #ccc;
margin: auto;
display: block;
width: 70%;
outline: 0;
    }
    .container-container-pin-fluid input[type=submit]{

cursor: pointer;
        padding: 8px 8px;
font-size: 15px;
border-radius: 2rem;
margin: auto;
display: block;
width: 50%;
background-color: rgb(0,0,20);
color: white;
border: none;
    }
    @media screen and (min-width: 600px){
        .container-container-pin-fluid input[type=number],input[type=numeric],input[type=submit]{

            font-size: 13px;
            width: 40%;
        }
        
    }
    
    @media screen and (min-width: 600px){
        .container-container-pin-fluid input[type=submit]{
            width: 40%;
        }
        }
        .PinError{
            text-align: center;
            color: red;
        }
        .container-container-pin-fluid h1{
            text-align: center;
        }
        .Dark-mode  .container-container-pin-fluid{
            background-color: rgb(0,0,20);
        }
        .container-container-pin-fluid h1{
            font-size: 15px;
        }
       .Dark-mode .container-container-pin-fluid input[type=submit]{
            background-color: mediumseagreen;
        }
    </style>

<div class="container-container-pin-fluid">
<h1>Create Transaction Pin</h1>
<form id="FormDataPin">
<label><b>New pin</b></label><br>
<input type='numeric' name='new_pin' placeholder="Create new pin"
 style="-webkit-text-security:disc;" inputmode="numeric" maxlength='4'><br>

<label><b>Confirm pin</b></label><br>

<input type='numeric' name='confirm-pin' style="-webkit-text-security:disc;" 
inputmode="numeric" placeholder="Re-enter new pin" maxlength='4'>

<br>
<input type='submit' value='create pin'>
</form>

<p class="PinError"></p>
</div>

    
<script>
  $(document).ready(function (e) {
        
        $("#FormDataPin").on('submit', (function(e){
        
        
          e.preventDefault();
          
        document.querySelector(".loader-overlay-refresh").style.display= "block";
        
           $.ajax({
         
            url: 'Process/Auth-security/Create-transaction_pin',
        type : 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
            success:function(Data){
        
          document.querySelector(".loader-overlay-refresh").style.display= "none";
        
             document.querySelector(".PinError").innerHTML = Data;
   
  if(Data == "success"){
    document.querySelector(".PinError").innerHTML = "";

    
    document.querySelector(".container-container-pin-fluid").style.width = "0%";
    document.querySelector("#FormDataPin").reset();

    alert("Transaction Pin created");

  }else if(Data == "\r\nsuccess"){

    document.querySelector(".PinError").innerHTML = "";

    document.querySelector(".container-container-pin-fluid").style.width = "0%";

    document.querySelector("#FormDataPin").reset();

  alert("Transaction Pin  created");

  }

  
             
            },
            error:function(Data){
             document.querySelector(".loader-overlay-refresh").style.display= "none";
        
              document.querySelector(".PinError").innerHTML = Data;
        
            }
          
           });
        
        
        
        }));
        
        
          });
  
          function OpenPin(){
       
    
document.querySelector(".container-container-pin-fluid").style.width = "100%"

          }

       var  OpenPinBtn = setTimeout(OpenPin,3000);

              </script>

              <?php require_once "Loader-refresh.php"; ?>