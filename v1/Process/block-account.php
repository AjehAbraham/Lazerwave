<?php
require_once __DIR__.("/sessionPage.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["Transaction-pin"])){

  $transaction_pin = $_POST["Transaction-pin"];
}else{

  die("<b style='color: red;'>Please enter your Transaction pin</b>");

}


  if (empty($transaction_pin)){


    die("<b style='color: red;'>Please enter pin.</b>");

  }else{

    htmlspecialchars($transaction_pin);

  }



if(isset($_POST["status"]) && !empty($_POST["status"])){

$status = htmlspecialchars($_POST["status"]);

/*if($status == "Block" or $status == "Unblock"){



  $status = htmlspecialchars($status);
  

}else{

  die("Error Fetching status");
  


}
*/

}else{

  die("Error processing Request");

}


  $date = date("Y/m/d H:i:s");
  $time = date("H:i:s");


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

$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);




//check if transaction pin match or is valid

$check_pin = "SELECT * FROM User_pin WHERE User_id = '$_SESSION[New_user]'";

$check_pin_result = mysqli_query($conn,$check_pin);

if(mysqli_num_rows($check_pin_result) > 0){


  $UserPid = mysqli_fetch_assoc($check_pin_result);
  

if (password_verify($transaction_pin,$UserPid["Pin"]) == "password_hash"){

  
require_once "db_connection.php";



//CHECK USER PREVOIUS ACCOUNT STATUS//

$block = "SELECT * FROM Block_account WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1";

$Results = mysqli_query($conn,$block);

if(mysqli_num_rows($Results) > 0){


  $acctStatus = mysqli_fetch_assoc($Results);

  if($acctStatus["Account_status"] == "Block"){


    $status = "Unblock";

  }elseif($acctStatus["Account_status"] == "Unblock"){


    $status = "Block";

  }else{


    $status = "disabled";
  }

}else{


  $status = "Block";

}

$insert = "INSERT INTO Block_account (User_id	,Account_status,Date,Ip_addr,User_agent)

VALUES('$_SESSION[New_user]','$status','$date','$ip','$user_agent')

";



if(mysqli_query($conn,$insert)){

//INSERT INTO BLOCK ACCOUNT HISTORY//


$insert_record = "INSERT INTO Block_account_history(User_id,Account_status,Date,Ip_addr)
  
VALUES('$_SESSION[New_user]','$status','$date','$ip')

";

if(mysqli_query($conn,$insert_record)){


  die($status);
  
}else{

//FAIL TO UPDATE HISTORY//
die("Error occured");

}


}else{

//FAILED TO BLOCK USER ACCOUNT//

die("<b style='color: red;'>Failed to ".$status." your Account</b>");

}
  
  
  }else{
  
  

    die("<b style='color: red;'>Invalid pin.</b>");
  }
  



}else{


  die("<b style='color: red;'>Please create Transaction pin</b>");
}


mysqli_close($conn);

  }else{

    header("Location:Warning");
    exit;
  }


?>


          </div>
