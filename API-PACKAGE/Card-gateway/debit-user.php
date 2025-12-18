<?php

//CHECK IF USER CARD OR ACCOUNT NUMBER HAS BEEN BLOCKED //
if($UserResult["Status_r"] == "Block"){


    //USER ACCOUNT HAS BEEN BLOCKED//
}else{

//CEHCK IF USER ACCOUNT BEEN BLOCK //

$BlockChecker = "SELECT * FROM Block_account WHERE User_id='$UserResult[User_id]' ORDER BY id DESC LIMIT 1";

$BlockResult = mysqli_query($conn,$BlockChecker);

if(mysqli_num_rows($BlockResult) > 0){



}else{
//USER ACCOUNT HAS NEVER BEEN BLOCK OR IS ACTIVE SO YOU'RE FREE TO DEBIT USER//


//CHECK IF USER ACCOUN BALANCE IS SUFFICIENT//
if($amount <= $user["Account_balance"]){



}else{

    $API_response = array(
        "Status" => "200",
        "Message" => "Insufficient funds",
        "Response" => "",
        "StatusText" => "419",
        "Type" => "Auto-checker",
        "Date" => "$ApiDate",
        );


    die();
}

$CardownerBal =$amount - $user["Account_balance"];

$update ="UPDATE Rgister_db SET Account_balance='$CardownerBal' WHERE id='$user[id]'";


if(mysqli_query($conn,$update)){

    $date = htmlspecialchars(date("Y/m/d H:i:s"));
    $time= htmlspecialchars(date("H:i:s"));
    $ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
    $transaction_id = rand(2124,84984). uniqid();
    $type = "Top up(card)";
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
    


    $sender_acct = $user["Account_no"];
    $receiver_acct = $keyOwner["Account_no"];
    
    $type_name = "Interbank Transfer To ".$keyOwner["First_name"]. " ". $keyOwner["Last_name"]
    ." ".$keyOwner["First_name"]. "(".
    $receiver_acct. ")" ." ";
    
    //NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//
    
    $remark = "- Debit";
    $status_remark = "Successful";
    
    $insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
    Amount,Type_name
    ,Remark,Status_remark,
    Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)
    
    VALUES('$user[id]','$transaction_id','$amount','$type_name','$remark',
    '$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
    ,'$user_agent'
    )
    ";
    
    if(mysqli_query($conn,$insert)){

        require_once "credit-user.php";


    }else{


        $API_response = array(
            "Status" => "200",
            "Message" => "Pending",
            "Response" => "",
            "StatusText" => "500",
            "Type" => "Auto-checker",
            "Date" => "$ApiDate",
            );
            die();

    }
    


}else{


    //ERROR HAS OCCURED IN PROCCESSING REQUEST//

    $API_response = array(
        "Status" => "200",
        "Message" => "Not completed",
        "Response" => "",
        "StatusText" => "506",
        "Type" => "Auto-checker",
        "Date" => "$ApiDate",
        );
        die();
}
    die();
}


}