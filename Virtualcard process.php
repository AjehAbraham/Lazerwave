<?php
require_once __DIR__.("/sessionPage.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

 $pin = (int) filter_var($_POST["pin"],FILTER_SANITIZE_NUMBER_INT);


//check transaction pin
$pin_tr = (int) filter_var($_POST["transaction-pin"],FILTER_SANITIZE_NUMBER_INT);

htmlspecialchars($pin_tr);


//search dtatabse table

$tran_pin = "SELECT * FROM User_pin WHERE User_id = '$user[id]'";

$result_pin = $conn -> query($tran_pin);

if ($result_pin -> num_rows > 0){


  while($pin_result = $result_pin -> fetch_assoc()){

//echo "pin found";

//now check if pin is correct


if (password_verify($pin_tr,$pin_result["Pin"]) =="password_hash"){

//echo "pin is valid";



}else{

$message_status = "invalid pin";

require_once __DIR__.("/Failed.php");
}



  }


}else{


    $message_status = "Please create a transaction pin";

    require_once __DIR__.("/Failed.php");

}


 

$check_ = 1000;

if ($user["Account_balance"] < $check_){


      
      $remark = "Pending";
      $send_account_number = $user["Account_no"];
      $re_account_no = "Lazerwave";
      $ip_addr = $_SERVER["REMOTE_ADDR"];

      
$date = date("Y-m-d");

$time = date("h:i:s");

$transaction_id = "TRDQ" . rand(999,9999);

$amount = 1000;

$type = "Virtual card";

$status = "Failed";
  


      $failed_amount = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name
      ,Remark,Status_remark,Sender_account_no,Reciever_account_no,Date_id,Time_id,Ip_addr
      
      )
      VALUES('$_SESSION[New_user]','$transaction_id', '$check','$type','$remark','$status','$send_account_number','$re_account_no','$date','$time','$ip_addr')
      ";


if ($conn -> query($failed_amount) == TRUE){


  
    $message_status = "Insufficient balance";

    require_once __DIR__.("/Failed.php");




}


  
$message_status = "Insufficient balance";

require_once __DIR__.("/Failed.php");



}
 if (is_numeric($pin)){

      $str = 4;

if (strlen($pin) == $str){



      //if ($amount <= $user["Account_balance"])
     
      $pin = password_hash($pin,PASSWORD_DEFAULT);

      htmlspecialchars($pin);

$credit_no = 57890 . rand(9999,99999) . rand(9999,99999);



$ccv = rand(99,999);

//$ccv = password_hash($ccv,PASSWORD_DEFAULT);


$full_name = $user["Surname"]. " " . $user["Last_name"] . " ". $user["First_name"];

$status_card = "UnBlock";


$date = date("Y-m-d");

$time = date("h:i:s");

$transaction_id = "TRDQ" . rand(999,9999);

$amount = 1000;

$type = "Virtual card";

$status = "Successful";

$expire = "2027 01";

require_once __DIR__.("/db_connection.php");


$stmt  = $conn -> prepare( "INSERT INTO Credit_card(
      
      User_id,Credit_card_no,Full_name,Ccv,Pin,Exp_date,Status_r,Date_created,Time_id
      
      )
      
      VALUES(?,?,?,?,?,?,?,?,?)
      
      ");

      $stmt -> bind_param("iisssisss",$_SESSION["New_user"],$credit_no,$full_name,$ccv,$pin,$expire,$status_card,$date,$time);

$stmt -> execute();


$stmt -> close();


 if ($stmt == TRUE){



    $message_status = "Card created successully";

    require_once __DIR__.("/success.php");

        $remark = "- Debit";
        $send_account_number = $user["Account_no"];
        $re_account_no = "Lazerwave";
        $ip_addr = $_SERVER["REMOTE_ADDR"];
    


    $update_amount = "INSERT INTO Transaction_history(User_id,Transaction_id,Amount,Type_name
    ,Remark,Status_remark,Sender_account_no,Receiver_account_no,Date_id,Time_id,Ip_addr
    
    )
    VALUES('$_SESSION[New_user]','$transaction_id', '$amount','$type','$remark','$status','$send_account_number','$re_account_no','$date','$time','$ip_addr')
    ";


if ($conn -> query ($update_amount) == TRUE){

      $new_balance = $user["Account_balance"] - $amount;

      $update_ccount_balance = "UPDATE Register_db SET Account_balance ='$new_balance' WHERE id = '$_SESSION[New_user]' ";


      if ($conn -> query ($update_ccount_balance) == TRUE){

      }
}


$conn -> close();

//require_once __DIR__.("/erro.php");

 }else{






      include __DIR__.("/Loader.php");
      die("<p>Fail</p>");
 }




}else if (strlen($pin) > $str){



    $message_status = "Pin to long";

    require_once __DIR__.("/Failed.php");


    }else{





    $message_status = "pin too short";

    require_once __DIR__.("/Failed.php");


    }

    
 }else{

  
    $message_status = " invalid pin format";

    require_once __DIR__.("/Failed.php");

    
 


    }

}

?>