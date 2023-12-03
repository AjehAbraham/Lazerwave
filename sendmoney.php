<?php require_once __DIR__.("/sessionPage.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["dataDog"]) && !empty($_POST["dataDog"])){

$dog = (int) filter_var($_POST["dataDog"],FILTER_SANITIZE_NUMBER_INT);

$dog = mysqli_real_escape_string($conn,$dog);
$dog = stripslashes($dog);
$dog = trim($dog);

$check = "SELECT * FROM Register_db WHERE Account_no='$dog'";

$Results = mysqli_query($conn,$check);

if(mysqli_num_rows($Results) > 0){


  //USER EXITS//

  $beneficary = $dog;


}else{

  //USER DOES NOT EXIST //


  $beneficary = "";
}


}else{


  //DO NOTHING AS FORM IS EMPTY//
  $beneficary = "";
}

}else{

  $beneficary = "";
}


?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/sendmoney.css">
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
<title>Transfer</title>
      </head>
      <body>

       
      <div class="Top-nav-bar">
        <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
         
        <a href="dashboard-home"><i class="fa fa-home"></i>
         </a> 
  </div>
   

         <div class="sendmoney-container">
     
<h1>Transfer Money(To Lazewave only)</h1>


<form  id="form-data">
<label><b>Username/Account Number:</b></label>
<br>
<input type="text" value="<?php echo $beneficary ?>"
 name="Acct_no" placeholder="Enter Username or Account number..." inputmode=""
  oninput="check_acct_no(event)" onchange='check_acct_no(event)'>

<p class="acct_error_message" style="color: red;"></p>



</div>
     </div>
     
     
<p class="error_message" style='color: red;text-align: ;'></p>


     
<?php require_once "Loader.php"; 

 require_once "Loader-refresh.php";
 

 require_once "Transaction-pin-box.php";

 
 echo "</form>";
  ?>
        
        
      
        <?php //include __DIR__.("/logo.php"); 
        
require_once __DIR__.("/Network.php");

require_once "Non-script.php";

        ?>

        <script src="Src/Js/sendmoney.js"></script>

      </body>
      </html>