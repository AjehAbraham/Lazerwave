<?php
require_once "sessionPage.php";


?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Transaction history.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!--ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link--> 


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

<title>Transaction History</title>
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


<div class="notification-header">
<i class="fa fa-cancel" style="cursor: pointer;" onclick="window.history.back()"></i>

<a href="dashboard-home"><i class="fa fa-home" style="float: right;"></i></a>


<h4 style="text-align: center;color: #666;">Transaction history <i class="fa fa-database" style="color: skyblue"></i></h4>


<form id="Form-Data">
<p class="refresh_notification">Refresh 
<i class="fa fa-refresh" ></i></p>


          
            <p>
              
              <select name="duration" onchange="Submit_category()" >
                <option>All Time</option>
                <option>This Week</option>
                <option>This Month</option>
            
</select>

<b>
  <select name="type" onchange="Submit_category_two()" class="select">
  <option>All</option>
    <option>Successful</option>
    <option>Failed</option>
</select></b>


</form>

        </div>


        <p class="error_message"></p>
        <style>
          
  

        <?php

require_once "Network.php";

 require_once "Loader-refresh.php"; 

 
require_once "Loader.php";
require_once __DIR__.("/Non-script.php"); 
 
?>


<script src="Src/Js/Transaction-history.js"></script>
</body>
</html>