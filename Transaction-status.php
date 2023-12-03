<?php
session_start();

if(!isset($_SESSION["Receipt-box"])){

    header("Location: dashboard-home");

}
//require_once "sessionPage.php";


$amount = "₦" . number_format($_SESSION["Receipt-box"]["Amount"]). ".00";

$name = $_SESSION["Receipt-box"]["UserName"];
$transaction_id = $_SESSION["Receipt-box"]["TransactionID"];
$status = $_SESSION["Receipt-box"]["Status"];

if(isset($_SESSION["New_user"])){


if(isset($_SESSION["Transaction-type"]) && $_SESSION["Transaction-type"]["Type"] === "Transfer"){ 

$fullName = $_SESSION["Transaction-type"]["full_name"];

$acct = $_SESSION["Transaction-type"]["Acct_no"];


require_once "db_connection.php";


$fetch_data = "SELECT * FROM Beneficiary WHERE User_id='$_SESSION[New_user]' AND Acct_no='$acct'";

$Results = mysqli_query($conn,$fetch_data);

if(mysqli_num_rows($Results) > 0){

  //BENEFICIARY   EXIT//

}else{

//BENEFICIARY DOES NOT EXITS//
$dataDog = "

<form id='FormData'>
  <input type='hidden' value='$acct' name='data'>
</form>

 <div class='form-container-fluid'>
  <p>Do you want to save <b>$fullName</b> as a beneficiary?</p>

  <p class='data-btn' onclick='SubmitData()'>Yes,Save Details</p>
  <p class='CloseBtn'>No,Continue</p>
  <p class='error_message'></p>
 </div>

";

}

}else{

  $dataDog = "";
}
}else{

  $dataDog = "";
}
?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/transaction-status.css">
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
<title>successful</title>
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
 <div class='Reciept-container'>
  <p>Hi <?php echo $name; ?></p>
  <p>Transaction <?php echo $status; ?>!</p>

  <p></p>
  <p> <?php echo $amount; ?></p>
  <p class='complete'>Complete</p>
  <p><a href='ViewTransaction?transaction=<?php echo $transaction_id?>'>View Receipt</a></p>
 </div>

<?php echo $dataDog; 
       
 unset($_SESSION["Receipt-box"]); 

unset($_SESSION["Transaction-type"]);

require_once "Loader-refresh.php";

require_once "Non-script.php";

?>
        

<script src="Src/Js/transaction-status.js"></script>
</body>
</html>