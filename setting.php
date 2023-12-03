<?php require_once __DIR__.("/sessionPage.php");


$selct = "SELECT * FROM Two_factor WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1";

$Results = mysqli_query($conn,$selct);

if(mysqli_num_rows($Results) > 0){


  $statusResult = mysqli_fetch_assoc($Results);

  if($statusResult["Status"] == "ON"){

    $FactorStatus = "checked";
  }elseif ($statusResult["Status"] == "OFF"){

    $FactorStatus = "";

  }else{

    $FactorStatus = "";
  }


}else{

  $FactorStatus = "";


}

//create hash key for hidden field for payment link

$hash = rand(9999,99999) .uniqid();

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/settings.css">
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
<title>settings</title>


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
          

        <div class="setting-container">
           <a href="dashboard-home"> <i class="fa fa-home" style="float:right;
           margin-top:1px;font-size:11px;"></i>
</a>
<span class="material-symbols-outlined" onclick="window.history.back()" style="font-size: 13px;">arrow_back</span>

            <!--h1><i class="fa fa-cogs"> </i> Settings</h1-->

         <a href="Myprofile"><p><i class="fa fa-user-circle" ></i> Profile</p></a>
           <a href="Transaction-history"> <p><i class="fa fa-book"></i> Transaction history</p></a>
    
           <a href="Bank-card"> <p><i class="fa fa-credit-card-alt"></i> Bank card </p></a>

           <a href="account-stat"> <p ><i class="fa fa-bar-chart"></i> Account statistic</p></a>

            
            <p class="open-security"><i class="fa fa-shield"></i>  Security</p>

           <a href="Verification"> <p><i class="fa fa-user-plus"></i> Verification</p></a>

            <p class="Open_payment_btn"><i class="fa fa-share-square-o"></i> Payment link</p>
            
             <a href="refer-and-earn"><p><i class="fa fa-money"></i>Refer and Earn</p></a>

            

            <p class="Open_acct_limit_btn"><i class="fa fa-object-group"></i> Account Limit</p>




            <input type="hidden" value="lazerwave.000webhostapp.com/payment?name=<?php echo $hash;?>&user<?php echo $user['Surname'] .$user['Last_name'].
            $user['First_name'] ?>&id=<?php echo $_SESSION['New_user'] ?>"id="payment-link">
          
            <p class="open-report-container"><i class="fa fa-exclamation-circle"></i> Report scam</p>
           
            <p class="delete-account" onclick="alert('Please send an email to customer care')"><i class="fa fa-user-times"></i> Delete Account</p>

            <p class="share"><i class="fa fa-share-alt"></i> Share</p>
            
            <p><i class="fa fa-globe"></i><label class="switch">
  <input type="checkbox" onclick="Darkmode()" id="theme">
  <span class="round slider"></span>
</label> Dark mode
</p>
               
        </div>


        
<div class="security-container">
    <span class="material-symbols-outlined" id="close-security-btn">close</span>
    <h1><i class="fa fa-gear"></i>Security</h1>

<p class="open-transaction-pin"><i class="fa fa-key"></i> Transaction pin </p>

<p class="open-change-password"><i class="fa fa-lock"></i> Change password </p>


<p><a href="block-account"><i class="fa fa-user-times"></i> Block Account </a></p>

<p><i class="fa fa-lock"></i>
<label class="switch"><input type="checkbox"  id="two-factor_btn" 
onclick="Two_factor()" <?php echo $FactorStatus; ?> >
<span class="round slider"></span></label>Two factor  Authentication</p>

<form id="Two_factor_Form">
    <input type="text" name="two-factor" style="display: none">
</form>


<i class="two_factor_error_message" style="color: red;text-align; center;"></i><br>
</div>


<div class="transaction-pin-container">
    <span class="material-symbols-outlined" id="close_transaction_container_rr">close</span>




    <?php
//CHECJ IF USER HAS CREATED PIN ALREADY


$pin_check = "SELECT * FROM User_pin WHERE User_id= '$_SESSION[New_user]'";

$pin_result = mysqli_query($conn,$pin_check);


if (mysqli_num_rows($pin_result) > 0){

//MEANS USER HAS ALREADY CREATED TRANSACTION PIN


//YOU NEED TO UPDATE THEIR PIN INSTEAD


echo "
<h1><i class='fa fa-key'></i> Change Transaction pin</h1>
<br>
<form  id='Pin_FormData'>
<label><b>Password</b></label>
<br>
<input type='password' name='password'
inputmode='numeric' style='-webkit-text-security:disc;'  placeholder='your password...'>

<br>
<label><b>New pin</b></label>
<br>
<input type='numeric' maxlength='4' autocomplete='off' autofocus='off'  inputmode=' numeric'name='new_pin' style='-webkit-text-security:disc;
' placeholder='your new pin....'>
<br>



<input type='submit' value='change pin'>

<p class='error_message_update_pin'></p>

</form>";







}else{

//USER HAS NOT CREATED YET


echo "
<h1><i class='fa fa-key'></i> Create  Transaction pin</h1>
<br>
<form  id='Pin_FormId'>
<label><b> pin</b></label>
<br>
<input type='numeric' name='new_pin' autocomplete='off' autofocus='off' maxlength='4' inputmode='numeric' style='-webkit-text-security:disc;' placeholder='your new pin..'>
<br>
<label><b>Confirm pin</b></label>
<br>
<input type='numeric' name='confirm-pin' autocomplete='off' autofocus='off' maxlength='4' inputmode='numeric' style='-webkit-text-security:disc;' placeholder='Re-enter new pin...'>
<br>
<input type='submit'  value='Create pin'>

<p class='error_message'></p>

</form>";






}


?>


</div>



<div class="change-password-container">


    <span class="material-symbols-outlined" id="close-change-password-btn">close</span>

<h1><i class="fa fa-lock"></i> Change password</h1>
<br>
<form  id="FormData" >
    <label><b>Old pasword</b></label>
    <br>
    <input type="password" name="old-password" placeholder="your password...">
    <br>
    <label><b>New password</b></label>
    <br>
    <input type="password" name="new-password" placeholder="your new password...">
    <br>
    <label><b>Confirm password</b></label>
    <br>
    <input type="password" name="confirm-password" placeholder="Re-enter new password...">
    <br>
    <input type="submit" value="change password">
    </form>
    <p class="error_message_change_password"></p>

</div>




<div class="payment-link-overlay">
        <div class="Payment-link-container">
            <i class="fa fa-close" id="close_payment_btn"></i>
<br><br>
        <div class="flex-box">
            <p class="copy-payment-link"><i class="fa fa-copy"></i> Copy Link</p>
            <p><a href="create-payment-link" target=" blank"><i class="fa fa-link"></i> Create Link </a></p>

</div>
</div>
</div>

<div class="account-limit-overlay-container">

<div class="account-limit-container">
<p  id="close-account-limit-btn"><i class='fa fa-close'></i></p>

<h1>Account limit </h1>

<p>Kyc 1 </p>
      <div class='Kyc1-container'>₦10,000 daily</div>


      <p>Kyc 2 </p>
      <div class='Kyc2-container'>₦50,000</div>



      <p>Kyc 3 </p>
      <div class='Kyc3-container'>Unlimited</div>




</div>
</div>






<div class="report-scam-container">
    <span class="material-symbols-outlined" id="close-report-container-btn">close</span>
    <h1><i class="fa fa-support"></i> Complain via</h1>

    <div class="support">
   <a href="mailto:ajehabraham51@gmail.com"> <i class="fa fa-google"></a></i>
   <a href="mailto:ajehabraham51@gmail.com"> <i class="fa fa-envelope"></a></i>
   
   <i class="fa fa-user-circle" onclick="alert('Live chat comming soon')"></i>
    </div>

</div>

  
<?php require_once "Loader.php"; 
require_once __DIR__.("/Non-script.php"); 
//include __DIR__.("/logo.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>

<script src="Src/Js/settings.js"></script>
        </body>
        </html>