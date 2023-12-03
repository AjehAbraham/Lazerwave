<?php
require_once __DIR__.("/sessionPage.php");

?>




<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/ViewVirtualcard.css">
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
<title>virtual card</title>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">
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


</script>

      <div class="virtail-card-container">
      <span class="material-symbols-outlined" onclick="window.history.back()" 
      >arrow_back</span>
      <a href="dashboard-home"><i class="fa fa-home" 
      style=""></i></a>

<p>View Card Details</p>
    </div>






    <?php



    if ($_SERVER["REQUEST_METHOD"] == "GET"){


if(!isset($_GET["Ray_id"])){

header("Location: dashboard-home");
exit;
  
    die();


}

       // echo $_GET["card_no"];

if ($_GET["Ray_id"] == Null){
//THRWO ERROR BECAUSE IT AN INVALID LINK//

header("Location: dashboard-home");
exit;
die();

}else{

//LINK IS VALID//
$card_no = $_GET["Ray_id"];

$card_no = htmlspecialchars($card_no);


//STILL CHECK AGAIN TO AVOID ERROR

if (empty($card_no)){

    die();


}
//NOW SEARCH FOR CARD NO AND FETCH RESULT//

$card = "SELECT * FROM User_card WHERE User_id ='$_SESSION[New_user]' AND Hash_key='$card_no'";

//$card_result = $conn -> query($card);
$card_result = mysqli_query($conn,$card);

if (mysqli_num_rows($card_result) > 0){

//NOW RESULT WAS FOUND//

$card_details = mysqli_fetch_assoc($card_result);




$_SESSION["Card_hash_key"] = $card_details["Hash_key"];

}else{



 
    die();





}





}



    }

    ?>

<br>

<div class="front-debit-card-fliud">

<?php //require_once __DIR__.("/logo.php"); ?>

<p><i class="fa fa-flash" style="color: white;
font-size: 13px" style="float: right"></i><i class="fa fa-flash" 
style="color: red;float: right;font-size: 15px"></i></p>

<p class="card-no"> <?php echo 
$card_details["Card_no"]; ?></p>
<p class="name"><?php echo $card_details["Full_name"] ;?></p>
<p class="exp">Exp <?php echo $card_details["Exp_date"];?></p>
<i class="fa fa-barcode" style="color: gold;margin-left: 19px;font-size: 30px"></i>


<?php

if($card_details["Status_r"] == "UnBlock"){
    
echo '
<b style="float: right">Active <i class="fa fa-circle" style="color:mediumseagreen"></i></b>
';
}else{
    
    echo '
    <b style="float: right">InActive <i class="fa fa-circle" style="color:red;"></i></b>
    ';
    
    
}
?>


<p><i class="fa fa-flash"style="font-size: 18px;color: white;float: right"></i><i class="fa fa-flash" style="color: red;font-size: 18px" style="float: right"></i></p>
</div>


<div class="back-card-container">
    <p><i class="fa fa-flash" style="color: red;font-size: 13px" ></i><i class="fa fa-flash"
     style="color: white;float: right;font-size: 15px"></i></p>
    
<div class="black-spot"><?php echo $card_details["Ccv"];?></div>



<p style="font-size: 9px;">Please do not share your card details with anyone,always ensure to keep it safe.Report any suspicious activity</p>

<i class="fa fa-qrcode" style="margin-left: 19px;font-size: 30px"></i>

<!--p>please report any suspicous or unauthorise use of your card</p>
<p>ajehabraham51@gmail.com</p>
<p>call: 09074220984</p-->
<p><i class="fa fa-flash" style="color: white;font-size: 18px" style="float: right"></i><i class="fa fa-flash" style="color: red;float: right;font-size: 18px"></i></p>




</div>

<div class="Block-card-container">
    <form  id="formId">
       
    <?php   
    
       if($card_details["Status_r"] == "UnBlock"){
       
    echo "
        
        
        <p><b>Block card</b><br>Why do you want to Block this card?<br>
        <select name='reason'>
            
            <option></option>
            <option>Lost</option>
            <option>Stolen</option>
            <!--option>Disabled</option-->
        </select></p>
    
    <p class='submitForm' onclick='Open_pin_box()'>De-Activate card</p>

    <input type='hidden' value='$card_details[id]' name='card_no'>
    ";
        
     require_once "Transaction-pin-box.php";
    
       }else{
        echo " <input type='hidden' value='stolen' name='reason'>
            
    <input type='hidden' value='$card_details[id]' name='card_no'>

<lable><b>Transaction pin</b></lable>

<br><input type='number' inputmode='numeric' name='Transaction-pin' style='-webkit-text-security:disc;'>
           
        <p class='submitForm' onclick='submit_form(event)'>Activate Card</p></form>";  
           
           
           
       }
       ?>
       
       </div>
       <br>
       <br>
    
    <b class="error_message" style='color: red;'></b>
    <br>
    <br>
    
</div>
<?php require_once "Loader.php";

 include __DIR__.("/Non-script.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>

<script src="Src/Js/viewvirtualcard.js"></script>
</body>
</html>