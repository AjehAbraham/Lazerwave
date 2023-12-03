<?php
require_once "sessionPage.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

    //  header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["reason"]) && !empty($_POST["reason"])){

$reason = filter_var($_POST["reason"],FILTER_SANITIZE_STRING);


}else{

die("Please enter reason");


}

if(isset($_POST["card_no"]) && !empty($_POST["card_no"])){


$card_no = (int) filter_var($_POST["card_no"],FILTER_SANITIZE_NUMBER_INT);



}else{

    die("Invalid request");
    
}

if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){


$transaciotn_pin = htmlspecialchars($_POST["Transaction-pin"]);


$transaciotn_pin = (int) filter_var($transaciotn_pin,FILTER_SANITIZE_NUMBER_INT);

}else{


    die("Please enter Transaction Pin");


}



require_once "db_connection.php";

$reason = stripslashes($reason);
$card_no = stripslashes($card_no);
$transaciotn_pin = stripslashes($transaciotn_pin);

$reason = mysqli_real_escape_string($conn,$reason);

$card_no = mysqli_real_escape_string($conn,$card_no);

$transaciotn_pin = mysqli_real_escape_string($conn,$transaciotn_pin);



$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);


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




$user_pin ="SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1";

//$results=$conn -> query($user_pin);

$results = mysqli_query($conn,$user_pin);

if(mysqli_num_rows($results) > 0){

//CHECK IF PIN MATCH//
$pin_result = mysqli_fetch_assoc($results);

//CHECK IS tRANSACTION PIN MATCHES//

if(password_verify($transaciotn_pin,$pin_result["Pin"]) == "password_hash"){

//TRANSACTION PIN IS VALID//


//NOW FETCH CARD DETAILS AND UPDATE IT//
$card_details = "SELECT * FROM User_card WHERE id='$card_no' AND User_id='$_SESSION[New_user]'";

$card_result = mysqli_query($conn,$card_details);

if(mysqli_num_rows($card_result) > 0){
//CARD DETAILS HAS BEEN FOUND//

$user_card = mysqli_fetch_assoc($card_result);
//NOW CHECK STATUS SO YOU CAN UPDATE IT//

if($user_card["Status_r"] == "Block"){


$status_r = "UnBlock";

}else if($user_card["Status_r"] == "UnBlock"){


$status_r = "Block";


}

//NOW UPDATE CARD DETAILS
$update = "UPDATE User_card SET Status_r ='$status_r' WHERE User_id='$_SESSION[New_user]' AND id='$card_no'"
;

if(mysqli_query($conn,$update)){

//CARD HAS BEEN (BLOCK,UNBLOCK)//

die("success");
/*
$insert ="INSERT INTO Credit_card_history(
    User_id,Card_no,Hash_link,Ip_country,Status,Date,Time,Ip_addr)

    VALUES('$_SESSION[New_user]','$user_card[Card_no]',
    '$user_card[Hash_key]','$ip_add','$status_r','$date','$time','$ip_add')
    ";       


if(mysqli_query($conn,$insert)){

die("success");


}else{


die("Error updating card");

}
*/


}else{

//FAILED TO UPDATE CARD

die("Failed to update card details");

}

 



}else{


//CARD DETAILS CANNOT BE FOUND


die("Error fetching card Details");

}



}else{


//TRANSACTION PIN IS NOT VALID//

die("Incorrect Transaction pin");


}




}else{

//NO TRANSACTION PIN//

die("Please create Transaction pin");



}








}