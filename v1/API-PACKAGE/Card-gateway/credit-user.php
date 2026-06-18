<?php

$ApiownerBal = $amount + $keyOwner["Account_balance"];

$Updates = "UPDATE Register_db SET Account_balnce='$ApiownerBal' WHERE id='$keyOwner[id]'";

if(mysqli_query($conn,$Updates)){


   
    $type_name = "Interbank Transfer From ".$user["First_name"]. " ". $user["Last_name"]
    ." ".$user["First_name"]. "(".
    $user["Account_no"]. ")" ." ";
    
    //NOW INSERT RECORDS TO SENDER TRANSACTION HISTORY//
    
    $remark = "+ Credit";
    $status_remark = "Successful";
    
    $insert = "INSERT INTO Transaction_history(User_id,Transaction_id,
    Amount,Type_name
    ,Remark,Status_remark,
    Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent)
    
    VALUES('$keyOwner[id]','$transaction_id','$amount','$type_name','$remark',
    '$status_remark','$sender_acct','$receiver_acct','$date','$time','$ip_add','$type','$bank'
    ,'$user_agent'
    )
    "; 

    if(mysqli_query($conn,$insert)){



    }else{


        //FAIL TO COMPLETE TRANSACTION//
    }


    
    $API_response = array(
        "Status" => "200",
        "Message" => "success",
        "Response" => array(
            "transactionID" => "$transaction_id",
"Status" => "success",
"Type" => "Top up(card)",

        ),
        "StatusText" => "502",
        "Type" => "Auto-checker",
        "Date" => "$ApiDate",
        );
    //SEND USER A REPONSES//


}else{


//FAIL TO CREDIT API ONWER//


}