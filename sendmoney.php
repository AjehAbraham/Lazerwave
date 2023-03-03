

<?php require_once __DIR__.("/sessionPage.php");


if (!isset($_SESSION["New_user"])){
  header("location:login.php");
  exit;
}
?>






<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="sendmoney.css">
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
<title>sendmoney</title>
      </head>
      <body>

  
      <script>
     
     if(window.history.replaceState){
     
     window.history.replaceState(null,null,window.location.href);
     
     }
         </script>



        <?php
        
require_once __DIR__.("/Network.php");
?>
      
        <span class="material-symbols-outlined"style="color: white;" onclick="window.history.back()">arrow_back</span>
         
        <a href="index.php"><i class="fa fa-home"style="float:right;font-size:25px;margin-top:1px;color: white;"></i>
         </a> 

         
<?php require_once __DIR__.("/logo.php");
?>


         <div class="sendmoney-container">
     
<h1>Send Money</h1>

<p>To Lazerwave only</p>


<?php
//AUTO FILL ACCOUNT NO WITH AUTO BENEFICAIRY//


if ($_SERVER["REQUEST_METHOD"] == "POST"){


$save_beneficiary = "";

if (isset($_POST["saved_beneficiary"])){

$save_beneficiary = (int) filter_var($_POST["saved_beneficiary"],FILTER_VALIDATE_INT);

htmlspecialchars($save_beneficiary);

}else{


$save_beneficiary = "";


}


}


?>


<form method="post" action="confirm.php" onsubmit="openConfirm(event)">
<label for="Account-number"><b>Account number:</b></label>
<br>
<input type="number" value="<?php echo isset($_POST['saved_beneficiary']) ? $_POST['saved_beneficiary'] : '' ?>" name="account-number" placeholder="Account no...">
<br>


<label for="number"><b>Amount:</b></label>
<br>

<input type="number" name="amount" placeholder="Enter amount...">
<br>

<label for="remark"><b>Remark optional:</b></label>
<br>

<input type="text" name="remark" placeholder="Remark...">
<br>
<input type="submit" value="Validate" >

</div>
</form>


         </div>

        
      

      </body>
      </html>