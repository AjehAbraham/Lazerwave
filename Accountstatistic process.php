

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){


    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);


    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $message_status = "Invalid mail address";
    
      
        include __DIR__ .("/Failed.php");

        die();
    


    }else{
        htmlspecialchars($email);


  /*      
$ip_add = $_SERVER["REMOTE_ADDR"];

$remark = "- Pending";

$send_account_no = $user["Account_no"];

$re_account_no = "Lazerwave";
*/

//check transaction pin
$pin = (int) filter_var($_POST["transaction-pin"],FILTER_SANITIZE_NUMBER_INT);

htmlspecialchars($pin);


//search dtatabse table

$tran_pin = "SELECT * FROM User_pin WHERE User_id = '$user[id]'";

$result_pin = $conn -> query($tran_pin);

if ($result_pin -> num_rows > 0){


  while($pin_result = $result_pin -> fetch_assoc()){

//echo "pin found";

//now check if pin is correct


if (password_verify($pin,$pin_result["Pin"]) =="password_hash"){

//echo "pin is valid";


}else{

        $message_status = "invalid pin";
    
      
        include __DIR__ .("/Failed.php");

        die();
    





}



  }


}else{

    
    $message_status = "Please create a transaction pin";
    
      
    include __DIR__ .("/Failed.php");

    die();

}











$amount = 10;

        if ($amount > $user["Account_balance"]){



        $send_account_no = $user["Account_no"];
        $receiver_account_no = "Lazerwave";
        $ip_addr = $_SERVER["REMOTE_ADDR"];
        $remark = "Pending";

        $transaction_id = "AJYQR" . rand(999,9999);

        $type = "ACCOUNT STATEMENT";
        
        
        $date = date("Y/m/d h:i:sa");
        
        $time = date("h:i:sa");
        
        $amount = 10;

            
            $status = "Failed";
    
            $failed_transaction = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name,Remark

            ,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr
            
            )
            VALUES('$_SESSION[New_user]','$transaction_id','$amount','$type','$remark','$status','$send_account_no','$receiver_account_no','$date','$time','$ip_addr')
            ";
            
            if ($conn -> query($failed_transaction) == TRUE){

                   
      $message_status = "Insuffient balance";
    
          include __DIR__ .("/Failed.php");
      
            
            }

            
            $message_status = "Insufficient balance";
    
            include __DIR__ .("/Failed.php");

         
      



        }




if ($amount <= $user["Account_balance"]){

        $status = "Successful";
        

        $send_account_no = $user["Account_no"];
        $receiver_account_no = "Lazerwave";
        $ip_addr = $_SERVER["REMOTE_ADDR"];
        $remark = "- Debit";


        $transaction_id = "AJYQR" . rand(999,9999);

        $type = "ACCOUNT STATEMENT";
        
        
        $date = date("Y/m/d h:i:sa");
        
        $time = date("h:i:sa");
        
        $amount = 10;
    
        $failed_transaction = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name,Remark


        ,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr
        
        )
        VALUES('$_SESSION[New_user]','$transaction_id', '$amount','$type','$remark','$status','$send_account_no','$receiver_account_no','$date','$time','$ip_addr')
        ";
        
        if ($conn -> query($failed_transaction) == TRUE){


            $new_balance = $user["Account_balance"] - $amount;

            $update_balance = "UPDATE Register_db SET Account_balance ='$new_balance' WHERE id = '$_SESSION[New_user]' ";

            if ($conn -> query($update_balance) == TRUE){

                   
      $message_status = "Transaction Successful";
   
      
          include __DIR__ .("/success.php");
      
                
            }



        
        }



        include __DIR__.("/db_connection.php");

        $check = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]'";

        $result = $conn -> query($check);

        if ($result -> num_rows > 0){

          $user['Account_balance'] =  number_format($user["Account_balance"]);
            echo "
            <table>
                <tr>
                    <th>Account name:</th>
                    <th>Account number</th>
                    <th>Account balance</th>
                </tr>
           
           
    <tr>
    <td>$user[Surname]  $user[First_name]  $user[Last_name]  </td>

    <td>$user[Account_no]</td>
<td>₦  $user[Account_balance]</td>
</tr>

<tr>
    
</table> " ;
            while ($trans_result = $result -> fetch_assoc()){

echo  "

";

            }
        }

    }else{
           
      $message_status = "An unknown error has occur";
    
      
          include __DIR__ .("/Failed.php");

          die();
      
    }


}



}

?>



