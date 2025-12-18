<?php require_once __DIR__.("/sessionPage.php");


?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/virtualCard.css">
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
<title>VirtualCard</title>


<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>
     <?php require_once "default_sidebar.php";?>

      <div class="virtual-card-container">

<h1>Create Virtual Card <i class="fa fa-credit-card"></i></h1>


<p>Please enter a 4 digit secret pin for your virtual card</p>

<label><b>Pin</b></label>
<br>

<form  id="V_FormData">

<input type="number" name="pin"
inputmode="numeric" style="-webkit-text-security:disc;" maxlength="4" placeholder="create card pin..."><br>

<br>
<lable><b>Type</b></label><br>
<select name="type">
  <option></option>
  <option>Debit Card</option>
  <option> Credit Card</option>
</select>
<br><br>

<p>Note you will be charge a fee of ₦1,000 for this service.</p>


<p class="Open-pin" onclick="Open_pin_box()" >Validate</p>


    <?php require_once "Transaction-pin-box.php";
    echo "</form>";

 require_once "Loader.php"; 

 include __DIR__.("/Non-script.php");
        
require_once __DIR__.("/Network.php");

        ?>
<script src="Src/Js/VirtualCard.js"></script>

</body>
</html>



