<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["request"]) && isset($_POST["amount"])){

$username = htmlspecialchars($_POST["request"]);

$amount = (int) filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT);


if(empty($username)){

    die("Please enter Username or Account Number");

}else{


$username = htmlspecialchars($username);

}

if(empty($amount)){

    die("Please enter Amount");
}else{


    $amount = htmlspecialchars($amount);
}




require_once "db_connection.php";

$username = mysqli_real_escape_string($conn,$username);
$amount = mysqli_real_escape_string($conn,$amount);



//FETCH CURRENT USER DETAILS//

$select = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

$user_result = mysqli_query($conn,$select);
$user = mysqli_fetch_assoc($user_result);



  //ITMES TO INSERT TO NOTIFICATION TABLE
  
  $ip_addr =htmlspecialchars($_SERVER["REMOTE_ADDR"]);
  $date =htmlspecialchars(date("Y-m-d H:i:s"));
  
  $time = htmlspecialchars(date("H:i:s"));
  
  $notify = uniqid();
  
  $type= "Money request";
  
  $status = "Null";
  //NOW CHECK USERNAME///
  


//VERIFY USERNAME //
//REMOVE ANY SPECIAL CHARS USER ADDED//
//$username = preg_replace('/[^A-Za-z0-9\-]/', '', $username);

//THEN ADD IT TO SREACH//
//$username = "@". $username;

$check = "SELECT * FROM Username WHERE Username='$username' ";

$result = mysqli_query($conn,$check);


if(mysqli_num_rows($result) > 0){

//USERNAME HAS BEEN FOUND//

$details = mysqli_fetch_assoc($result);

//CHECK IF USER NAME OR ACCOUNT NUMBER IS FOR CURRENT USER//

if($details["User_id"] == $_SESSION["New_user"]){


    die("Username <b>".$username. "</b> is your username" );

}else{

    

    $message ="Money Request from "
    .$user['Surname']. ' '. $user['Last_name'].' '. $user['First_name'];
  


//INSERT INFO INTO NOTIFICATION//
$insert = "INSERT INTO Notification(User_id,Amount,Message,Receiver_id,Notify_id,Type,
Date,Time,Ip_addr,Status)
VALUES('$details[User_id]','$amount','$message','$user[id]','$notify','$type','$date',
'$time','$ip_addr','$status')
";


if(mysqli_query($conn,$insert)){

    $PopMessage = $message; 
    $PopUserId = $_SESSION["New_user"];
    $PopRecieverId = $details["User_id"];
    $PopStatus ="" ;
    $PopType = "Money request";
    $PopIp = $ip_addr;
    require_once "pop-notification.php";

    
    die("success");

}else{

die("Error occured,please try again");

}
    




}
 


}else{


//USERNAME NOT FOUND TRY CHECKING REGISTER DATABASE IF USER IS USING ACCOUNT NUMBER//


$check = "SELECT * FROM Register_db WHERE Account_no='$username' ";

$result = mysqli_query($conn,$check);


if(mysqli_num_rows($result) > 0){

//ACOUNT NUMBER HAS BEEN FOUND//

$details = mysqli_fetch_assoc($result);

//CHECK IF USER NAME OR ACCOUNT NUMBER IS FOR CURRENT USER//

if($details["id"] == $_SESSION["New_user"]){


    die("<b>" .$username. "</b> is your Account Number" );
    
}else{


    $message ="Money Request from "
    .$user['Surname']. ' '. $user['Last_name'].' '. $user['First_name'];
  


//INSERT INFO INTO NOTIFICATION//
$insert = "INSERT INTO Notification(User_id,Amount,Message,Receiver_id,Notify_id,Type,
Date,Time,Ip_addr,Status)
VALUES('$details[id]','$amount','$message','$details[id]','$notify','$type','$date',
'$time','$ip_addr','$status')
";


if(mysqli_query($conn,$insert)){
    
$PopMessage = $message; 
$PopUserId = $_SESSION["New_user"];
$PopRecieverId = $details["id"];
$PopStatus ="" ;
$PopType = "Money request";
$PopIp = $ip_addr;
require_once "pop-notification.php";


    die("success");

}else{

die("Error occured,please try again");

}

}
 
}else{


//ACCOUNT NUMBER NOT FOUND EITHER//

die("Invalid username or Account Number");


}





}



mysqli_close($conn);

}else{

//INVALID FORM
die("Error proccessing your request");

}



}else{


    header("Location: Warning");
    exit;
}