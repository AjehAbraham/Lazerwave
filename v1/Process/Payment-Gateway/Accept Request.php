<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

   // print_r($_POST);
    //die();

if(isset($_POST["id"]) && !empty($_POST["id"])){

$notifyId = htmlspecialchars($_POST["id"]);


}else{


    die("Unknown Request");
}

if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){


    $pin = htmlspecialchars($_POST["Transaction-pin"]);


}else{

    die("Please enter your Transaction pin");
}

require_once "db_connection.php";

$notifyId = mysqli_real_escape_string($conn,$notifyId);
$pin = mysqli_real_escape_string($conn,$pin);
$notifyId =trim($notifyId);
$pin = trim($pin);
$pin = stripslashes($pin);
$notifyId = stripcslashes($notifyId);

//CHECK TRANSACTION PIN//

$pinChecker = "SELECT * FROM User_pin WHERE User_id ='$_SESSION[New_user]'";

$PinResult = mysqli_query($conn,$pinChecker);

if(mysqli_num_rows($PinResult) > 0){


    $userPin = mysqli_fetch_assoc($PinResult);

    if(password_verify($pin,$userPin["Pin"]) == "password_hash"){

//CHECK IF REQUEST IS TRUE AND IT IS ACTUALLY MONEY REQUEST//

$check = "SELECT * FROM Notification WHERE User_id='$_SESSION[New_user]' AND Notify_id='$notifyId'";

$notiResult = mysqli_query($conn,$check);

if(mysqli_num_rows($notiResult)){

    $data = mysqli_fetch_assoc($notiResult);

    if($data["Type"] != "Money request"){


        die("Authentication Error");

    }elseif($data["Status"] == "Accepted" or $data["Status"] == "Decline"){


        die("Error. Request has been ". $data["Status"]);


    }
    
    //NOW YOU CAN CHECK USER ACCOUNT BALANCE AND DEBIT USER AND CREDIT RECEIVER//

    require_once "check-block-account.php";


    $UserBalance = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

    $result = mysqli_query($conn,$UserBalance);

    $results = mysqli_fetch_assoc($result);

//FETCH RECIEVER DETAILS//

    $reciverBal = "SELECT * FROM Register_db WHERE id='$data[Receiver_id]'";

    $reciverBalResult = mysqli_query($conn,$reciverBal);

    $ReceiverDetails = mysqli_fetch_assoc($reciverBalResult);


    if($data["Amount"] <=  $results["Account_balance"]){


//UPDATE ALL BALANCE//

$senderBal =$results["Account_balance"] - $data["Amount"] ;

$BeneficaryBal = $ReceiverDetails["Account_balance"] + $data["Amount"];

$update = "UPDATE Register_db SET Account_balance ='$senderBal' WHERE id='$_SESSION[New_user]'";

if(mysqli_query($conn,$update)){

//UPDATE RECIEVER ACCOUNT BALANCE //

$UpdateReciever = "UPDATE Register_db SET Account_balance='$BeneficaryBal' WHERE id='$ReceiverDetails[id]'";


if(mysqli_query($conn,$UpdateReciever)){

//UPDATE NOTIFICATION//

$updateNotifcation = "UPDATE Notification SET Status='Accepted' WHERE Notify_id='$notifyId'";


if(mysqli_query($conn,$updateNotifcation)){



    //NOW UPDATE BOTH PARTIES TRANSACTION HISTORY//


//RECORDS TO INSERT TO TRANSACTION HISTORY//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "Money Request";
$bank = "Lazerwave";

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time = htmlspecialchars(date("H:i:s"));
$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
//$User_agent = htmlspecialchars($_SERVER["HTTP_USER_AGENT"]);
$session_id = session_id();



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




//NOW FETCH USER DETAILS//


$sender_acct = $results["Account_no"];
$receiver_acct = $ReceiverDetails["Account_no"];

$type_name = "Interbank Transfer via Money Request To ". $ReceiverDetails["Surname"]." ". $ReceiverDetails["Last_name"].
" ". $ReceiverDetails["First_name"]. "(".
$receiver_acct. ")" ;

$fullName = $ReceiverDetails["Surname"]." ". $ReceiverDetails["Last_name"].
" ". $ReceiverDetails["First_name"];

//NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//

$remark = "- Debit";
$status_remark = "Successful";

$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$_SESSION[New_user]','$transaction_id','$data[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";

if(mysqli_query($conn,$insert)){


$remark = "+ Credit";


$type_name = "Interbank Transfer via Money Request from ". $user["Surname"]." ". $user["Last_name"].
" ". $user["First_name"]. "(".
$user["Account_no"]. ")" ;

$inserts = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$ReceiverDetails[id]','$transaction_id','$data[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent')";

if(mysqli_query($conn,$inserts)){


    $_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
    "UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");

    $_SESSION["Transaction-type"] = array("Type" => "Transfer", 
    "full_name" => $fullName,"Acct_no" => $receiver_acct);
        
$PopMessage ="Your account has been credited with ₦" . number_format($data["Amount"]) . " From " .$user["Surname"] . " " .$user["Last_name"]." " . $user["First_name"]; 
 $PopUserId = $_SESSION["New_user"];
 $PopRecieverId = $ReceiverDetails["id"];
 $PopStatus ="Accepted" ;
$PopType = "Money request";
$PopIp = $ip_add;
$amount = $data["Amount"];
require_once "pop-notification.php"; 
    
    die("success");

}else{


    die("Failed");

}


}else{


//DO NOTHING//


}



}else{


    die("Your payment was successful but some error occured");
}




}else{


    die("Failed to credit Receiver,please report Transaction ");
}




}else{


    die("Failed,Please try  again");
}



    }else{


        
$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "Money Request";
$bank = "Lazerwave";

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time = htmlspecialchars(date("H:i:s"));
$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
//$User_agent = htmlspecialchars($_SERVER["HTTP_USER_AGENT"]);
$session_id = session_id();



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




//NOW FETCH USER DETAILS//


$sender_acct = $results["Account_no"];
$receiver_acct = $ReceiverDetails["Account_no"];

$type_name = "Interbank Transfer via Money Request To ". $ReceiverDetails["Surname"]." ". $ReceiverDetails["Last_name"].
" ". $ReceiverDetails["First_name"]. "(".
$receiver_acct. ") Insufficient Funds" ;


//NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//

$remark = "- Debit";
$status_remark = "Failed";

$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$_SESSION[New_user]','$transaction_id','$data[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent')";

if(mysqli_query($conn,$insert)){


        die("insufficent Funds");



}else{


    die("Failed,please try again");

}
    }



}else{
//ITS NOT MONEY REQUEST//

    die("Authorization Failed");

}




    }else{


        //USER PIN MISMATCH//
        die("Pin mismatch");
    }




}else{


    //USER HAS NOT CREATED TRANSACTION PIN YET//
    die("Please create Transaction pin");

}

}else{

    die("Invalid Request type");
}