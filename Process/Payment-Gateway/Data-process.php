<?php 
require_once __DIR__.("/sessionPage.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["Tel"]) && (!empty($_POST["Tel"]))){

//PHONE NUMBER IS PRESENT


}else{

//NO PHONE NUMBER OR USER HAS TEMPER WITH YOUR FORM

die("Please enter phone number");

}




if(isset($_POST["plan"]) && (!empty($_POST["plan"]))){

  //AMOUNT IS PRESENT
  
  
  }else{
  
  //NO AMOUNT OR USER HAS TEMPER WITH YOUR FORM
  
  die("Please select a Plan");
  
  }



  if(isset($_POST["Provider"]) && (!empty($_POST["Provider"]))){

    //NETWORK PROVIDER IS PRESNET  IS PRESENT
    
    
    }else{
    
    //NO nETWOKR PROVIDER OR USER HAS TEMPER WITH YOUR FORM
    
    die("Please select a Network provider");
    
    }







    $Tel = (int) filter_var($_POST["Tel"],FILTER_SANITIZE_NUMBER_INT);

//$amount = (int) filter_var($_POST["plan"],FILTER_SANITIZE_NUMBER_INT);

$provider = htmlspecialchars($_POST["Provider"]);



if(strlen($Tel) <= 9){

  die("Invalid phone number");

}else if (strlen($Tel) >=12 ){

  die("phone number too long");

}else{


  $Tel = htmlspecialchars($Tel);
}





if($provider != "MTN" && $provider != "9MOBILE"  && 
$provider != "AIRTEL" &&  $provider != "GLO"){

die("Please select a valid network provider");

}else{

$provider = htmlspecialchars($provider);

}




if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){


$Transaction_pin = (int) filter_var($_POST["Transaction-pin"],FILTER_VALIDATE_INT);

}else{

die("Please enter your Transaction pin");

}

$Transaction_pin = stripslashes($Transaction_pin);


$Tel = stripcslashes($Tel);
//$amount = stripslashes($amount);
$provider = stripcslashes($provider);

require_once "db_connection.php";

$DataPlan = "SELECT * FROM Data_plan WHERE Hash='$_POST[plan]'";

$planResults = mysqli_query($conn,$DataPlan);

if(mysqli_num_rows($planResults) > 0){



  $NetworkPlans = mysqli_fetch_assoc($planResults);


}else{


  die("Invalid plan");

}

$amount = $NetworkPlans["Amount"];



$Transaction_pin = mysqli_real_escape_string($conn,$Transaction_pin);

//CHECK USER TRANSACTION PIN//

$user_pin = "SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]'";

$pin_result = mysqli_query($conn,$user_pin);

if(mysqli_num_rows($pin_result) > 0){


  $pin = mysqli_fetch_assoc($pin_result);


  //CHECK IF  PIN MATCH OR NOT//

  if(password_verify($Transaction_pin,$pin["Pin"]) == "password_hash"){

//USER PIN IS VALID//
require_once "check-block-account.php";

  }else{

die("Incorrect Transaction pin");


  }


}else{


  die("Please create your transaction pin");
}

$Tel = mysqli_real_escape_string($conn,$Tel);

$amount = mysqli_real_escape_string($conn,$amount);

$provider = mysqli_real_escape_string($conn,$provider);

//SOME INFOS TO INSERT TO DATABASE//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "Data purchase";
$remark = "- Debit";
$bank = "";
$type_name = $provider. " Data Purchase ". $NetworkPlans["Plan"];
$sender_acct = $provider;
$receiver_acct = $Tel;

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






//CHECK USER ACCOUNT BALANCE // 
$user_balance = "SELECT * FROM Register_db WHERE id ='$_SESSION[New_user]'";

$result = mysqli_query($conn,$user_balance);

$balance = mysqli_fetch_assoc($result);

if($balance["Account_balance"] < $amount){

//USER HAS INSUFFIENT BALANCE TO COMPETE THIS TRANSATIONS

$status_remark = "Failed";

//$status_remark = "Succesful";
//INSERT TO TRANSACTION HISTORY// 


$transaction_data= "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$_SESSION[New_user]','$transaction_id','$amount','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";
if(mysqli_query($conn,$transaction_data)){

//iNSUFFICIENT BALANCE

  die("Insufficent Funds");

}else{
//FAILED TO INSERT BUT STILL DISPLAY INSUFFIICENT BALANC


  die("Insufficent Funds");

}

}else if ($amount <= $balance["Account_balance"]){

//USER BALANCE IS ENOUGH/SUFFCIENT FOR THIS TRANSATIONS
//NOW DEBIT USER ACCOUNT//
$user_new_balance = $balance["Account_balance"] - $amount;

//NOW UPDATE USER ACOUNT BALANCE 

$update_bal = "UPDATE Register_db SET Account_balance ='$user_new_balance' WHERE id='$_SESSION[New_user]'"
;

if(mysqli_query($conn,$update_bal)){


  $status_remark = "Successful";
  //INSERT TO TRANSACTION HISTORY// 
  
  
  $transaction_data= "INSERT INTO Transaction_history(User_id,Transaction_id,
  Amount,Type_name
  ,Remark,Status_remark,
  Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)
  
  VALUES('$_SESSION[New_user]','$transaction_id','$amount','$type_name','$remark',
  '$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
  ,'$user_agent'
  )
  ";
  if(mysqli_query($conn,$transaction_data)){

//DATAS WAS INSERTED SUCCESSFULLY

$_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
"UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");
die("success");

  }else{
//FAILED TO INSERT TO TRANSACTION HISTORY//

die("Unknown error occur,Please try again");

  }



}else{

  //FAILED TO UPDATE USER ACCOUNT//

die("Error occur,Please try again");

}

}else{


die("Error,Please try again");


}

mysqli_close($conn);

}else{


  header("Location: Warning");
  exit;
}

?>

