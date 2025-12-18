<?php require_once __DIR__.("/sessionPage.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

      //header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){


//require_once "Check block account.php";

//require_once "Check daily limit.php";
//print_r($_POST);

//die();

if(!isset($_POST["Acct_no"]) && empty($_POST["Acct_no"])){


    die("Account number Error");

}else{


$act_no = (int) filter_var($_POST["Acct_no"],FILTER_VALIDATE_INT);


}


if(!isset($_POST["amount"]) && empty($_POST["amount"])){


die("Amount error");

}else{


$amount = (int) filter_var($_POST["amount"],FILTER_VALIDATE_INT);

}


if(isset($_POST["remark"]) && !empty($_POST["remark"])){

$remark_message = filter_var($_POST["remark"],FILTER_SANITIZE_STRING);

$remark_message = htmlspecialchars($remark_message);

}else{

$remark_message = "";


}

if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){


    $pin = htmlspecialchars($_POST["Transaction-pin"]);


}else{


    die("Please enter your Transaction pin");


}


require_once "db_connection.php";

$act_no = stripcslashes($act_no);
$amount = stripslashes($amount);
$remark_message = stripslashes($remark_message);

$act_no = mysqli_real_escape_string($conn,$act_no);
$amount = mysqli_real_escape_string($conn,$amount);
$remark = mysqli_real_escape_string($conn,$remark_message);
$pin = mysqli_real_escape_string($conn,$pin);
$pin = trim($pin);

//CHECK USER PIN IF IT IS VALID OR NOT//
$check = "SELECT * FROM User_pin WHERE User_id ='$_SESSION[New_user]'";


$pinResult = mysqli_query($conn,$check);

if(mysqli_num_rows($pinResult) > 0){

$userPin = mysqli_fetch_assoc($pinResult);

if(password_verify($pin,$userPin["Pin"]) == "password_hash"){


    //USER PIN IS VALID//

}else{


    die("Invalid Transaction Pin");
}



}else{


//USER HAS NOT CREATED A TRANSACTION PIN//

die("Please create Transaction pin");

}


//CHECK SENDER ACCOUNT BALANCE//

$user_bal = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

$user_result = mysqli_query($conn,$user_bal);

$user = mysqli_fetch_assoc($user_result);

//var_dump($user);
//die();

require_once "check-block-account.php";


if($user["Account_balance"] < $amount){
//INSERT RECORDS TO USER TRANSACTION HISTROY//

die("Insufficient Funds");


}else if($amount > $user["Account_balance"]){

    die("Insufficient Funds");

}else{

//USER BALANCE IS SUFFICIENT FOR THIS tRANSACTION..//


}
//RECORDS TO INSERT TO TRANSACTION HISTORY//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "Transfer";
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

$receiver_details = "SELECT * FROM Register_db WHERE Account_no ='$act_no'";

$acct_details = mysqli_query($conn,$receiver_details);

if(mysqli_num_rows($acct_details) > 0){


    $receiver_info = mysqli_fetch_assoc($acct_details);


}else{

//print_r($_POST);
//die();
    $checkUsername = "SELECT * FROM Username WHERE Username='$_POST[Acct_no]'";


    $usernameResult = mysqli_query($conn,$checkUsername);
  
    if(mysqli_num_rows($usernameResult) > 0){
        
        $username = mysqli_fetch_assoc($usernameResult);
  

//NOW FETCH USER DETAILS//

$receiver_details = "SELECT * FROM Register_db WHERE id='$username[User_id]'";

$acct_details = mysqli_query($conn,$receiver_details);


    $receiver_info = mysqli_fetch_assoc($acct_details);
        


    }else{


die("Error occur while fetching user details,please try again.");

}

}

$sender_acct = $user["Account_no"];
$receiver_acct = $receiver_info["Account_no"];

$type_name = "Interbank Transfer To ". $receiver_info["Surname"]." ". $receiver_info["Last_name"].
" ". $receiver_info["First_name"]. "(".
$receiver_acct. ")" ." ". $remark_message;

$fullName =  $receiver_info["Surname"]." ". $receiver_info["Last_name"].
" ". $receiver_info["First_name"];

//NOW DEBIT USER THE AMOUNT//

$Sender_new_bal = $user["Account_balance"] - $amount;
$receiver_new_bal = $receiver_info["Account_balance"] + $amount;

//UPDATE SENDER AND RECEIVER ACCOUNT BALANCE//

$update_sender = "UPDATE Register_db SET Account_balance='$Sender_new_bal' WHERE id='$_SESSION[New_user]'";


if(mysqli_query($conn,$update_sender)){

//NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//

$remark = "- Debit";
$status_remark = "Successful";

$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$_SESSION[New_user]','$transaction_id','$amount','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";


if(mysqli_query($conn,$insert)){

//NOW UPDATE RECEIVER ACCOUNT BALANCE AND HISTORY   
$update_receiver = "UPDATE Register_db SET Account_balance ='$receiver_new_bal' WHERE id='$receiver_info[id]' or Account_no='$receiver_info[Account_no]'";

if(mysqli_query($conn,$update_receiver)){

//INSERT RECORDS TO RECIEVER TRANSACTION HISTORY//
$remark = "+ Credit";
$status_remark = "Successful";

$type_name = "Interbank Transfer From ". $user["Surname"]." ". $user["Last_name"].
" ". $user["First_name"]. "(".
$user["Account_no"]. ")" ." ". $remark_message;


$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$receiver_info[id]','$transaction_id','$amount','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";

if(mysqli_query($conn,$insert)){

//TRANSACTION SUCCESSFULY AND COMPLETED//

$_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
"UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");


$_SESSION["Transaction-type"] = array("Type" => "Transfer", 
"full_name" => $fullName,"Acct_no" => $receiver_acct);

$type_name = "Your account has been credited via Interbank Transfer from ". $user["Surname"]." ". $user["Last_name"].
" ". $user["First_name"]. "(".
$user["Account_no"]. ")" ." ". $remark_message;

$PopMessage = $type_name; 
 $PopUserId = $_SESSION["New_user"];
 $PopRecieverId = $receiver_info["id"];
 $PopStatus ="" ;
$PopType = $type;
$PopIp = $ip_add;
require_once "pop-notification.php";

die("Success");

}else{

//FAILED TO INSER RECORD TO RECEIVER TRANSACTION HISTORY//

//LODGE COMPLAIN AND CREATE TRANSACTION HISTORY FOR USER//

$_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
"UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");

die("Success");


}

//REQUIRE AND SEND BOTH SENDER AND RECEIVER AN EMAIL ABOUT THE CREDIT AND DEBIT ALERT//


}else{

//FAILED TO UPDATE RECEIVER ACCOUNT BALANCE//

//NOW REVERSER SENDER FUNDS OR LODGE COMPLAINT REQUEST TO ADMIN//

die("Transaction Failed");


}




}else{
//FAILED TO INSERT SENDER TRANSACTIONS HISTORY DATAS//

die("An unknown error has occur while processing your Transaction.");

}


}else{

//FAILED TO UPDATE SENDER ACCOUNT BALANCE//

die("Transaction Failed,Please try again");


}

mysqli_close($conn);

}
?>




