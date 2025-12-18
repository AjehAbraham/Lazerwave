<?php
require_once __DIR__.("/sessionPage.php");

?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Top-up.css">
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

<title>Card top up</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>

</head>
<body>


<div class="form-container">

<h1>Top up balance</h1>
<br>
<form id="FormData">

<label>Card number </label>

<input type="number" name="card_no" placeholder="XXXXXXXXXXXXXXX" inputmode="numeric">
<br>


<label style="float: left;">Expiry date </label>
<label style="float:;">CVV </label>

<input type="text" name="Exp"style='-webkit-text-security:disc; width: 45%;display: inline;margin: auto;' placeholder="XXXX" inputmode="numeric" maxlength="4">

<input type="text" name="cvv" style='-webkit-text-security:disc; width: 45%;display: inline;margin: auto;' placeholder="XXX"inputmode="numeric" style="-webkit-text-security:disc;" maxlength="3">
<br>
<label>Amount </label>

<input type="number" name="amount" inputmode="numeric" p;aceholder="...">
<br>

<input type="submit" value="Top up">

</form>


</div>

<p class="error_message" style='text-align: center;color: red;'></p>

<?php require_once "Loader-refresh.php"; ?>

<p style="text-align: center">Supported cards <i class="fa fa-flash" style="color: red"></i></p>


<?php //include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");
        require_once __DIR__.("/Non-script.php"); 
                ?>
<script src="Src/Js/Top-up.js"></script>

</body>
</html>
