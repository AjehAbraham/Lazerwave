
<?php 
require_once __DIR__.("/sessionPage.php");


if (!isset($_SESSION["New_user"])){
    header("location: Login.php");
    exit;
}

require __DIR__.("/Network.php");


include __DIR__.("/db_connection.php");

$select_dp = "SELECT * FROM Profile_picture WHERE User_id ='$_SESSION[New_user]' ";

$result_p = $conn -> query($select_dp);

if($result_p -> num_rows > 0){
    while($profile_picture = $result_p -> fetch_assoc()){

        $image = $profile_picture["Image_path"];
   
        $_SESSION["Profile_picture"] = "Uploads/".$image;

   
    }
}else{

    $_SESSION["Profile_picture"] = "Uploads" ."\\" ."null-profile.jpeg";
    
}


$extra_info = "SELECT * FROM Extra_info WHERE User_id ='$_SESSION[New_user]'";


$extra_info_result = $conn -> query($extra_info);

if ($extra_info_result -> num_rows > 0){

    while ($extra_details = $extra_info_result -> fetch_assoc()){

        $_SESSION["State"] = $extra_details["State"];

        $_SESSION["Tel"] = $extra_details["Tel"];

        $_SESSION["Address"] = $extra_details["Address"];
    }
}else{
    $_SESSION["Address"] = "";
    $_SESSION["Tel"] ="";
    $_SESSION["State"] ="";
}



?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="profile.css">
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


<title>Profile</title>
      </head>
      <body>

    

      <span class="material-symbols-outlined" onclick="window.history.back()" style="color:rgb(0,0,180);">arrow_back</span>
      <a href="index.php"><i class="fa fa-home" style="color:rgb(0,0,180);cursor:pointer;float:right;margin-top:1px;font-size:25px;"></i></a>
    


        <div class="profile-picture-container">

            <img src="<?php echo $_SESSION["Profile_picture"] ;?> " width="120px" id="output">
         
          
            <p style="color:white" class="open-upload-btn">Upload  picture</p>
        </div>

        <div class="upload-option-overlay">
            <!--label for="file"style="cursor: pointer;">WOW</label-->
            <form method="post"  action="updateprofilePicture.php" enctype="multipart/form-data">
            <input type="file" name="image"  onchange ="loadFile(event)"style="display:none;" id="file">


            <span class="material-symbols-outlined" id="close-upload-btn">close</span>
            <p  style="cursor: pointer;"><label for="file"> <i class="fa fa-photo"></i>Gallary</p>
            <p  style="cursor: pointer;"><i class="fa fa-camera"></i>Camera </p>
          
            <input type="submit" onclick="close_uplaod_overlay()" id="prof_submitButton" value="upload">
</form>
            </div>
        </div>

<p class="error_message"></p>

   
     
        <div class="form-container">
            <h1>Account Details</h1>

            
            <a href="EditProfile.php"><h3 class="edit-profile">Edit</a></h3>

        

    <label for="surname-name"><b>Surname-name:</b></label>
    <br>
    <input type="text" value="<?php echo $user['Surname'] ?>"disabled>
    <br>

    <label for="last-name"><b>Last-name:</b></label>
    <br>
    <input type="text" value="<?php if(isset($user["Last_name"])) echo $user['Last_name'] ?>" disabled>
    <br>

    <label for="First-name"><b>First-name:</b></label>
    <br>
    <input type="text"value="<?php echo $user['First_name'] ?>" disabled>
    <br>

    <label for="gender"><b>Gender:</b></label>

    <?php if($user["Gender"] == "Male"): ?>
        <input type="radio" checked>  Male
    
<br>
    <?php else: ?>
        <input type="radio"checked>  Female
  
    <br>
<?php endif;?>
<br>

    <label for="E-mail"><b>E-mail:</b></label>
 


    <input type="email"value="<?php echo $user['Email'] ?>" disabled>
   
<?php 

//CHECK IF EMAIL IS VERIFY OF NOT//

$email_verfiy = "SELECT * FROM Email_verification WHERE User_id ='$_SESSION[New_user]'";

$email_verfiy_result = $conn -> query($email_verfiy);

if ($email_verfiy_result -> num_rows > 0){

    $email_status = $email_verfiy_result -> fetch_assoc();

    //NOW CHECK IF THE STATUS HAS BEEN VERIFY //
    
  

    if ($email_status["Status"] == "Verify"){

echo "
<p class='verify-email' style='background-color:mediumseagreen;'>Verified <i class='fa fa-check-circle'></i></p>



";

    }else{
// IF EMAIL IS NOT VEFIRY

echo "
<p class='verify-email'  style='background-color: rgba(255,0,0,0.5);'> Unverified <i class='fa fa-exclamation'></i></p>

";



    }


}else{

echo "
<p class='verify-email' onclick='open_verify_email()' style='cursor: pointer;background-color: rgba(255,0,0,0.5);'> Unverified <i class='fa fa-exclamation'></i></p>

";


}


?>
 <br>
 <br>







<div class="verificastion-container-overlay">



<!-- loader -->
<div class="loader-overlay">
<div class="loader-message">
</div>
</div>
<!-- end of laoder -->


<div class="verification-container">

<h5 onclick='close_email_verify()'><i class="fa fa-close"></i></h5>

<h5>Verify email</h5>



<form id="formId" action="Send otp.php">
 <input type="hidden" name="otp"  value="otp" class="otp-message">

<h5 class="request_top_btn" id="submitButton" >Request for otp</h5>

</form>


<form method ="post" id="Otp_formId" >

<input type="number" name="otp_no"  id="reset_number" placeholder="enter otp">
<br>


<h3 class="error_message" style="color: red"></h3>

<input type="submit" id="Otp_submitButton" value="verify">
</form>


<h5>Enter otp sent to the email address: <b><?php echo $user["Email"] ?></b> .</h5>

</div>

</div>





    <label for="Account-no"><b>Account Number:</b></label>
    <br>
    <input type="number"value="<?php echo $user['Account_no'] ?>"  disabled id="account-number">
    <br>
    <!--h4 class="copy-account-number-message">Copy Account Number</h3-->
    
    <p class="copy-account-no">Copy</p>
 
  <br>
  <br>
   
    <label for="tel"><b>Phone Number:</b></label>
    <br>
    <input type="tel" value="<?php echo  $_SESSION["Tel"] ?>" disabled>
    <br>

    <label for="address"><b>Address:</b></label>
    <br>
    <input type="text" value="<?php echo  $_SESSION["Address"] ?>" disabled>
    <br>

    <label for="country"><b>Country:</b></label>
    <br>
    <input type="text" value="<?php echo $user['Country'] ?>" disabled>
    <br>
    <label for="state" ><b>State:</b></label>
    <br>
    <input type="text" value="<?php echo  $_SESSION["State"] ?>" disabled>
    <br>

    <h4 onclick='see_more()' style="cursor:pointer">See more...</h4>

<div class="more-infromation">

<?php

// checking to see user kyc status //


require_once __DIR__.("/db_connection.php");


$check_kyc2 = "SELECT * FROM More_information WHERE User_id = '$_SESSION[New_user]'";

$kyc_result = $conn -> query ($check_kyc2);

if ($kyc_result -> num_rows > 0 ){
   // echo 
   // "<h4 onclick='see_more()'>See more...</h4>";

    while($get_kyc_result = $kyc_result -> fetch_assoc()){




    echo " 
    <label for='DOB'><b>Date of birth:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[DOB]'  disabled>


    <label for='DOB'><b>State of origin:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[State_origin]'  disabled>

    
    <label for='DOB'><b>LGA:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[LGA]' disabled>


    
    <label for='DOB'><b>Mother's first name:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[Mother_name]'  disabled>


    <label for='DOB'><b>Next of Kin:</b></label>
    <br>
    <input type ='text' value='$get_kyc_result[Next_kin]'  disabled>


    ";

    }
   
}else{
    echo "<h3 style='text-align: center;color: red;'>Please upgrade to KYC2</h3>";
}



?>

</div>

</div>

<div class="additional-informaton">
<a href="Verification.php"><p>Upgrade to KYC 2</p></a>
<p onclick="alert('comming soon')">Upgrade to KYC 3</p>

</div>




<script src="profile.js"></script>
</body>
</html>