<?php 
require_once __DIR__.("/sessionPage.php");


include __DIR__.("/db_connection.php");

$select_dp = "SELECT * FROM Profile_picture WHERE User_id ='$_SESSION[New_user]'  ORDER BY id DESC LIMIT 1";

//$result_p = $conn -> query($select_dp);
$result_p = mysqli_query($conn,$select_dp);


if(mysqli_num_rows($result_p) > 0){

   $profile_picture =  mysqli_fetch_assoc($result_p);

        $image = $profile_picture["Image_path"];
   
       // $_SESSION["Profile_picture"] = "Uploads/".$image;

   $dp = "Uploads/".$image;
$uploupBtn = "";
    $pics = rand(1923,12034);

}else{

    //$_SESSION["Profile_picture"] = "Uploads" ."\\" ."null-profile.jpeg";
   $dp =  "Images/Null-image.png";
   
   $uploupBtn = '
   <p  class="open-upload-btn" ><i class="fa fa-upload"></i> Upload  picture</p>';

   $pics = "";
}


$extra_info = "SELECT * FROM Extra_info WHERE User_id ='$_SESSION[New_user]'";


//$extra_info_result = $conn -> query($extra_info);

$extra_info_result = mysqli_query($conn,$extra_info);

if (mysqli_num_rows($extra_info_result) > 0){

   // while ($extra_details = $extra_info_result -> fetch_assoc()){
    $extra_details = mysqli_fetch_assoc($extra_info_result);

        $State = $extra_details["State"];

        $tel = $extra_details["Tel"];

        $Address = $extra_details["Address"];

    
}else{
    $Address = "";
    $tel="";
    $State ="";
}


$fetch_username ="SELECT * FROM Username WHERE User_id ='$_SESSION[New_user]'";

// $username_result = $conn -> query($fetch_username);
$username_result = mysqli_query($conn,$fetch_username);
 
 if (mysqli_num_rows($username_result)  > 0){
 
 
// $username = $username_result -> fetch_assoc();
 
$username = mysqli_fetch_assoc($username_result);
 
 
 $userNames = "
 
 <label for='username'><b>Username</b></label>
 
 <br>
 <input type='text' value='$username[Username]' id='Username'readonly>
 
 <br>
 <b style='margin-bottom: 20px'><i class='fa fa-copy' onclick='copyUsername()'style='margin-right: 10px'></i>Copy</b><br><br>";
 
 }else{
 
 //DO NOTHING 
 
 //echo "<input type='text' placeholder='johnDoe...'><br>"
 
 $userNames = "";
 
 }

 
//CHECK IF EMAIL IS VERIFY OF NOT//

$email_verfiy = "SELECT * FROM Email_verification WHERE User_id ='$_SESSION[New_user]'";

//$email_verfiy_result = $conn -> query($email_verfiy);
$email_verfiy_result = mysqli_query($conn,$email_verfiy);

if (mysqli_num_rows($email_verfiy_result) > 0){

    $email_status = mysqli_fetch_assoc($email_verfiy_result);

    //NOW CHECK IF THE STATUS HAS BEEN VERIFY //
    
  

    if ($email_status["Status"] == "verified"){

$EamilSatus ="
<p class='verify-email' style='background-color: mediumseagreen; cursor: alias;'>Verified <i class='fa fa-check-circle'></i></p>


<br>
<br>

";

    }else{
// IF EMAIL IS NOT VEFIRY

$EamilSatus= "
<p class='verify-email' style='background-color: red;'> Unverified <i class='fa fa-exclamation'></i></p>

<br>
<br>
";



    }


}else{

$EamilSatus= "
<p class='verify-email' style='background-color: red;' onclick='open_verify_email()'> Unverified <i class='fa fa-warning'></i></p>

<br>
<br>
";


}

$usr_n ="SELECT * FROM Email_verification WHERE User_id ='$_SESSION[New_user]'";

//$usr_result = $conn -> query($usr_n);
$usr_result = mysqli_query($conn,$usr_n);


if (mysqli_num_rows($usr_result) > 0){
    
    //THE USER HAS BEEN VERIFY//
    $emailVerification = "";

    
}else{
    
    
    
    $emailVerification = '
    

    <div class="verificastion-container-overlay">    
<div class="verification-container">

<h5 onclick="close_email_verify()"><i class="fa fa-close"></i></h5>

<h5>Verify email</h5>



<form  id="FormData_request" >
 <input type="hidden" name="otp_no"  value="otp" autofocus="off" class="otp-message">

<h5 class="request_top_btn" onclick="RequestOtp()" id="sendOtp_submitButton" >Request for otp</h5>

<h3 class="request_error_message"></h3>

</form>

<form id="FormData_otp" >

<input type="number" oninput="numeric" maxlenght="6" autofocus="off" name="otp_no"  id="reset_number" placeholder="enter otp" inputmode="numeric" size="30">
<br>



<h3 class="Otp_error_message"></h3>

<input type="submit" id="verify_submitButton" value="verify">
</form>

<h5>Enter otp sent to the email address: <b>'.$user["Email"] .'</b> .</h5>

</div>

</div>

';
    
    
    
    
    
    
}


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Myprofile.css">
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

<title>MyProfile</title>
      </head>
      <body>



      <span class="material-symbols-outlined" onclick="window.history.back()"
       style="font-size: 13px;">arrow_back</span>
      <a href="dashboard-home"><i class="fa fa-home" id="Home-btn"></i></a>

</div>
<br><br>
        <div class="profile-picture-container">
        

            <img src="<?php echo $dp;?> "style='cursor: pointer;' width="120px"  onclick="open_picture()" id="output">
         <?php echo $uploupBtn; ?>
          
        </div>
         
        <?php if($pics != "") {require_once "View picture.php";} ?>

        <div class="upload-option-overlay">
            <!--label for="file"style="cursor: pointer;">WOW</label-->

            <form id="Form-data-dp">
            <input type="file" name="image"  onchange ="loadFile(event)"style="display:none;" id="file" accept="image">


            <span class="material-symbols-outlined" id="close-upload-btn">close</span>
            <p  style="cursor: pointer;"><label for="file"> <i class="fa fa-photo"></i>Gallary</p>
            <p  style="cursor: pointer;"><i class="fa fa-camera"></i>Camera </p>
          

<h5 class="error_message" style='text-align: center;color: red;margin: auto;'></h5>
            <input type="submit"  value="upload">
</form>

            </div>
        </div>


   
     
        <div class="form-container">
            <h1>Account Details</h1>

            
            <a href="edit-profile"><h3 class="edit-profile"><i class="fa fa-user-plus"></i>Edit</a></h3>
            
            
            <?php echo $userNames; ?>

        

    <label><b>Surname:</b></label>
    <br>
    <input type="text" value="<?php echo $user['Surname'] ?>"readonly>
    <br>

    <label><b>Lastname:</b></label>
    <br>
    <input type="text" value="<?php if(isset($user["Last_name"])) echo $user['Last_name'] ?>" readonly>
    <br>

    <label><b>Firstname:</b></label>
    <br>
    <input type="text"value="<?php echo $user['First_name'] ?>" readonly>
    <br>

    <label><b>Gender:</b></label>

    <?php if($user["Gender"] == "Male"): ?>
        <input type="radio" checked>  Male
    
<br>
    <?php else: ?>
        <input type="radio"checked>  Female
  
    <br>
<?php endif;?>
<br>

    <label><b>E-mail:</b></label>
 


    <input type="text"value="<?php echo $user['Email'] ?>" readonly>
   
<?php  echo $EamilSatus; ?>







<?php echo $emailVerification;?>



<label><b>Account Number:</b></label>

  
    <br>
    <input type="number"value="<?php echo $user['Account_no'] ?>"  readonly id="account-number">
    <br>
    <!--h4 class="copy-account-number-message">Copy Account Number</h3-->
    
    <b class="copy-account-no" onclick='copyAcct_no()'><i class="fa fa-copy"></i> Copy</b>
 
  <br>
  <br>
   <?php if($user["Country"] === "Nigeria"){

    $TelCode = "+234";

   }elseif($user["Country"] == "Ghana"){

    $TelCode = "+222";
   }else{

    $TelCode = "";
   }
   ?>
    <label><b>Phone Number:</b></label>
    <br>
    <input type="tel" value="<?php echo  $TelCode. $tel ?>" readonly>
    <br>

    <label><b>Address:</b></label>
    <br>
    <input type="text" value="<?php echo  $Address?>" readonly>
    <br>

    <label><b>Country:</b></label>
    <br>
    <input type="text" value="<?php echo $user['Country'] ?>" readonly>
    <br>
    <label><b>State:</b></label>
    <br>
    <input type="text" value="<?php echo  $State ?>" readonly>
    <br>

    <h4 class=" More" onclick='see_more()' style="cursor:pointer;border-radius: 2rem;background-color: rgb(0,0,52);">See more...</h4>

<div class="more-infromation">

<?php

// checking to see user kyc status //


$check_kyc2 = "SELECT * FROM More_information WHERE User_id = '$_SESSION[New_user]'";

//$kyc_result = $conn -> query ($check_kyc2);
$kyc_result = mysqli_query($conn,$check_kyc2);

if (mysqli_num_rows($kyc_result) > 0 ){

$get_kyc_result =mysqli_fetch_assoc($kyc_result) ;



$DOB = date("F d Y" ,strtotime($get_kyc_result["DOB"]));

//echo $DOB;


    echo " 
    <label><b>Date of birth:</b></label>
    <br>
    <input type ='text' value='$DOB'  readonly>


    <label><b>State of origin:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[State_origin]'  readonly>

    
    <label><b>LGA:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[LGA]' readonly>


    
    <label><b>Mother's first name:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[Mother_name]'  readonly>


    <br>
    
    <label><b>Occupation</label>
    <br>
    <input type='text' value='$get_kyc_result[Occupation]' readonly>
    <br><br>

    ";

 $details = "";
   
}else{
$details = '
<div class="additional-informaton"><p>
<a href="Verification">Upgrade to KYC 2</a></p>
</div>';

    echo "<h3 style='text-align: center;margib: auto;display: block;color: red;'>Please upgrade to KYC2</h3>";
}


echo $details;

?>

</div>
</div>    



<?php 
require_once __DIR__.("/Network.php");
require_once __DIR__.("/Non-script.php"); 
 require_once "Loader.php";

require_once "Loader-refresh.php";
?>


<script src="Src/Js/profile.js"></script>
</body>
</html>