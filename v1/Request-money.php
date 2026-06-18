<?php

require_once __DIR__.("/sessionPage.php");


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Request-money.css">
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

<title>Request Money</title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
</head>
<body>
   
<?php require_once "default_sidebar.php";?>

<div class="form-container-fluid">

<h1><i class="fa fa-money"></i>Send Request</h1>

<p>Note you can send money request  by using
either the username or account number of who you want to send request.</p>

<form id="FormData">

<label><b>Username/Acct no</b>
</lable>
<br>

<input type="text" placeholder="Username or Acct no..." name="request" oninput="Verify_username()">

<p class="username_error"></p>

<label><b>Amount</b>
</label>
<br>
<input type='number' placeholder='Amount...' name='amount' inputmode='numeric'>

<p style=" text-align: center;" class='dataLog' onclick='fecthData()'>Request</p>

</form>

</div>


<p class='error_message'></p>

<?php require_once "Loader.php"; 

        require_once __DIR__.("/Non-script.php"); 
        require_once __DIR__.("/Network.php");
        
                ?>
           <?php require_once "Loader-refresh.php"; ?>

<script src="Src/Js/request-money.js"></script>

</body>
</html>