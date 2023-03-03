


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="">
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
<title>Status</title>
      </head>
      <body>



        <div class="Reciept-container">
<p>lazerwave <i class="fa fa-fire"></i></p>


<p><i class="fa fa-check"></i></p>
<p>Transaction Successful</p>

<p>date <?php echo date("F d Y") ?></p>

<p></p>

<p>Amount<b>jgjgjg</b></p>

<p>From<b>kfkfkfkf</b></p>
<p>To<b>hju</b></p>
<p>Transaction_id<b>94kfkfk</b></p>

<p>Message<b>kfkfkkfkffk</b></p>
<p class="open-share-receipt-container">Share receipt</p>
<p><a href="index.php">Go to Dashboard</a></p>

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



<div class="Transaction-pin-container-overlay">

<div class="transaction-pin-container">
    <p class="close-transaction_pin"> <i class="fa fa-close"></i></p>

    <p>Enter your transaction pin</p>
<input type="number" name="transaction-pin" placeholder="Enter your transaction pin...">

<br>

<input type="submit" value="Pay">

</div>
</div>

<script>
    
    document.querySelector(".open-tarnsaction-btn").addEventListener("click",open_tran_pin);

    function open_tran_pin(){

        document.querySelector(".Transaction-pin-container-overlay").style.width = "100%";
        document.querySelector(".transaction-pin-container").style.width = "100%";
    }


    document.querySelector(".close-transaction_pin").addEventListener("click",close_tran_pin);

function close_tran_pin(){

    document.querySelector(".Transaction-pin-container-overlay").style.width = "0%";
        document.querySelector(".transaction-pin-container").style.width = "0%";

}

    </script>




<style>
    .Transaction-pin-container-overlay{

       /* width: 0%;*/
 /*   background-color: rgba(0,0,0,0.2);
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    text-align: center;
    transition: 0.5s
    }
    
    .transaction-pin-container i{
        color: rgb(0,0,180);
        font-size: 25px;
        cursor: pointer;
    }
    
    .transaction-pin-container{
        top: 50%;
        padding: 10px 10px;
        border-top: 2px solid rgb(0,0,180);
bottom: 0;
left: 0;
right: 0;
position: fixed;
        background-color: white;
        overflow-y: scroll;
        transition: 0.5s
    }
    
input[type =number]{
    margin-left: auto;
    margin-right: auto;
    width: 40%;
    font-size: 15px;
    padding: 10px 10px;
    border: 2px solid #ccc;
    display: block;
}

input[type=submit]{
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    font-size: 20px;
    padding: 10px 10px;
    border: 2px solid #ccc;
    color: white;
    background-color: rgb(0,0,180);
    border: none;
    display: block;
    margin-top: 10px;*/
}

.pin-warning-message-container{
    background-color: rgba(0,0,0,0.2);
    width: 100%;
    height: 100%;
    left:0;
    right: 0;
    top: 0;
    bottom: 0;
    position: fixed;
    z-index: 2;
}
.pin-warning-message-container p{
padding: 15px 15px;
width: 90%;
margin-left: auto;
margin-right: auto;
background-color: white;
top: 50%;
text-align: center;

}
    </style>


<div class='pin-warning-message-container'>

<p> ikdoidoido</p>

</div>




<style>
    body{
    

    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    
    font-weight: lighter;
        margin: 0;
        font-size: 18px;
        text-align: justify;
    } 
    

    .Reciept-container{
        width: 90%;
        margin-right: auto;
        margin-left: auto;
        display: block;
        color: grey;
       /* overflow-y: scroll;*/
      border: 3px solid grey;
       padding: 10px 10px;
       border-radius: 2rem;
    }
    .Reciept-container p:nth-child(2){
        text-align: center;
        font-size: 40px;
        background-color: rgb(0,0,56);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        color: white;
        margin-left: auto;
        margin-right: auto;
animation: loader-con 2s ease-out infinite;
    }

    @keyframes loader-con {
        100%{transform: scale(2); }
        
    }
    .Reciept-container p:nth-child(3){
        color: mediumseagreen;
        text-align: center;
        font-size: 30px;
    }
    .Reciept-container p:nth-child(1){
       /* text-align: center;
        border-bottom: 12px;
        width: 97%;*/
        border-radius: 2rem;
    background-color: yellow;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    text-align: center;
    top: 100px;
    padding: 10px 10px;
    color: rgb(0,0,180);
    margin-top: 30px;
    }
    .Reciept-container p:nth-child(4){
        margin-right: auto;
        margin-left: auto;
        display: block;
        text-align: center;
        border-radius: 2rem;
        padding: 10px 10px;
        width: 50%;
        border: 3px solid grey;
    }
    .Reciept-container p:nth-child(5){
        text-align: center;
        font-size: 24px;
    }
    .Reciept-container b{
        float: right;
    }
    .Reciept-container p:nth-child(11){
        background-color: mediumseagreen;
        width: 60%;
        margin-right: auto;
        margin-left: auto;
        display: block;
        text-align: center;
        padding: 10px 10px;
        color: white;
        margin-bottom: 20px;
        cursor: pointer;
    }
    .Reciept-container p:nth-child(12){
        background-color: tomato;
        width: 60%;
        margin-right: auto;
        margin-left: auto;
        display: block;
        text-align: center;
        padding: 10px 10px;
        color: white;
        margin-bottom: 20px;
        cursor: pointer;
    }
    
    .Reciept-container i{
    color: rgb(0,0,180);
    text-align: center;
   /* border-radius: 2rem;*/
    font-size: 36px;
}
.Reciept-container a:link{
    text-decoration: none;
    color: white;
}
.Reciept-container a:visited{
    color: white;
}
.share-receipt-container  {
    background-color: rgba(0,0,0,0.2);
    top: 0;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
  /*  overflow-y: scroll;*/
  width: 0%;
  transition: 0.5s;

}
.share-box{
    width: 0%;
    top: 50%;
    background-color: white;
    left: 0;
    right: 0;
    bottom: 0;
    position: fixed;
    text-align: center;
    padding: 10px 10px;
    overflow-y: scroll;
    border-top: 2px solid rgb(0,0,180);

    transition: 0.5s;
}
.share-box p:nth-child(3){
    text-align: center;
    padding: 18px 18px;
    color: rgb(0,52,102);
    box-shadow: 0px 16px 8px 0px rgba(0,0,0,0.2);
    border-top: 1px solid #ccc;
    margin-bottom: 12px;
    cursor: pointer;

}
.share-box p:nth-child(4){
    text-align: center;
    padding: 18px 18px;
    color: rgb(0,52,102);
    box-shadow: 0px 16px 8px 0px rgba(0,0,0,0.2);
    border-top: 1px solid #ccc;
    margin-bottom: 12px;
    cursor: pointer;

}
.share-box i{
    cursor: pointer;
    font-size: 25px;
    color: rgb(0,0,180);
}
</style>



<?php



/*
    
    $otp_error_message = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){


        $hidden = htmlspecialchars($_POST["otp"]);

        if (empty($hidden)){


            die($otp_error_message);

        }else{
            //CHECK IF YOU ACTUALL APPROVE THE USER TO CHECK THIS PAGE IN OTHER TO AVOID SPAM 

            if ($hidden == "otp"){
//CONFIRM///


require_once __DIR__.("/db_connection.php");

$otp = rand(9999,99999);


$date = date("Y/m/d H:i:sa");
$time = date("H:i:sa");


    $insert_otp = "INSERT INTO Change_password_otp(User_id,Otp,Time_id,Date_id)
    
    VALUES('$_SESSION[New_user]','$otp','$time','$date')
    
    ";

    if ($conn -> query($insert_otp) == TRUE){

//SEND OTP TO USER EMAIL //

$otp_error_message ="otp has been sent";



    }else{
//FAILED TO ISNERT OTP TO DATABASE//

        echo "An unknow error has occur";


    }





            }else{


//THE USER TRIED TO VIEW THIS PAGE UNAUTHORIED

$otp_error_message = "Fail to send otp";



            }

        }



    }else{

        //REDIRCET TO AVOID SPAM MESSAGE //

        header("Location: warning.php");
        exit;
    }





}
*/