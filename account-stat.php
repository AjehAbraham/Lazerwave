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


//CHECK TOTAL NUMBER OF CREDIT AND DEBIT FROM USER//

    $credit = "+ Credit";
    
   $credit = "SELECT * FROM Transaction_history WHERE User_id = '$_SESSION[New_user]' AND Remark = '$credit'";

//$credit_result = $conn -> query($credit_debit);
$creditResult = mysqli_query($conn,$credit);

   if (mysqli_num_rows($creditResult)> 0){

while($data = mysqli_fetch_assoc($creditResult)){

    $CreditData = mysqli_num_rows($creditResult);

    $credit_no =  mysqli_num_rows($creditResult);

    $credit_result_col = floor( $credit_no + 50) ;
    //var_dump($data);


    //$moneyIn = "₦" . number_format($moneyIn);
    

} 

   }else{
    
    $credit_no = "0";

    $credit_result_col = 0;

$moneyIn ="₦0.00"; 

   }



   $debit = "- Debit";

   $select = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]' AND Remark = '$debit'";



$debitResult = mysqli_query($conn,$select);

if (mysqli_num_rows($debitResult) > 0){

   while( $debitData = mysqli_fetch_assoc($debitResult)){

    $debit_total = mysqli_num_rows($debitResult);

    $debit_no = mysqli_num_rows($debitResult);

    $debit_total =floor( $debit_total + 50  )  ;

    
  /*  $moneyOut += $debitData["Amount"];

    $moneyOut = "₦" . number_format($moneyOut);*/

   }


}else{


    $debit_no = "0";
    $debit_total = "";

    $moneyOut ="₦0.00";
    
}
   


    $infos = "
     <h2>Total: $total <h2>
   
<div class='flex-box'>


<p>
$credit_no
<br>
Credit<br> %
</p>
<p>$debit_no <br>Debit<br> %<br> </p>
    ";
  
  

//CHECK TOTAL MONEY IN AND OUT FOR A MONTH//





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

<!-- end of ajax link -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>

      </head>
   
<div class="Top-nav-bar">
         
         <a href="dashboard-home">  <i class="fa fa-home" 
></i>
         </a> 
                   <span class="material-symbols-outlined" 
                   onclick="window.history.back()" >arrow_back</span>
        
</div>

               


         <div class="Account-statistic-container">

<h1>Account statistics <i class="fa fa-line-chart"></i></h1>

<?php
echo $infos;
?>

</h2>



<p> Generate Account Statement</p>



<p style="color:red">Note you will be charge a service fee of ₦10</p>

<form  id="FormData">

<label><b>Email:</b></label>
<br>

<input type="email" name="email" placeholder="enter email...">

<br>


  <p class="openBtn">Generate statment</p>
  
  

</div>

  
<?php require_once __DIR__.("/Network.php");

require_once "Loader.php";

require_once "Transaction-pin-box.php";
echo "</form>";

require_once "Non-script.php";
?>
  
  <script src="Src/Js/account-stat.js"></script>


      </body>
      </html>