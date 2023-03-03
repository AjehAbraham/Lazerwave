
<?php


require_once __DIR__.("/sessionPage.php");


if(!isset($_SESSION["New_user"])){

header("Location: Login.php");
exit;


}

?>
<form method="post">
<input type="otp">
<input type="submit">


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){


    require_once __DIR__.("/db_connection.php");


    $date = date("Y/m/d H:i:sa");

    $time = date("H:i:sa");

    $otp = rand(38495,28349);


    $insert = "INSERT INTO  Change_password_otp(User_id,Otp,Time_id,Date_id)
    
    VALUES('$user[id]','$otp','$time','$date')
    ";


if ($conn -> query ($insert) == TRUE){

    $message_status = "Otp has been sent,Please check oyur mail.";
    
    
        require_once __DIR__.("/success.php");

    //echo json_decode($otp);
}
else{
    $message_status = "error has occur,Please try again later.";
    
    
    require_once __DIR__.("/Failed.php");



}




}/*else{


    echo "This page does not supprot get request";
}*/

?>
