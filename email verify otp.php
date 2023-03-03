<?php


require_once __DIR__.("/sessionPage.php");


if (!isset($_SESSION["New_user"])){
    header("location:login.php");
    exit;
}


?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    $otp = (int) filter_var($_POST["otp_no"],FILTER_SANITIZE_NUMBER_INT);

    if (empty($otp)){


        $message_status = "Please enter otp";
    
    
        require_once __DIR__.("/Failed.php");

die();

    }else{


        require_once __DIR__.("/db_connection.php");

        $check_otp = "SELECT * FROM Change_password_otp WHERE User_id ='
        $_SESSION[New_user]' AND NOW() <= DATE_ADD(Time_id,INTERVAL 10 MINUTE)";
        
        $OTP_result = $conn -> query($check_otp) -> fetch_assoc();
        
        
        if ($OTP_result["Otp"] == $otp){
  //VALID OTP THEN UPDATE EMAIL VERIFICATION STATUS//

  $date = htmlspecialchars(date("Y/m/d"));
  $time = htmlspecialchars(date("h:i:sa"));
  $status = "Verify";


  $INSERT = "INSERT INTO Email_verification(User_id,Status,Date,Time)
  
  VALUES('$_SESSION[New_user]','$status','$date','$time')
  ";


if ($conn -> query($INSERT) == TRUE){

//SEND RESPONSE//  
$message_status = "Verification successful";
    
    
require_once __DIR__.("/success.php");

die();

}else{

    $message_status = "An unknown error has occur,please try again";
    
    
        require_once __DIR__.("/Failed.php");



}
        
    



        }else{

///INVALID OTP//


$message_status = "Invalid otp";
    
    
require_once __DIR__.("/Failed.php");


        }



    }



}