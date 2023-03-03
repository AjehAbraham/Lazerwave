
<?php require_once __DIR__.("/sessionPage.php");



if (!isset($_SESSION["New_user"])){
  header("location:login.php");
  exit;
}


require_once __DIR__.("/Network.php");

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="ViewTransaction.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Transaction history</title>
      </head>
      <body>

        <div class="transaction-history-container">

            <a href="index.php"> <i class="fa fa-home" style="float: right;"></a></i>
            <span class="material-symbols-outlined" id="back" onclick="window.history.back()">arrow_back</span>
            <h1><i class="fa fa-book"></i> View Transaction History  </h1>
        </div>

       
     <?php

     if ($_SERVER["REQUEST_METHOD"] == "POST"){
      die("<p style=color: red;text-align: center;'>This page does not support post request</p>");
     }else{

if ($_SERVER["REQUEST_METHOD"] == "GET"){

$transaction_id = htmlspecialchars($_GET["transaction"]);

if ($transaction_id == NULL){
  die("<p style='color: red;text-align: center;'>Your link appears to be invalid or broken </p>");
}else{

  require_once __DIR__.("/db_connection.php");


  htmlspecialchars($transaction_id);

  $fetch_record = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Transaction_id = '$transaction_id'";


  $result_fetch = $conn -> query($fetch_record);

  if ($result_fetch -> num_rows > 0){
    while($transaction_result = $result_fetch -> fetch_assoc()){


      $amount = number_format($transaction_result['Amount']) . ".00";

// show color for trasaction remark

if ($transaction_result['Remark'] ==  "+ Credit"){

  $remark_color = "color: mediumseagreen";
}else if ($transaction_result['Remark'] == "- Debit"){
  $remark_color = "color: red";
}else{
  $remark_color = "color: yellow";
}

//show text color for status message;

if ($transaction_result['Status_remark'] == "Successful"){

  $status_color ="color: mediumseagreen";
}else{
  $status_color = "color: red";

}

//NOW CHECK FROM AND TO ACCOUNT NAME TO DISPLAUY NAME INSTEAD OF ACCOUNT NO


$from_record = "SELECT * FROM Register_db WHERE Account_no ='$transaction_result[Sender_account_no]'";

$sender_name = $conn -> query($from_record) -> fetch_assoc();

if($sender_name == NULL){
  $sender_name = $transaction_result['Sender_account_no'];
}else{
 $sender_name = $sender_name['Surname']. " ". $sender_name['Last_name'] 
 ." " .$sender_name['First_name'];
}


// select receiver name

$to_name = "SELECT * FROM Register_db WHERE Account_no = '$transaction_result[Receiver_account_no]'";


$to_name_result = $conn -> query ($to_name) -> fetch_assoc();


if ($to_name_result == NULL){

  $to_name_result = $transaction_result['Receiver_account_no'];
}else{
  $to_name_result =  $to_name_result['Surname'] ." ". $to_name_result['Last_name'] 
 ." ". $to_name_result['First_name'];
}

$date = date('F d Y',strtotime($transaction_result['Date_id']));


      echo "
      <div class='Reciept-container'>

      <p>Transaction Details</p>

      <p>$date</p>

      <p style=' $remark_color'>$transaction_result[Remark]</p>

      <p>Amount <b>₦ $amount</b> </p>

      <p>From <b>$sender_name </b></p>

      <p>To  <b> $to_name_result
      </b></p>

      <p>Status <b style='$status_color'>$transaction_result[Status_remark]</b></p>
      <p>Transaction_id <b>$transaction_result[Transaction_id]</b></p>

      <p>Message <b>$transaction_result[Type_name]</b></p>


      <p class='open-share-receipt-container'>Share Reciept</p>
      </div>
    
      ";
    }
  }else{
    echo "<p style='color: red;text-align: center;'>Invalid link or link appear to have been broken</p>";
  }


}

}


     }
     ?>
     </div>
    

<div class="share-receipt-container">
          
          <div class="share-box">
         <p class="close-share-container-btn"> <i class="fa fa-close"></i></p>
  
              <p>Share Receipt as:</p>
              <p><i class="fa fa-image" style="margin-right: 10px;"></i> Image</p>
              <p><i class=" fa fa-folder"style="margin-right: 10px;"></i> PDF</p>
  </div>
  </div>
  <script>
      
      document.querySelector(".open-share-receipt-container").addEventListener("click",openReceipt);
  
      function openReceipt(){
  
          document.querySelector(".share-receipt-container").style.width = "100%";
          document.querySelector(".share-box").style.width = "100%";
      }
  
  
      document.querySelector(".close-share-container-btn").addEventListener("click",closeReceipt);
  
  function closeReceipt(){
  
      document.querySelector(".share-receipt-container").style.width = "0%";
          document.querySelector(".share-box").style.width = "0%";
  
  }
  
      </script>

</body>
</html>
  



