<?php require_once __DIR__.("/sessionPage.php");

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/ViewTransaction.css">
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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
      </head>
      <body>

       
     <?php
    // require_once "logo.php";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
if(isset($_GET["transaction"])){
$transaction_id = htmlspecialchars($_GET["transaction"]);

}else{

  header("Location: Transaction-history");
  exit;
}

if ($transaction_id == NULL){
  

  header("Location: Transaction-history");
  exit;

  //die("<p style='color: red;text-align: center;'>
  //Your link appears to be invalid or broken </p>");

}else{

  require_once __DIR__.("/db_connection.php");


  htmlspecialchars($transaction_id);

  $fetch_record = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Transaction_id = '$transaction_id'";


  //$result_fetch = $conn -> query($fetch_record);

  $result_fetch = mysqli_query($conn,$fetch_record);

  if (mysqli_num_rows($result_fetch) > 0){
    $transaction_result = $result_fetch -> fetch_assoc();


      $amount = number_format($transaction_result['Amount']) . ".00";

// show color for trasaction remark

if ($transaction_result['Remark'] ==  "+ Credit"){

  $remark_color = "color: mediumseagreen";
}else if ($transaction_result['Remark'] == "- Debit"){
  $remark_color = "color: red";
}else{
  $remark_color = "color: orange";
}

//show text color for status message;

if ($transaction_result['Status_remark'] == "Successful"){

  $status_color ="color: mediumseagreen";
}else{
  $status_color = "color: red";

}

//NOW CHECK FROM AND TO ACCOUNT NAME TO DISPLAUY NAME INSTEAD OF ACCOUNT NO


$from_record = "SELECT * FROM Register_db WHERE Account_no ='$transaction_result[Sender_account_no]'";

$se_name = mysqli_query($conn,$from_record) ;

$sender_name = mysqli_fetch_assoc($se_name);

if($sender_name == NULL){
  $sender_name = $transaction_result['Sender_account_no'];
}else{
 $sender_name = $sender_name['Surname']. " ". $sender_name['Last_name'] 
 ." " .$sender_name['First_name'];
}


// select receiver name

$to_name = "SELECT * FROM Register_db WHERE Account_no = '$transaction_result[Receiver_account_no]'";

$t_name = mysqli_query($conn,$to_name);


$to_name_result = mysqli_fetch_assoc($t_name);

if ($to_name_result == NULL){

  $to_name_result = $transaction_result['Receiver_account_no'];
}else{
  $to_name_result =  $to_name_result['Surname'] ." ". $to_name_result['Last_name'] 
 ." ". $to_name_result['First_name'];
}

$date = date('D d F Y',strtotime($transaction_result['Date_id']));
$time = $transaction_result["Time_id"];


if($time >= 12){
    
    
    $time =$time."PM";
}else{
    
    
    $time =$time."AM";
}

$tel =(int) filter_var($transaction_result['Type_name']);

    
 $text ="<input type='text' value='$transaction_result[Transaction_id]' id='tran_id' style='display: none'>";

 echo $text;


//DISTINGUISH TRANSACTION TYPE//

if($transaction_result["Type"] == "Data purchase" or $transaction_result["Type"] == "Airtime purchase"){
    
    if($transaction_result["Sender_account_no"] == "MTN"){
        
        $network_image = "Images/Mtn-logo.png";
        
    }else if ($transaction_result["Sender_account_no"] == "AIRTEL"){
        
        $network_image = "Images/Airtel-logo.png";
    }else{
        if($transaction_result["Sender_account_no"] == "GLO"){
            
            $network_image ="Images/Glo-logo.jpg";
            
            
        }else if ($transaction_result["Sender_account_no"] == "9MOBILE"){
            $network_image ="Images/9Mobile-logo.png";
            
            
        }else{
            
            $network_image ="";
            
        }
        
        
        
        
    }
    
    if($transaction_result["Type"] == "Data purchase"){

      $plan = "<p>Data Plan <b style='float: right;'>" .$transaction_result["Type_name"]. "</b><p>";
    }else{


      $plan = "";
    }
    
    
    
echo "
    
    <div class='Reciept-container'>

      <p style='font-size: 13px;'>Transaction Details</p>
      
      
      <p style='font-size: 13px'>$date $time</p>
      
      <p style='$remark_color;'>$transaction_result[Remark]<br>₦$amount</p>
      
      
      <p style='text-align: center;'><img src='$network_image' width='90px'></p>

    <p> Provider <b style='float:right'>$transaction_result[Sender_account_no]</b></p>
    
    <p> Phone no <b style='float:right'>$transaction_result[Receiver_account_no]</b></p>
    
    <p>Status <b style='float:right; $status_color;'>$transaction_result[Status_remark]</b></p>
    
    <p>Type <b style='float: right;'>$transaction_result[Type]</b></p>
    
    <p>Transaction ID <b style='float:right'>$transaction_result[Transaction_id] <i class='fa fa-copy'  style='cursor: pointer' onclick='copy()'></i></b></p>
    $plan
    
    
          <!--p class='open-share-receipt-container'>Share Reciept</p>
    
    
    <p class='report'> <i class='fa fa-user-times'style='color: white' ></i> Report</p-->
    
    </div>
    
    
    ";
    
    
    
    
    
}else if($transaction_result["Type"] == "Referal Bonus" or $transaction_result["Type"] == "Bonus"){
    
    
    
 echo"      <div class='Reciept-container'>

      <p style='font-size: 13px;'>Transaction Details</p>
      
      
      <p style='font-size: 13px'>$date $time</p>
      
      <p style='$remark_color;'>$transaction_result[Remark]<br>₦$amount</p>
      
    
    
    <p>Type <b>$transaction_result[Type]</b></p>
    
    
    <p> Remark <b style='color: #e6e600'> Cupon Bonus  <i class='fa fa-trophy'></i></b></p>
    
     <p>Status <b style='float:right; $status_color;'>$transaction_result[Status_remark]</b></p>
    
    
    <p>Transaction ID <b>$transaction_result[Transaction_id] <i class='fa fa-copy' style='cursor: pointer' onclick='copy()'></i></b></p>
    
    
                <!--p class='open-share-receipt-container'>Share Reciept</p>
    
    
    <p class='report'> <i class='fa fa-user-times' style='color: white'></i> Report</p-->
    
    </div>

    ";
    
    
    
}else{
    
    
    if($transaction_result["Type"] == "Account Statement"){
        
        
       echo " <div class='Reciept-container'>

      <p>Transaction Details</p>

      <p style='font-size: 13px'>$date   $time</p>

      <p style=' $remark_color'>$transaction_result[Remark]<br>₦$amount</p>
      
      
      <p>Type <b>$transaction_result[Type]
     </b></p>
     
     <p>Remark <b>$transaction_result[Type_name] <i class='fa fa-line-chart' style='cursor:pointer'></i></b></p>
     
     <p>Status <b style='
    $status_color' >$transaction_result[Status_remark]
     </b></p>
     
     <p>Transaction ID <b>$transaction_result[Transaction_id]   <i class='fa fa-copy' style='cursor: pointer' onclick='copy()'></i>
     </b></p>
     
     
            <!--p class='open-share-receipt-container'>Share Reciept</p>
      
      <p class='report'><i class='fa fa-user-times' style='color:white'></i> Report</p-->
      
      
      
      </div>
      
      
      ";

        
        
        
        
        
    }else{




      echo "
      <div class='Reciept-container'>

      <p>Transaction Details</p>

      <p style='font-size: 13px'>$date   $time</p>

      <p style=' $remark_color'>$transaction_result[Remark]<br>₦$amount</p>

    


      <p>Recipient Name<b> $to_name_result
      </b></p>
      
            <p>Account Number<b>|| $transaction_result[Receiver_account_no] ||</b></p>

      
            <p>Sender<b>$sender_name </b></p>

      <p>Account Number <b>|| $transaction_result[Sender_account_no] ||</b></p>

      <p>Transaction Status <b style='$status_color'>$transaction_result[Status_remark]</b></p>
      

      
      <p>Payment Type<b style='float:right'>Inter-Bank $transaction_result[Type]</b></p>
      
      <p>Recipient Bank <b style='float:right'>$transaction_result[Bank]</b></p>
      
      <p>Transaction ID<b style='font-size: 13px'>$transaction_result[Transaction_id] <i class='fa fa-copy' style='cursor: pointer' onclick='copy()'></i></b></p>
      

      <p>Remark <b style='font-size: 10px'>$transaction_result[Type_name]</b></p>
      
      


      <!--p class='open-share-receipt-container'>Share Reciept</p>
      
      <p class='report'><i class='fa fa-user-times' style='color:white'></i> Report</p-->
      
      </div>
    
      ";
    }
   
    }
    
    
  }else{

    header("Location: Transaction-history");
    exit;

    //echo "<p style='color: red;text-align: center;'>Invalid link or link appear to have been broken</p>";
  }


}

}
echo "<br><br><br>";

mysqli_close($conn);


     
     ?>
     </div>
    

  <script>
        
  function Checkmode(){

var current_mode = localStorage.getItem("Theme");

if(current_mode == "Dark-mode"){


var dark = document.body;

dark.classList.add("Dark-mode");




}else{

var dark = document.body;

dark.classList.add("Light-mode");




}


}

var mode = Checkmode();

  function copy(){
      
      var tran_id=
document.querySelector("#tran_id");
tran_id.select();
tran_id.setSelectionRange(0,99999);
navigator.clipboard.writeText(
tran_id.value);
alert("Transaction ID  copied to clipboard");

}
      
      document.querySelector(".report").addEventListener("click",alert_f);
      
      function alert_f(){
          
          alert("unavaliable,please report manually");
          
          
      }
  
      </script>
      
      <?php //include __DIR__.("/logo.php"); 
        require_once __DIR__.("/Non-script.php"); 
        require_once __DIR__.("/Network.php");
        
                ?>
</body>
</html>
  



