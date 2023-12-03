<?php
session_start();
if(!isset($_SESSION["reg_auth"])){

//header("Location: create-account");
//exit;
    die("Invalid Request");

}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

    //  header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}

$email = $_SESSION["reg_auth"];

//CHECK IF USER DETAILS IS IN REGISTER DATABASE//   


require_once "db_connection.php";


$check = "SELECT * FROM Register_db WHERE Email='$email'";


$check_result = mysqli_query($conn,$check);

if(mysqli_num_rows($check_result) > 0){


//USER HAS ALREADY FINISH SETTING UP PROFILE
die("Your info is up to date");

    
}else{


//CHECK USER EMAIL IN TEMEPORY DATABASE//

$temp = "SELECT * FROM Register_tmp WHERE Email='$email'";

$temp_result = mysqli_query($conn,$temp);

if(mysqli_num_rows($temp_result) > 0){

//USER HAS NOT FINISH SETTING UP PROFILE//

$user_info = mysqli_fetch_assoc($temp_result);

   
}else{

unset($_SESSION["reg_auth"]);


    die("Error");
    
}


//print_r($_POST);

if(isset($_POST["surname"]) && !empty($_POST["surname"])){



    $surname = htmlspecialchars($_POST["surname"]);

    
if (!preg_match("/^[a-zA-Z-']*$/",$surname)){


    die("only letters and white spaces are allowed for Surname");

}else{


    $surname = strtoupper($surname);
}


}else{


    die("Please enter your surname");


}


if(isset($_POST["lastname"]) ){



    $last_name = htmlspecialchars($_POST["lastname"]);

    
if (!preg_match("/^[a-zA-Z-']*$/",$last_name)){


    die("only letters and white spaces are allowed for Lastname");

}else{


    $last_name = strtoupper($last_name);


}



}else{


//DO NOTHING AS LASTNAME IS OPTIONAL//

$last_name = "";
    }






if(isset($_POST["firstname"]) && !empty($_POST["firstname"])){



    $first_name = htmlspecialchars($_POST["firstname"]);



    
if (!preg_match("/^[a-zA-Z-']*$/",$first_name)){


    die("only letters and white spaces are allowed for Firstname");

}else{

$first_name = strtoupper($first_name);


}


}else{


    die("Please enter your Firstname");


}



if(isset($_POST["gender"]) && !empty($_POST["gender"])){


if($_POST["gender"] == "Male" || $_POST["gender"] == "Female"){


$gender = htmlspecialchars($_POST["gender"]);

    
}else{
    //INVALID GENDER//

    die("Invalid Gender,Please select Male or Female");
    

}

    

}else{

die("Please select a Gender");

}
$date =htmlspecialchars(date("Y/m/d"));
$time =htmlspecialchars(date("H:i:s"));
$acct_no = rand();
$terms = "Yes";
$acct_bal = 33000;
$country = $user_info["Country"];
$email = $user_info["Email"];
$password = $user_info["Password"];

//CHECK IF ACCOUNT NUMBER EXIT//

$VERIFY = "SELECT * FROM Register_db WHERE Account_no='$acct_no'";

$acct_result = mysqli_query($conn,$VERIFY);

if(mysqli_num_rows($acct_result) > 0){

//ACCOUNT NUMBER EXITS//

$acct_no = rand(43129,90563);


}else{

//ACCOUNT NUMBER DOES NOT EXITS// 



}


$insert ="INSERT INTO Register_db(Surname,Last_name,First_name,Country,
Email,Password,Gender,I_agree,Account_no,Account_balance,Date_reg,Time_reg)

VALUES('$surname','$last_name','$first_name','$country','$email','$password','$gender',
'$terms','$acct_no','$acct_bal','$date','$time')

";

if(mysqli_query($conn,$insert)){

    $last_id = mysqli_insert_id($conn);

    session_regenerate_id();
    
    unset($_SESSION["reg_auth"]);
    
    $_SESSION["New_user"] = $last_id; 
    
    require_once "save season id.php";

    $date = htmlspecialchars(date("Y/m/d H:i:s"));
    $time= htmlspecialchars(date("H:i:s"));
    $ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
    $transaction_id = rand(2124,84984). uniqid();
    $type = "Bonus";
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
    

$sender_acct = "Lazerwave";
$receiver_acct = $acct_no;

$type_name = "Registration Welcome Bonus";
    

$remark = "+ Credit";
$status_remark = "Successful";


$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$last_id','$transaction_id','$acct_bal','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";
if(mysqli_query($conn,$insert)){

    $PopMessage = $type_name; 
    $PopUserId = 20202020;
    $PopRecieverId = $last_id;
    $PopStatus ="" ;
   $PopType = $type;
   $PopIp = $ip_add;
   $amount = $acct_bal;
   require "pop-notification.php";



}else{



}



//CHECK IF THERE IS REFREAL CODE//
$referalCode ="SELECT * FROM Refer_and_earn WHERE Link_key='$user_info[Key_id]'";

$referResult = mysqli_query($conn,$referalCode);

if(mysqli_num_rows($referResult) > 0){

    $code = mysqli_fetch_assoc($referResult);



    //FTECH USER INFO AND CREDIT THEM//

    $select = "SELECT * FROM Register_db WHERE id='$code[User_id]'";

    $codeResult = mysqli_query($conn,$select);

    $codeuser = mysqli_fetch_assoc($codeResult);
$ammt = 500;
$amounts = $codeuser["Account_balance"] + $ammt;




$update = "UPDATE Register_db SET Account_balance='$amounts' WHERE id='$codeuser[id]'";

if(mysqli_query($conn,$update)){

//UPDATE USER ACCOUNT BALANCE HISTORY//


$sender_acct = "Lazerwave";
$receiver_acct = $codeuser["Account_no"];

$type_name = "Referal Bonus";
 
$transaction_id = rand(1293,19832). uniqid();


$insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$codeuser[id]','$transaction_id','$ammt','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
";
if(mysqli_query($conn,$insert)){


    //INSERT INTO REFERAL RECORD//
    $sta = "success";

    $inserts = "INSERT INTO Refer_and_record(User_id,Amount,Link_key,Referal_user_id,Status,Date	
    )
    VALUES('$codeuser[id]','$ammt','$code[Link_key]','$last_id','$sta','$date')
    
    ";

if(mysqli_query($conn,$inserts)){



}
    //INSERT TO POP NOTIFICATION//

    $PopMessage = $type_name; 
    $PopUserId = 2020202020;
    $PopRecieverId = $codeuser["id"];
    $PopStatus ="" ;
   $PopType = $type;
   $PopIp = $ip_add;
   $amount = $ammt;
   require "pop-notification.php";


}else{




}

}



}else{

    //REFERAL CODE IS NOT VALID ELSE DO NOTHING//
}

die("success");

}else{


die("Failed,Please Retry");



        }

mysqli_close($conn);


}

