<?php
session_start();

?>



<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/payment-gateway.css">
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

<title>Payment Gateway</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
</head>
<body>
    
<?php require_once "default_sidebar.php"?>  
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


<?php


if($_SERVER["REQUEST_METHOD"] == "GET"){
  

 if(isset($_GET["token_keys"]) && !empty($_GET["token_keys"])){

$token = htmlspecialchars($_GET["token_keys"]);

require_once "db_connection.php";

$token = mysqli_real_escape_string($conn,$token);
$token = stripslashes($token);
$token = trim($token);

//CHECK DATABASE FOR DETAILS//

$link ="SELECT * FROM Payment_link_table WHERE Hash_link='$token'";
 
 
$result = mysqli_query($conn,$link);

if(mysqli_num_rows($result) > 0){


$link_result = mysqli_fetch_assoc($result);



//NOW CHECK REGISTER DATABASE TO FETCH USER NAME AND OTHER DATAS/



$user_details = "SELECT * FROM Register_db WHERE id ='$link_result[User_id]'";
 
$user_result = mysqli_query($conn,$user_details);

$User = mysqli_fetch_assoc($user_result);


$full_name = $User["Surname"]. " ". $User["Last_name"]. " ".$User["First_name"];


$amount = "₦". number_format($link_result["Amount"]). ".00";

if($link_result["Image_path"] == ""){


  //SINCE USER DID NOT UPLOAD IMAGE USE USER PROFILE PCITURE INSTEAD//

$dp = "SELECT * FROM Profile_picture WHERE User_id='$link_result[User_id]'";

$dpResult = mysqli_query($conn,$dp);

if(mysqli_num_rows($dpResult) > 0){

  $Userdp = mysqli_fetch_assoc($dpResult);

  $link_image = "Uploads/".$Userdp["Image_path"];


}else{

//USER HAS NOT UPLOADED PROFILE PCITURE YET//
$link_image = "Images/Null-image.png";

}

 


}else{


  $link_image = "Link-images/". $link_result["Image_path"];
}

//SHOW IF LINK IS ACTIVE OR NOT//
if($link_result["Status"] == "Active"){
echo "
<div class='form-container'>
<h2>Payment Gateway</h2>


<p><img src='$link_image'></p>

<p style='font-weight: bold;'>$full_name </p>


<p>$amount</p>

<p><b>$link_result[Title]</b><br>$link_result[Link_message]</p>

<form id='FormData'>

<!--label><b>Amount</b>
</label>
<input type='text'inputmode='numeric' value='$amount' name='Amount' disabled>
<br-->

<label><b>Card number</b></label>

<input type='text'inputmode='numeric' autofocus='off' maxlength='15' name='card_no' autocomplete='off' oninput='validate_card_no()' placeholder='XXXXXXXXXXXXXX'>
<b style='color: #666;' class='card_error_message'></b><br>

<br>
<label><b style='margin-right: 110px;'>Expiry Year</b>  <b>CCV</b></label>
<input type='text' autofocus='off' inputmode='numeric' style='width: 30%;display: inline-block;' autocomplete='off' maxlength='4' name='Exp'placeholder='Expiry year e.g(2023)'>

<input type='text'inputmode='numeric'  autofocus='off' autocomplete='off' style='-webkit-text-security:disc; width: 30%; display: inline-block;' maxlength='3' name='cvv' autofocus='off'placeholder='XXX'>

<br>
<label><b>Card Pin</b>

</label>
<input type='text'inputmode='numeric'  autofocus='off'  maxlength='4' autocomplete='off' name='pin' style='-webkit-text-security:disc;' placeholder='XXXX'>

<br><br>
<input type='hidden' name='id' value='$token'>

<input type='submit' value='continue payment'>
<p class='status-message'></p>

<br>


</form>

<p>Supported card <i class='fa fa-flash'></i></p>


</div>
 
 
 ";
 
}else{


  echo "<p style='color: red;text-align: center;
  font-weight: bold;'>This Link has Expire or has been De-activated by the owner</p>";
  
} 





}else{


  //LINK COULD NOT BE FOUND//

  echo "<p style='text-align: center;color: red;font-weight: bold;'>Link could not be found</p>";


}



 }else{

//LINK HAS BEEN BROKEN OR IS IMCOMPLETE//

echo "<p style='text-align: center;color: red;font-weight: bold;'>Your link appear to have been broken or does not exist</p>";

 }
 
require_once "Loader-refresh.php";

require_once "Network.php";
//mysqli_close($conn);
 
}else{

//INVALID REQUEST TYPE//


}
 
require_once "footer.php";

?>


<script src="Src/Js/payment-gateway.js"></script>

</body>
</html>