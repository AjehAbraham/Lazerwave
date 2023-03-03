<?php 

require_once __DIR__.("/sessionPage.php");

if (!isset($_SESSION["New_user"])){
    header("location:login.php");
    exit;
}

include __DIR__.("/db_connection.php");

$select_dp = "SELECT * FROM Profile_picture WHERE User_id ='$_SESSION[New_user]' ";

$result = $conn -> query($select_dp);

if($result -> num_rows > 0){
    while($profile_picture = $result -> fetch_assoc()){

        $image = $profile_picture["Image_path"];
   
        $_SESSION["Profile_picture"] = "Uploads/".$image;

   
    }
}else{

    $_SESSION["Profile_picture"] = "Uploads" ."\\" ."null-profile.jpeg";
    
}



//require_once __DIR__.("/Network.php");

?>




<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet"href="dashboard.css" >
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

<!--js  PDF LIBRARY -->
<script src="https://js/jsPDF/dist/jspdf.umd.js"></script>
<title>Dashboard</title>
      </head>
      <body>



        <div class="dashboard-container">

<span class="material-symbols-outlined"onclick="window.history.back()">arrow_back</span>
<!--i class="fa fa-moon-o"></i-->


<?php 
//show greeting

$date = date("H");

if ($date < 12){
  $greet = "Good Morning";

}else if ($date > 12){
$greet = "Good Afternoon";

if ($date > 15){
  $greet = "Good Evening";
}


}


?>

<i class="fa fa-bell" onclick="alert('No notification')"></i>
<img src="<?php echo  $_SESSION['Profile_picture']?>"width="120px">
<p>Hi <?php echo $user["Surname"] . ",".  $greet; ?> .</p>

        </div>
        <!--i class="fa fa-eye-slash" id="hide-balance"></i-->

    



        <div class="dashboard-menu-container">

            <p>Total balance 
            <i class="fa fa-eye" onclick="showBalance()" ></i></p>
            
<div class="account-balance">
<p style="font-size:25px;"class="Account-balance" >
<?php 
 echo '₦' .number_format ($user["Account_balance"]). ".00" ?>

<p class="replace-balance">
<?php   $user["Account_balance"] ;?></p>

<h5 class="hide-account-balance">
<i class="fa fa-asterisk">  </i>
                <i class="fa fa-asterisk"></i>
                <i class="fa fa-asterisk"></i>
</h5>

                

<p style="margin:0;float:right"><a href="transaction history.php">Transaction history</a></p>

</div>

</div>



<!--script>

  window.jsPDF = window.jspdf.jsPDF;

  var doc = new jsPDF();

  var elementHTML = document.querySelector(".dashboard-menu-container");

  doc.html(elementHTML,{
    callback: function(doc){
      doc.save("Transaction recipt.pdf");
    },
    x: 15,
    y: 15,
    width: 170,
    windowWidth: 650
  });

  </script-->


<div class="flex-box">

<div class="send-money-container">
    <a href="saved beneficiary.php">
  
    <i class="fa fa-send"></i> Send money</a>
  </div>

  
    <div class="Add-money-container">
      <a href="TopUp.php">
    <i class="fa fa-plus"></i> Add money </a></div>
    

</div>



        <p style="margin-left: 10px;color:rgb(0,0,180);font-size:30px;">Quick actions</p>

<div class="flex">
   
<div class="quick-actions-container">
<a href="Airtime.php"><p>Airtime</p>
<i class="fa fa-phone-square"></i></a>
</div>
<div class="quick-actions-container">
  <a href="Data.php">
<p>Data</p>
<i class="fa fa-rss"></i></a>

</div>
<div class="quick-actions-container">
        <p>Electricity</p>
<i class="fa fa-flash"></i>
</div>
<div class="quick-actions-container">
<p>Tv</p>
<i class="fa fa-television"></i>
</div>


</div>


<div class="flex">
        <div class="quick-actions-container">
        <p>Internet</p>
        <i class="fa fa-wifi"></i>
        </div>
        <div class="quick-actions-container">
        <p>Shop</p>
        <i class="fa  fa-cart-plus"></i>
        </div>
        <div class="quick-actions-container">
        <p>Betting</p>
        <i class="fa fa-soccer-ball-o"></i>
        </div>
        <div class="quick-actions-container">
                <p>Fees</p>
                <i class="fa fa-university"></i>
        
        </div>
        
        </div>



<script src="dashboard.js"></script>

        </body>
        </html>