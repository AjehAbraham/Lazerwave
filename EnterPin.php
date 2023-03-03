
<?php 


//require_once __DIR__.("/Network.php");


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning.php");
  exit;

      header('HTTP/1.0 403 Forbiddden',TRUE,403);
      die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}



?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="VirtualCard.css">
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
<title>Verify pin</title>
      </head>
      <body>
  

      <div class="loader-overlay">
</div class="loader-message">
</div>
</div>


<style>


.loader-overlay{
width: 100%;
height: 100%;
background-color: rgba(255,255,255,0.6);
position: fixed;
left: 0;
top: 0;
bottom: 0;
right:0;
display: none;

}
.loader-message{
    left: 50%;
top: 50%;
position: absolute;
margin: -75px 0 0 -75px;

    border-radius: 50%;
    width: 120px;
    height: 120px;
border: 10px solid white;
border-top: 10px solid red;
animation: rotate 2s  linear infinite;

}
@keyframes rotate {
    0%{transform: rotate(0deg)}
    100%{transform: rotate(360deg)}
}
  </style>
      <?php


require_once __DIR__.("/db_connection.php");


$check_for_pin = "SELECT Pin FROM User_pin WHERE User_id ='$_SESSION[New_user]'";


$result_pin = $conn -> query($check_for_pin);

if ($result_pin -> num_rows > 0){

//$customer_pin = $result_pin -> fetch_assoc();

echo "


<div class='pin-container'>

<span class='material-symbols-outlined' id='close-pin-btn' >close</span>

<p>Enter your transaction pin to confirm payment</p>

<label for='pin'>Pin</label>
<br>


<input type='password' id='tran_pin' maxlength='4' name='pin'>

<br>

<input type='submit' id='submitButton' value='send'>
</form>

</div>

";




}else{

echo "

<div class='pin-warning-message-container'>

<p>No transaction pin found.Please click <a href='setting.php'>here</a> to create pin or go to settings -> security to create transaction pin</p>

</div>
";



}



      ?>







<style>
   body{
    margin:0;
    font-size: 18px;
   }
    .pin-container{
        overflow-y: scroll;
    width: 0%;
    height: 100%;
    background-color: white;
    z-index: 2;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: fixed;
    transition: 0.4s;
   /* border-top: 2px solid rgb(0,0,180);*/
    text-align: center;
    }
  .pin-container input[type=password]{
    width: 30%;
    padding: 10px 10px;
    border: 2px solid #ccc;
  }  
  .pin-container p{
    color: rgb(0,0,180);
  }
  span{
    cursor: pointer;
  }

  
.pin-warning-message-container{
  background-color: rgba(0,0,0,0.2);
  width: 100%;
  height: 100%;
  left:0;
  right: 0;
  top: 0;
  bottom: 0;
  position: fixed;
  z-index: 2;
}
.pin-warning-message-container p{
padding: 15px 15px;
width: 90%;
margin-left: auto;
margin-right: auto;
background-color: white;
top: 50%;
text-align: center;

}
  </style>
    </style>

    <script>
function openPin(event){
    document.querySelector(".pin-container").style.width = "100%";
}


document.querySelector("#close-pin-btn").addEventListener("click",closePin);

function closePin(){
    document.querySelector(".pin-container").style.width = "0%";
}
        </script>