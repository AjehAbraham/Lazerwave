<?php
require_once __DIR__.("/sessionPage.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
//print_r($_POST);

    //require_once "Check block account.php";
if(isset($_POST["pin"]) && !empty($_POST["pin"])){

    $card_pin = (int) filter_var($_POST["pin"],FILTER_VALIDATE_INT);

    if(empty($card_pin)){

        die("Please enter card pin");
    }

}else{


die("Please enter a Pin for your Virtual Card");

}


if(isset($_POST["type"]) && !empty($_POST["type"])){


    $card_type = filter_var($_POST["type"],FILTER_SANITIZE_STRING);

    
    if($card_type != "Debit Card" && $card_type != "Credit Card"){

        die("Invalid card Type");
    }

}else{



die("please select Type of card.");
}


if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){


    $pin = (int) filter_var($_POST["Transaction-pin"],FILTER_SANITIZE_NUMBER_INT);

}else{


    die("Please enter your Transaction Pin");
}


require_once "db_connection.php";

$pin = stripslashes($pin);
$card_type = stripslashes($card_type);
$pin = mysqli_real_escape_string($conn,$pin);
$card_type = mysqli_real_escape_string($conn,$card_type);
$pin = htmlspecialchars($pin);
$card_type = htmlspecialchars($card_type);

$card_pin = password_hash($card_pin,PASSWORD_DEFAULT);

$tran_pin = "SELECT * FROM User_pin WHERE User_id = '$user[id]' ORDER BY id DESC LIMIT 1";

//$result_pin = $conn -> query($tran_pin);

$result_pin = mysqli_query($conn,$tran_pin);



if (mysqli_num_rows($result_pin) > 0){


$pin_result = mysqli_fetch_assoc($result_pin);

//CHECK IF PIN MATCH//


if (password_verify($pin,$pin_result["Pin"]) =="password_hash"){

//echo "pin is valid";



}else{

die("Invalid Transaction Pin");


}




}else{

    die("please create Transcation pin");

}




$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
//$User_agent = htmlspecialchars($_SERVER["HTTP_USER_AGENT"]);
$session_id = session_id();

$send_account_number = $user["Account_no"];
$re_account_no = "Lazerwave";


$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"tablet"));


$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"mobile"));



$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"windows"));


$isAndriod = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"andriod"));


$isIphone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"iphone"));


$isIpad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"ipad"));


$isIos= $isIpad || $isIphone;



if($isMob){

if($isTab){

    $agent = "Tablet";

}else{


    $agent = "Mobile";
}

}else{

    $agent = "Desktop";
}

if($isIos){

    $user_agent = $agent. " Iphone IOS";

}else if($isAndriod){

$user_agent = $agent . " Andriod";

}else{

$user_agent = $agent. " Windows";

}


//END OF TRANSATIONS HISTORY INFOS//

require_once "check-block-account.php";

 $amount = 1000;
$check_ = 1000;

if ($user["Account_balance"] < $check_){


      
      $remark = "Pending";
      $send_account_number = $user["Account_no"];
      $re_account_no = "Lazerwave";
      $ip_addr = $_SERVER["REMOTE_ADDR"];

$amount = 1000;

$type = "Virtual card";

$status = "Failed";

$typee ="Card";

$bank ="";


  


      $failed_amount = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,
      Type_name
      ,Remark,Status_remark,Sender_account_no,Reciever_account_no,Date_id,
      Time_id,Ip_addr,Type,Bank,User_agent     
      )
      VALUES('$_SESSION[New_user]','$transaction_id', '$check','$type','$remark',
      '$status','$send_account_number','$re_account_no','$date','$time','$ip_addr',
      '$typee','$bank','$user_agent')
      ";


if (mysqli_query($conn,$failed_amount)){

die("Insufficient Funds");


}

}else if($amount <= $user["Account_balance"]){


$credit_no =rand(61829,97321). rand(54321,75231) . rand(98765,67890);

//CHECK IF CARD MUMBER EXIST ELSE RE-CREAT NEW CARD MUMBER TO AVOID DUPLICATE CARD MUMBER

$re_check = "SELECT * FROM User_card WHERE Card_no ='$credit_no'";


$re_check_result = mysqli_query($conn,$re_check);

if(mysqli_num_rows($re_check_result) > 0){
    
    //A MATCH FOR THE CREDIT CARD WAS FOUND NOW RE-GENERATE NEW CARD NUMBER
    
    $credit_no = rand(12345,54321). rand(90864,11567) .rand(61234,07424);
    
    
    
}else{
    
    //NO ISSUE
    
    
}


$ccv = rand(612,321);


//FETCH USER DEATILS//

$user_detais = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

$result = mysqli_query($conn,$user_detais);

$user = mysqli_fetch_assoc($result);


$full_name = $user["Surname"]. " " . $user["Last_name"] . " ". $user["First_name"];

$status_card = "UnBlock";


$date = date("Y/m/d H:i:s");

$time = date("H:i:s");

$transaction_id = rand(999,9999).uniqid();

$amount = 1000;

$type = "Virtual card";

$status = "Successful";

$expire =date("Y") + 4;


$hash_key = uniqid() .rand(126367,626363). uniqid(). rand(626262,027162);




$remark = "- Debit";
$send_account_number = $user["Account_no"];
$re_account_no = "Lazerwave";
$ip_addr = $_SERVER["REMOTE_ADDR"];
$bank = "";
$typee = "Virtual card";
$new_balance = $user["Account_balance"] - $amount;

$update_ccount_balance = "UPDATE Register_db SET Account_balance ='$new_balance' WHERE id = '$_SESSION[New_user]' ";


if (mysqli_query($conn,$update_ccount_balance)){
    

//require_once __DIR__.("/Debit alert.php");

//require_once "Add limit.php";


//INSERT RECORDS TO TRANSACTION hISTORY//


$update_amount = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name
,Remark,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent
)
VALUES('$_SESSION[New_user]','$transaction_id', '$amount','$type','$remark',
'$status','$send_account_number','$re_account_no','$date','$time','$ip_addr','$typee',
'$bank','$user_agent')
";


if (mysqli_query($conn,$update_amount)){

//NOW ADD CARD TO USER CARD(S) AND SEND REPONSE//
$status_card = "UnBlock";

$insert ="INSERT INTO User_card(User_id,Card_no,Full_name,Ccv,Pin,Exp_date,
Status_r,Hash_key,Type,Date_created,Time_id,User_agent	

)
    
    
    VALUES('$_SESSION[New_user]','$credit_no','$full_name','$ccv','$card_pin','$expire',
    '$status_card','$hash_key','$card_type','$date','$time','$user_agent')
    ";



if (mysqli_query($conn,$insert)){

    $_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
    "UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");
   
die("success");



    }else{


//FAIL TO CREATE A CARD FOR USER//



    }




}else{


//FAILED TO INSERT RECORD TO TARNSACTION HSITORY//


}





}else{


//FAILED TO UPDATE BALANCE//




}










}else{

//BALANCE NOT SUFFICIENT FOR TRANSACTION//

//require_once "Debit alert.php";

//require_once "Check block account.php";

//require_once "Check daily limit.php";




}

mysqli_close($conn);

}
?>