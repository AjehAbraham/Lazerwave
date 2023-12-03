<?php
require_once __DIR__.("/sessionPage.php");


?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Receive-money.css">
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

<title>Receive money</title>
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
require_once __DIR__.("/Network.php");?>


<div class="header">
<span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>

<a href="dashboard-home">
<i class="fa fa-home"></i></a>

</div>


<div class="send-money-container-fluid">

<p onclick="show_acct_no()"><i class="fa fa-bank"></i> Bank Transfer 
</p>

<h3 class="acct_no">
    Account name: <?php echo $user["Surname"] ." " .$user["Last_name"]. " ".$user["First_name"]; ?>
    
    <br>
    
Account no: <?php echo  $user['Account_no'] ?><br> 
Bank: Lazerwave
<br>
<b id="copy-btn">
<i class="fa fa-copy"></i>copy</b></h3>

<input type="text" style="display:none" value="<?php echo $user['Account_no']?>"  id="myInput">






<p><i class="fa fa-credit-card"></i>
 <a href="Top-up">Card top up</a></p>


<p><i class="fa fa-money"></i>  <a href="Request-money">Request money</a></p>

<p><i class="fa fa-link"></i> <a href="create-payment-link" target="blank">Create payment link</a></p>

<p onclick="alert('coming shortly')"><i class="fa fa-qrcode"></i> Scan QR code</p>
 

</div>

<?php require_once "Network.php";

require_once __DIR__.("/Non-script.php"); 
?>

<script src="Src/Js/Receive-money.js"></script>

</body>
</html>
