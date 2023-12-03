<?php
session_start();


//require_once "Daily visitors.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

      ////header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}




if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["card_no"]) && !empty($_POST["card_no"])){

$card_no =(int) filter_var($_POST["card_no"],FILTER_SANITIZE_NUMBER_INT);


if(empty($card_no)){

die("Please enter card Number");


}else if(strlen($card_no) <= 13){


die("Card number too short");


if(strlen($card_no) >=16){


die("Card number too long");



}


}else{

    $card_no = htmlspecialchars($card_no);

}



}else{




die("Please enter your card number");


}

if(isset($_POST["Exp"]) && !empty($_POST["Exp"])){


$exp =(int) filter_var($_POST["Exp"],FILTER_SANITIZE_NUMBER_INT);


if(empty($exp)){

die("Please enter card Expiry date");




}else if(strlen($exp) < 4){


die("Invalid Expiry Year");




}else{

//CHECK IF DATE IS LESS THAN CURRENT DATE//

$less = date("Y");

if($exp < $less){

die("Expiry Date cannot be in the past or less than ".$less);


}


$exp = htmlspecialchars($exp);




}


}else{


    die("please enter card Expiry Year");
}


if(isset($_POST["cvv"]) && !empty($_POST["cvv"])){


$cvv =(int) filter_var($_POST["cvv"],FILTER_SANITIZE_NUMBER_INT);


if(empty($cvv)){

die("Please enter card  CVV");




}else if(strlen($cvv) < 3){


die("Card CVV too short");



if(strlen($cvv) >=4){



die("CVV too long");



}


}else{


$cvv = htmlspecialchars($cvv);




}


}else{


    die("Please enter your CVV");
}


if(isset($_POST["pin"]) && !empty($_POST["pin"])){

$pin =(int) filter_var($_POST["pin"],FILTER_SANITIZE_NUMBER_INT);


if(empty($pin)){


die("Please enter card  Pin");


}else if(strlen($pin) < 4){


die("Pin must be at least 4 digit");


}else{


$pin = htmlspecialchars($pin);




}

}else{


    die("Please enter card pin");
}

//AFTER VALIDATIONS NOW CHECK IF CARD DETAILS ARE CORRECT AND VALID//

require_once "db_connection.php";

$card_no = mysqli_real_escape_string($conn,$card_no);

$exp = mysqli_real_escape_string($conn,$exp);

$ccv = mysqli_real_escape_string($conn,$cvv);

$pin = mysqli_real_escape_string($conn,$pin);

$card_no = stripslashes($card_no);

$exp = stripslashes($exp);

$cvv = stripslashes($cvv);

$pin = stripslashes($pin);

//CHECK IF LINK HAS WAS SENT TOGETHER WITH THE FORM

if(isset($_POST["id"]) && !empty($_POST["id"])){


    $hash_link = htmlspecialchars($_POST["id"]);

}else{


    die("Failed to fetch link details");
}

$hash_link = mysqli_real_escape_string($conn,$hash_link);
$hash_link = stripslashes($hash_link);

$select = "SELECT * FROM Payment_link_table WHERE Hash_link='$hash_link'";

$link_result = mysqli_query($conn,$select);

if(mysqli_num_rows($link_result) > 0){

$linkDetails = mysqli_fetch_assoc($link_result);


}else{

//PAYMENT HASH_LINK IS INVALID//
die("Error proccessing payment due to some error validating this link");

}

//CHECK CARDS IF MATCH CAN BE FOUND//

$card_details = "SELECT * FROM User_card WHERE Card_no='$card_no'";

//$card_result = $conn -> query($card_details);
$card_result = mysqli_query($conn,$card_details);

if(mysqli_num_rows($card_result)> 0){

//A MATCH FOR THIS CARD HAS BEEN FOUND AND WE NEED TO VALIDATE IT AND MAKE SURE EVERY DETAILS IS CORRECT//
$UserCard = mysqli_fetch_assoc($card_result);
if($UserCard["Exp_date"] != $exp){
    //EXPIRY YEAR DOES NOT MATCH//

    die("Card Validation Failed");
}
if($UserCard["Ccv"] != $cvv){

    die("Card Validation Failed");
}

//CHECK IF CARD IS BLOCKED//
if($UserCard["Status_r"] == "Block"){

die("Card is InActive");

}

//NOW CHECK IF CARD PIN MATCHES//
if(password_verify($pin,$UserCard["Pin"]) == "password_hash"){

//CARD PIN MATCH AND YOU CAN PROCCEED//
//NOW CHECK IF CARD HOLDER ACCOUNT IS BLOCKED//
$Acct_status = "SELECT * FROM Block_account WHERE User_id='$UserCard[User_id]' ORDER BY id DESC LIMIT 1";

 $acct_result = mysqli_query($conn,$Acct_status);

 if(mysqli_num_rows($acct_result) > 0){

    $UserStatus = mysqli_fetch_assoc($acct_result);

    if($UserStatus["Account_status"] == "Block"){

        die("Card holder account is not Active");

    }


 }else{

//USER HAS NEVER EVER BLOCK THEIR ACCOUNT//


 }

//NOW CHECK CARD HOLDER ACCOUNT BALANCE //

$bal = "SELECT * FROM Register_db WHERE id='$UserCard[User_id]'";


$cardOwner_details = mysqli_query($conn,$bal);

$UserData = mysqli_fetch_assoc($cardOwner_details);

if($linkDetails["Amount"] <= $UserData["Account_balance"]){

//CARD OWNER ACCOUNT BALANCE IS SUFFICIENT AND READY TO PROCCEED//


//RECORDS TO INSERT TO TRANSACTION HISTORY//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "payment link";
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



//CREDIT PAYMENT LINK OWNER//

//FIRST FETCH LINK OWNER BALANCE//
$owner_bal = "SELECT * FROM Register_db WHERE id='$linkDetails[User_id]'";
$owner_result = mysqli_query($conn,$owner_bal);

$OwnerBal = mysqli_fetch_assoc($owner_result);

$ownerNew_bal = $OwnerBal["Account_balance"]  + $linkDetails["Amount"];


$sender_acct = $UserData["Account_no"];
$receiver_acct = $OwnerBal["Account_no"];


$card_first_four = substr($card_no, 0,5);
$card_last_four = substr($card_no,0,-5);

$fullCard = $card_first_four . "*****". $card_last_four;

$type_name = $linkDetails["Title"] ." To ". $OwnerBal["Surname"]. " ".
 $OwnerBal["Last_name"]. " ".  $OwnerBal["First_name"]. " using your card ". $fullCard;

$status_remark = "Successful";


$update = "UPDATE Register_db SET Account_balance='$ownerNew_bal' WHERE id='$linkDetails[User_id]'";

if(mysqli_query($conn,$update)){
//USER ACCOUNT BALANCER HAS BEEN UPDATED//
//DEBIT CARD HOLDER ACCOUNT BALANCE//

$CardBal =$UserData["Account_balance"] - $linkDetails["Amount"];

$debitCard = "UPDATE Register_db SET Account_balance='$CardBal' WHERE id='$UserData[id]'";

if(mysqli_query($conn,$debitCard)){

//INSERT INTO TRANSACTION HISTORY FOR LINK OWNBWER AND CADR HOLDER//
$remark = "- Debit";

$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$UserData[id]','$transaction_id','$linkDetails[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";


$type_name = $linkDetails["Title"] ." From ". $UserData["Surname"]. " ". $UserData["Last_name"]. " ".
 $UserData["First_name"]. " using card ". $fullCard;

$remark = "+ Credit";

$inserts= "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$linkDetails[User_id]','$transaction_id','$linkDetails[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";

if(mysqli_query($conn,$insert)){

    //YOU CAN INCLUDE DEBIT AND CREDIT ALERT FOR BOTH PARTIES//

    if(mysqli_query($conn,$inserts)){


        
    }
    $fullName = $UserData["Surname"];
    // " ". $UserData["Last_name"]. " ". $UserData["First_name"];

    $_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
    "UserName" => $fullName, "Amount" => $linkDetails['Amount'], "Status" => "Successful");


    $amount = $linkDetails['Amount'];
    
$PopMessage = "Your account has been debited using your lazerwave card ".$fullCard. 
" to ". $OwnerBal["Surname"]." " .$OwnerBal["Last_name"]. " " . $OwnerBal["First_name"] .
" from  Ip address ". $ip_add; 
$PopUserId =$linkDetails['User_id'] ;
$PopRecieverId = $UserData['id'];
$PopStatus ="" ;
$PopType = $type;
$PopIp = $ip_add;
require_once "pop-notification.php";

    die("success");
}else{

//
die("Transaction Pending");


}


}else{
//CARD HOLDER BALANCE WAS NOT DEBITED//



}

}else{
    //FAILED TO UPDATE USER ACCOUNT BALANCE//   

die("Payment Failed");


}




}else{

//INSUFFICIENT FUNDS//


//RECORDS TO INSERT TO TRANSACTION HISTORY//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "payment link";
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



//CREDIT PAYMENT LINK OWNER//

//FIRST FETCH LINK OWNER BALANCE//
$owner_bal = "SELECT * FROM Register_db WHERE id='$linkDetails[User_id]'";
$owner_result = mysqli_query($conn,$owner_bal);

$OwnerBal = mysqli_fetch_assoc($owner_result);

$ownerNew_bal = $OwnerBal["Account_balance"]  + $linkDetails["Amount"];


$sender_acct = $UserData["Account_no"];
$receiver_acct = $OwnerBal["Account_no"];

$type_name = $linkDetails["Title"] ." To ". $OwnerBal["Surname"]. " ".  $OwnerBal["First_name"];

$status_remark = "Failed";

$remark = "- Debit";

$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$UserData[id]','$transaction_id','$linkDetails[Amount]','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";

if(mysqli_query($conn,$insert)){

    die("Insufficient Funds");


}else{


    //FAILED TO UPDATE TRANSACTION HISTORY//
die("Server error");

}

}



}else{

    //INCORRECT CARD PIN//
    //YOU CAN NOTIFY USER OF ATTEMPT//

    die("Incorrect Pin");
}



}else{
//NO MATCH WAS FOUND FOR CARD//

    die("Invalid card");
}


mysqli_close($conn);

}else{

    header("Location: Warning");
    exit;
}