<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);


    if(isset($_POST["card_no"]) && !empty($_POST["card_no"])){


        $card_no = (int) filter_var($_POST["card_no"],FILTER_SANITIZE_NUMBER_INT);

        if(empty($card_no)){


            die("Please enter card number");

        }elseif(strlen($card_no) <= 14){


            die("Card number too short");
        }else{

            if(strlen($card_no) >= 16){

                die("Card number too long");
            }

            $card_no = htmlspecialchars($card_no);

        }
    }else{


        die("Please enter Card Number");
    }


    if(isset($_POST["Exp"]) && !empty($_POST["Exp"])){


        $Exp = (int) filter_var($_POST["Exp"],FILTER_SANITIZE_NUMBER_INT);

        if(empty($Exp)){


            die("Please enter Expiry Year");

        }elseif(strlen($Exp) <= 3){


            die("Expiry year too short");
        }else{

            if(strlen($Exp) >= 5){

                die("Expiry year too long");
            }elseif ($Exp < date("Y")){


                die("Expiry Year cnnot be in the past");

            }

            $Exp = htmlspecialchars($Exp);

        }
    }else{


        die("Please enter Card Expiry Year");
    }





    if(isset($_POST["cvv"]) && !empty($_POST["cvv"])){


        $cvv = (int) filter_var($_POST["cvv"],FILTER_SANITIZE_NUMBER_INT);

        if(empty($cvv)){


            die("Please enter card CCV");

        }elseif(strlen($cvv) <= 2){


            die("CCV  too short");
        }else{

            if(strlen($cvv) >= 4){

                die("CCV too long");
            }

            $cvv = htmlspecialchars($cvv);

        }
    }else{


        die("Please enter Card CCV");
    }


if(isset($_POST["amount"]) && !empty($_POST["amount"])){

$amount = (int) filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT);

if($amount <= 499){

    die("Amount cannot be less than ₦500");

}else{

    $amount = htmlspecialchars($amount);
}


}else{


    die("Please enter amount");
}

//NOW SEARCH FOR CARD DETAILS//

require_once "db_connection.php";

$card_no = mysqli_real_escape_string($conn,$card_no);
$amount = mysqli_real_escape_string($conn,$amount);
$Exp = mysqli_real_escape_string($conn,$Exp);
$cvv = mysqli_real_escape_string($conn,$cvv);

//var_dump($user);

$select = "SELECT * FROM User_card WHERE Card_no ='$card_no'";

$cardResult = mysqli_query($conn,$select);

if(mysqli_num_rows($cardResult) > 0){

$UserCard = mysqli_fetch_assoc($cardResult);

//NOW CHECK CARD DETAILS IF IT MATCHES//

if($UserCard["Ccv"] == $cvv && $UserCard["Exp_date"] == $Exp && $UserCard["Status_r"] != "Block"){

//CHECK IF USER IS TRYING TO USER THEIR OWN CARD TO CREDIT THEIR CARD//

if($UserCard["User_id"] == $_SESSION["New_user"]){


    die("Failed,the ". $UserCard["Type"] . " is linked to your account  or belonges to you!");
}

//CARD IS READY NOW LETS CHECK USER BALANCE IF IT IS SUFFICIENT//
$checkBal = "SELECT * FROM Register_db WHERE id='$UserCard[User_id]'";

$acountResult = mysqli_query($conn,$checkBal);

$SenderBal = mysqli_fetch_assoc($acountResult);

if( $amount <= $SenderBal["Account_balance"]){

//NOW CHECK IF USER ACCOUNT HAS BEEN BLOCK OR NOT//

$AcctounCheck = "SELECT * FROM Block_account WHERE User_id='$SenderBal[id]' ORDER BY id DESC LIMIT 1";

$StatusResult = mysqli_query($conn,$AcctounCheck);

if(mysqli_num_rows($StatusResult) > 0){
//CHECK IF USER ACCOUNT IS BLOCKED OR NOT//

$userStatus = mysqli_fetch_assoc($StatusResult);

//var_dump($userStatus);

if($userStatus["Account_status"] == "Block"){


    die("Failed because user account is not accessible");

}

}else{

    //USER IS GOOD TO GO//
}

//NOW DEBIT USER AND CREDIT THE TOP-UP USER//

$topupUserBal = $user["Account_balance"] + $amount;
$CardownerBal = $SenderBal["Account_balance"] - $amount;


$update = "UPDATE Register_db SET Account_balance ='$topupUserBal' WHERE id='$user[id]'";


if(mysqli_query($conn,$update)){
//UPDATE SENDER BALANCE//

$updates = "UPDATE Register_db SET Account_balance='$CardownerBal' WHERE id='$SenderBal[id]'";

if(mysqli_query($conn,$updates)){
//INSERT TO BOTH USERS TRANSACTION HISTORY//

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time= htmlspecialchars(date("H:i:s"));
$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
$transaction_id = rand(2124,84984). uniqid();
$type = "Top up(Card)";
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

$card_first_four =substr($card_no,0,5) ;
$card_last_four = substr($card_no, -5);
$fullCard = $card_first_four. "*****".$card_last_four;

$sender_acct = $SenderBal["Account_no"];
$receiver_acct = $user["Account_no"];

$type_name = "Interbank Transfer via Card Top using Lazerwave card ". $fullCard;


//NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//

$remark = "+ Credit";
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

    $remark = "- Debit";
   
$inserts = "INSERT INTO Transaction_history(User_id,Transaction_id,
Amount,Type_name
,Remark,Status_remark,
Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)

VALUES('$SenderBal[id]','$transaction_id','$amount','$type_name','$remark',
'$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
,'$user_agent'
)
"; 

if(mysqli_query($conn,$inserts)){




}


}else{



    //
}

$_SESSION["Receipt-box"] = array("TransactionID" => $transaction_id,
"UserName" => $user["Surname"], "Amount" => $amount, "Status" => "Successful");

$ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
    
$PopMessage = "Your account has been debited using your lazerwave card ".$fullCard. 
" to ". $user["Surname"]." " .$user["Last_name"]. " " . $user["First_name"] .
" from  Ip address ". $ip_add; 
$PopUserId =$_SESSION['New_user'] ;
$PopRecieverId = $SenderBal['id'];
$PopStatus ="" ;
$PopType = $type;
$PopIp = $ip_add;
require_once "pop-notification.php";

die("success");

}else{


    die("Error occured");

}



}else{


    die("Failed,Please try again");
}





    
}else{


    $date = htmlspecialchars(date("Y/m/d H:i:s"));
    $time= htmlspecialchars(date("H:i:s"));
    $ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
    $transaction_id = rand(2124,84984). uniqid();
    $type = "Top up(Card)";
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
    

$card_first_four =substr($card_no,0,5) ;
$card_last_four = substr($card_no, -5);
$fullCard = $card_first_four. "*****".$card_last_four;
    
    $sender_acct = $SenderBal["Account_no"];
    $receiver_acct = $user["Account_no"];
    
    $type_name = "Interbank Transfer via Card Top using Lazerwave card ". $fullCard. " Insufficient Funds";
    
    
    //NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//
    
    $remark = "Failed";
    $status_remark = "Failed";
    
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
    
        $remark = "- Debit";
       
    $inserts = "INSERT INTO Transaction_history(User_id,Transaction_id,
    Amount,Type_name
    ,Remark,Status_remark,
    Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)
    
    VALUES('$SenderBal[id]','$transaction_id','$amount','$type_name','$remark',
    '$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
    ,'$user_agent'
    )
    "; 
    
    if(mysqli_query($conn,$inserts)){
    
    
    
       // die("success");
    
    }
    
    
    }else{
    
    
    
        //
    }
    
    

    die("Insufficient Funds");

}




}else{
    if($UserCard["Status_r"] == "Block"){

        die("Card has been De-activated");

    }


    die("Card Details are not correct");
}



}else{


    die("Error fetching card details or Card is Invalid");

}

mysqli_close($conn);

}else{


    header("Location: Warning");
    exit;
}