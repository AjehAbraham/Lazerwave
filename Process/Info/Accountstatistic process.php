<?php

require_once __DIR__.("/sessionPage.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["email"])){

    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);

if(empty($email)){
    
    die("Please enter your Emai");
    
}

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        die("Invalid mail address");
    


    }else{
        htmlspecialchars($email);



    }

}else{

    die("Please enter your email");

}

if(isset($_POST["Transaction-pin"])){


    $pin = (int) filter_var($_POST["Transaction-pin"],FILTER_SANITIZE_NUMBER_INT);


    if(empty($pin)){


        die("Please enter your Transaction pin");
    }else{


        $pin = htmlspecialchars($pin);
    }


}else{


    die("Please enter your Transaction Pin ");

}
//CHECK USER TRANSACTION PIN IF IT IS VALID//

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



$tran_pin = "SELECT * FROM User_pin WHERE User_id = '$_SESSION[New_user]'";

$result = mysqli_query($conn,$tran_pin);

if(mysqli_num_rows($result) > 0){

$results = mysqli_fetch_assoc($result);

//COMPARE PASSWORD//

if(password_verify($pin,$results["Pin"]) == "password_hash"){


    $bal = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

    $data = mysqli_query($conn,$bal);

    $user = mysqli_fetch_assoc($data);

//CHECK IF USER ACCOUNT BALANCE IS SUFFICIENT//




$amount = 10;

        if ($amount > $user["Account_balance"]){

        $send_account_no = $user["Account_no"];
        $receiver_account_no = "Lazerwave";

        $ip_addr = $_SERVER["REMOTE_ADDR"];

        $remark = "Failed";

        $transaction_id = uniqid(). rand(999,9999);

        $type = "ACCOUNT STATEMENT";
        
        
        $date = date("Y/m/d H:i:s");
        
        $time = date("H:i:s");
        
        $amount = 10;
        
        $typee ="Account Statement";
        
        $bank ="";

            
            $status = "Failed";
    
            $failed_transaction = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name,Remark

            ,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank,User_agent
            
            )
            VALUES('$_SESSION[New_user]','$transaction_id','$amount','$type','$remark',
            '$status','$send_account_no','$receiver_account_no','$date','$time','$ip_addr',
            '$typee','$bank',$user_agent')
            ";

            if(mysqli_query($conn,$failed_transaction)){

                die("Insufficient Funds");

            }else{


                die("Error occured");
            }
            
           
        }elseif ($amount <= $user["Account_balance"]){
    


    
    $amount =10;

//UPDATE USER ACCOUNT BALANCE//

$newBal = $user["Account_balance"] - $amount;


$update = "UPDATE Register_db SET Account_balance ='$newBal' WHERE id='$_SESSION[New_user]'";



if(mysqli_query($conn,$update)){




}else{


    die("Failed");

}
    
   // $status ="unseen";
    $Type = "ACOUNT STATEMENT";
    $message ="ACCOUNT STATEMENT";
    
    //require_once "Add notification.php";
    
    
   // require_once "Check block account.php";
    
   // require_once "Check daily limit.php";
    
    

        $status = "Successful";
        

        $send_account_no = $user["Account_no"];
        $receiver_account_no = "Lazerwave";
        $ip_addr = $_SERVER["REMOTE_ADDR"];
        $remark = "- Debit";


        $transaction_id =rand(999,9999) . uniqid();

        $type = "ACCOUNT STATEMENT";
        
        
        $date = date("Y-m-d H:i:s");
        
        $time = date("H:i:s");
        
        $amount = 10;
    
    $typee="Account Statement";
    
    $bank ="";
    
        $insert = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name,Remark


        ,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr,Type,Bank
        
        )
        VALUES('$_SESSION[New_user]','$transaction_id', '$amount','$type','$remark','$status','$send_account_no','$receiver_account_no','$date','$time','$ip_addr','$typee','$bank')
        ";
        
       


        if(mysqli_query($conn,$insert)){




            //FETCH USER TRANSACTION HISTORY AND SEND DATA TO EMAIL//





        }else{

            die("Failed");


        }

        
        }








}else{


    die("Incorrect Transaction pin ");
}


}else{


    die("Create your Transaction Pin to proceed");

}


        include __DIR__.("/db_connection.php");

        $check = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]'";

        //$result = $conn -> query($check);

        $Resuled = mysqli_query($conn,$check);

        if (mysqli_num_rows($Resuled) > 0){


$to = $_POST["email"];
$from = 'Lazerwave@gmail.com';
$fromName = 'Lazerwavesupport'; 

$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers .= 'Bcc: lazerwave@gmail.com' . "\r\n"; 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

$subject ="ACCOUNT STATEMENT";


$ammt = number_format($user["Account_balance"]);

        //  $user['Account_balance'] =  number_format($user["Account_balance"]);
        
        $message ="Hello ".$user['Surname'] .",";
        
        
        
        $message .="<p style='color: white;background-color: rgb(0,0,100); font-size: 18px;padding: 10px 10px;margin:auto;width: 65%; border-radius: 2rem; text-align: center;color: white;'>Lazerwave</p>"
    ;
            $message .="
            <table>
                <tr style='text-align: center'>
                    <th>Account name</th>
                    <th>Account number</th>
                    <th>Account balance</th>
                </tr>
           
           
    <tr>
    <td>$user[Surname]  $user[First_name]   $user[Last_name]  </td>

    <td>$user[Account_no]</td>
<td>₦$ammt</td>
</tr>

<tr>
    
</table> " ;


//SELECT TRANSACTION HISTORY AND SHOW ALL MESSAGE//

    
    $message .= "<table style='font-size: 12px;text-align: center'>
        
        <tr style='font-weight: bold; border: 2px solid rgb(0,0,100);text-align: center;'>
        <th>Account No </th>
        
        <th>Date</th>
        
        <th>Transaction ID</th>
        <th>Amount </th>
        <th>Type </th>
        <th>Remark</th>
        
        <th>Status</th>
        
        </tr>
        ";
    
        
        
        
      //  $total += "₦" . number_format( $hist_result["Amount"]). ".00";
        
    
        
       while($hist_result = mysqli_fetch_assoc($Resuled)){

        $amm ="₦".number_format( $hist_result["Amount"]);
        
        
    $message .= "
        
        <tr style='color: 2px solid rgba(255,0,0,0.4);font-size: 13px'>
        
        <td> $hist_result[Sender_account_no]</td>
        
        <td>$hist_result[Date_id]</td>
        
        
        <td>$hist_result[Transaction_id]</td> 
        
        <td>$amm</td>
        
        <td> $hist_result[Type]</td>
        <td>$hist_result[Type_name]
        </td>
        
        <td> $hist_result[Status_remark]</td>
        </tr>
        

        "
        ;
        
        
    
       }

       echo "</table>";

$message .="<p>Please ignore if you did not request for this message</p>";



$mail = mail($to,$subject,$message,$headers);


if($mail == TRUE){
    
  die("success");


}




        }else{


            die("No Transaction");
        }


        mysqli_close($conn);


}else{

    header("Location: Warning");
    exit;
}

?>



