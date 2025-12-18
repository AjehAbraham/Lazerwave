<?php 
require_once __DIR__.("/sessionPage.php");

// select total numbers of transaction 

$select_total = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'";

//$select_result = $conn -> query($select_total);

$results = mysqli_query($conn,$select_total);

if (mysqli_num_rows($results) > 0){

    $total = mysqli_num_rows($results);
    

    }else{

        //NO TRANSACTION HISTORY WAS FOUND FOR USER//

        $total = 0;
    }


//CHECK TOTAL NUMBER OF CREDIT FROM USER//

    $credit = "+ Credit";
    
   $credit = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Remark = '$credit'";

//$credit_result = $conn -> query($credit_debit);
$creditResult = mysqli_query($conn,$credit);

   if (mysqli_num_rows($creditResult)> 0){

while($data = mysqli_fetch_assoc($creditResult)){

    $creditStat = mysqli_num_rows($creditResult);

} 

   }else{
    
   $creditStat = "0";
   }


   
//CHECK TOTAL NUMBER OF DEBIT FROM USER//

$debit = "- Debit";
    
$debit_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Remark = '$debit'";

$debitResult = mysqli_query($conn,$debit_select);

if (mysqli_num_rows($debitResult)> 0){

while($data = mysqli_fetch_assoc($debitResult)){

 $debitStat = mysqli_num_rows($debitResult);

} 

}else{
 
$debitStat = "0";
}

  
//CHECK TOTAL NUMBER OF FAILED TRANSACTION FROM USER//

$Failed = "Failed";
    
$Failed_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Status_remark = '$Failed'";

$FailedResult = mysqli_query($conn,$Failed_select);

if (mysqli_num_rows($FailedResult)> 0){

while($data = mysqli_fetch_assoc($FailedResult)){

 $FailedStat = mysqli_num_rows($FailedResult);

} 

}else{
 
$FailedStat = "0";

}


//CHECK TOTAL NUMBER OF SUCCESSFUL TRANSACTION FROM USER//

$Success = "Successful";
    
$Success_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Status_remark = '$Success'";

$SuccessResult = mysqli_query($conn,$Success_select);

if (mysqli_num_rows($SuccessResult)> 0){

while($data = mysqli_fetch_assoc($SuccessResult)){

 $SuccessStat = mysqli_num_rows($SuccessResult);

} 

}else{
 
$SuccessStat = "0";
}

//CHECK TOTAL NUMBER OF SUCCESSFUL TRANSACTION FROM USER//

$Pending = "Pending";
    
$Pending_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Status_remark = '$Pending'";

$PendingResult = mysqli_query($conn,$Pending_select);

if (mysqli_num_rows($PendingResult)> 0){

while($data = mysqli_fetch_assoc($PendingResult)){

 $PendingStat = mysqli_num_rows($PendingResult);

} 

}else{
 
$PendingStat = "0";
}



//CHECK TOTAL NUMBER OF TRANSFER TRANSACTION FROM USER//

$Transfer = "Transfer";
    
$Transfer_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Transfer'";

$TransferResult = mysqli_query($conn,$Transfer_select);

if (mysqli_num_rows($TransferResult)> 0){

while($data = mysqli_fetch_assoc($TransferResult)){

 $TransferStat = mysqli_num_rows($TransferResult);

} 

}else{
 
$TransferStat = "0";
}



//CHECK TOTAL NUMBER OF AIRTIME PURCHASE TRANSACTION FROM USER//

$Airtime = "Airtime purchase";
    
$Airtime_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Airtime'";

$AirtimeResult = mysqli_query($conn,$Airtime_select);

if (mysqli_num_rows($AirtimeResult)> 0){

while($data = mysqli_fetch_assoc($AirtimeResult)){

 $AirtimeStat = mysqli_num_rows($AirtimeResult);

} 

}else{
 
$AirtimeStat = "0";
}


//CHECK TOTAL NUMBER OF DATA PURCHASE TRANSACTION FROM USER//

$Data_purchase = "Data purchase";
    
$Data_purchase_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Data_purchase'";

$Data_purchaseResult = mysqli_query($conn,$Data_purchase_select);

if (mysqli_num_rows($Data_purchaseResult)> 0){

while($data = mysqli_fetch_assoc($Data_purchaseResult)){

 $Data_purchaseStat = mysqli_num_rows($Data_purchaseResult);

} 

}else{
 
$Data_purchaseStat = "0";
}



//CHECK TOTAL NUMBER OF MONEY REQUEST TRANSACTION FROM USER//

$MoneyRequest = "Money Request";
    
$MoneyRequest_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$MoneyRequest'";

$MoneyRequestResult = mysqli_query($conn,$MoneyRequest_select);

if (mysqli_num_rows($MoneyRequestResult)> 0){

while($data = mysqli_fetch_assoc($MoneyRequestResult)){

 $MoneyRequestStat = mysqli_num_rows($MoneyRequestResult);

} 

}else{
 
$MoneyRequestStat = "0";
}


//CHECK TOTAL NUMBER OF Virtual Card TRANSACTION FROM USER//

$VirtualCard = "Virtual card";
    
$VirtualCard_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$VirtualCard'";

$VirtualCardResult = mysqli_query($conn,$VirtualCard_select);

if (mysqli_num_rows($VirtualCardResult)> 0){

while($data = mysqli_fetch_assoc($VirtualCardResult)){

 $VirtualCardStat = mysqli_num_rows($VirtualCardResult);

} 

}else{
 
$VirtualCardStat = "0";

}



//CHECK TOTAL NUMBER OF Account_Statement TRANSACTION FROM USER//

$Account_Statement = "Account Statement";
    
$Account_Statement_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Account_Statement'";

$Account_StatementResult = mysqli_query($conn,$Account_Statement_select);

if (mysqli_num_rows($Account_StatementResult)> 0){

while($data = mysqli_fetch_assoc($Account_StatementResult)){

 $Account_StatementStat = mysqli_num_rows($Account_StatementResult);

} 

}else{
 
$Account_StatementStat = "0";
}


//CHECK TOTAL NUMBER OF Bonus TRANSACTION FROM USER//

$Bonus = "Bonus";
    
$Bonus_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Bonus'";

$BonusResult = mysqli_query($conn,$Bonus_select);

if (mysqli_num_rows($BonusResult)> 0){

while($data = mysqli_fetch_assoc($BonusResult)){

 $BonusStat = mysqli_num_rows($BonusResult);

} 

}else{
 
$BonusStat = "0";
}


//CHECK TOTAL NUMBER OF Bonus TRANSACTION FROM USER//

$Top_up = "Top up";
    
$Top_up_select = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]'
 AND Type= '$Top_up'";

$Top_upResult = mysqli_query($conn,$Top_up_select);

if (mysqli_num_rows($Top_upResult)> 0){

while($data = mysqli_fetch_assoc($Top_upResult)){

 $Top_upStat = mysqli_num_rows($Top_upResult);

} 

}else{
 
$Top_upStat = "0";
}


//CHECK TOTAL MONEY IN AND OUT FOR A MONTH//
$moneyIn ="₦0.00"; 

$All_stat=
'
<script>
const xArray = ["Transfer", "Money Request","Airtime purchase","Data purchase"
  ,"Account Statement","Virtual card","Bonus","Top up"
];
const yArray = ['.$TransferStat.','.$MoneyRequestStat.','.$AirtimeStat.'
,'.$Data_purchaseStat.','.$Account_StatementStat.','.$VirtualCardStat.',
'.$BonusStat.','.$Top_upStat.'];

const layout = {title:""};

const data = [{labels:xArray, values:yArray, type:"pie"}];

Plotly.newPlot("myPlot", data, layout);


const xArray2 = ["Credit", "Debit"];
const yArray2 = ['.$creditStat.','.$debitStat.'];

const layout2 = {title:""};

const data2 = [{labels:xArray2, values:yArray2, type:"pie"}];

Plotly.newPlot("myPlot2", data2, layout2);


const xArray3 = ["Successful", "Failed","Pending"];
const yArray3 = ['.$SuccessStat.','.$FailedStat.','.$PendingStat.'];

const layout3 = {title:""};

const data3 = [{labels:xArray3, values:yArray3, type:"pie"}];

Plotly.newPlot("myPlot3", data3, layout3);
</script>
';

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/account-stat.css">
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
<title>Account statistics</title>

<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>


<!-- google stat-->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<!-- END-->
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
 

             <?php require_once "default_sidebar.php"; ?>  

             <div class="Account-statistic-container">

<h1>Account statistics <i class="fa fa-line-chart"></i></h1>

<p> Generate Account Statement</p>

<p style="color:red">Note you will be charge a service fee of ₦10</p>

<form  id="FormData">

<label><b>Email:</b></label>
<br>

<input type="email" name="email" placeholder="enter email...">

<br>
  <p class="openBtn">Generate statment</p>

</div>
<br><br>
             
<div id="myPlot" style="width:100%;max-width:700px"></div>

<div id="myPlot2" style="width:100%;max-width:700px"></div>

<div id="myPlot3" style="width:100%;max-width:700px"></div>

<?php echo $All_stat;

  ?>

  
<?php require_once __DIR__.("/Network.php");

require_once "Loader.php";

require_once "Transaction-pin-box.php";
echo "</form>";

require_once "Non-script.php";
?>
  
  <script src="Src/Js/account-stat.js"></script>


      </body>
      </html>