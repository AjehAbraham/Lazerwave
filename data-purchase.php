<?php 
require_once __DIR__.("/sessionPage.php");
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/data-purchase.css">
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
<title>Data purchase</title>



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
 
         <div class="Top-nar-bar">
      <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
         
      <a href="dashboard-home"><i class="fa fa-home"
></i>
       </a>
</div>
  


<div class="data-container">
<span> <img src="Images/Netwokr-image.png"></span>

<h1>Data Purchase</h1>


<form  id="FormData">
 <label><b>Phone number:</b></label>
 <br>
 <input type="tel" name="Tel" >

 <br>

 <label><b>Network:</b></label>
 <br>
 <select name="Provider" onchange="Fetch_data()">
     <option></option>

     <option>MTN</option>
     
     <option>AIRTEL</option>
     
     <option>GLO</option>
     
     <option>9MOBILE</option>


     </select>
     <br>

     <b class="error_message"></b>  

  </div>
  <p class="error_message_data" style='color: red;'></p>
  

  <?php require_once "Transaction-pin-box.php";

  echo "</form>";

  require_once "Loader.php";
  require_once "Loader-refresh.php";
  
  require_once __DIR__.("/Non-script.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>
      <script src="Src/Js/data-purchase.js"></script>
    
  </body>
  </html>