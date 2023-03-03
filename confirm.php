<?php require_once __DIR__.("/sessionPage.php");

if (!isset($_SESSION["New_user"])){
    header("location: Login.php");
    exit;
  }

//require_once __DIR__.("/Network.php");

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    header("location:sendmoney.php");
    exit;
}

?>



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
<title>Confirm payment</title>
      </head>
      <body>
        
<script>
     
     if(window.history.replaceState){
     
     window.history.replaceState(null,null,window.location.href);
     
     }
         </script>
   
        <span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
         
        <a href="index.php"><i class="fa fa-home"style="float:right;font-size:25px;margin-top:1px"></i>
         </a> 


         <?php 
         //require_once __DIR__.("/logo.php")
?>      

<?php 

//INCLUDE LOADER FOR 1S

require_once __DIR__.("/Loader.php");



if ($_SERVER["REQUEST_METHOD"] == "POST"){

   

$acccount_no = filter_var($_POST["account-number"],FILTER_VALIDATE_INT);

$amount = filter_var($_POST["amount"],FILTER_VALIDATE_INT);



if (empty($acccount_no)){

    $message_status = "Please enter account number";


    include __DIR__.("/Failed.php");


    die();
}

if (empty($amount)){

    $message_status = "Please enter amount";


    include __DIR__.("/Failed.php");


    die();



}else{
    
    require_once __DIR__.("/db_connection.php");

    $sql = "SELECT * FROM Register_db WHERE Account_no = '$acccount_no'";


    $result = $conn -> query($sql);

if ($result -> num_rows > 0){
    while ($result_acct = $result -> fetch_assoc()){

        if ($amount < 50){

            $message_status = "Amount cannot be less than ₦50 &#128532";


            include __DIR__.("/Failed.php");
        
        
            die();



        }

        //FIRST CHECK IF USER HAS UPDGRADED TO KYC 2//


       $select_kyc2 = "SELECT * FROM More_information WHERE User_id='$_SESSION[New_user]'";
       
       
       $kyc3_result = $conn -> query($select_kyc2);


       if ($kyc3_result -> num_rows > 0){


//MEANS THE USER HAS UPGRADED TO KYC2 SO THEY HAVE NOT LIMIT





       }else{

//RETRCIT THE USER FROM CARRYING OUT TRANSACTION MORE THAN 20,000 DAILY


//NOW CHECK IF USER HAS EXCEED THER ACCOUNT LIMIT//


$limti_check = "SELECT * FROM Account_limit WHERE User_id ='$_SESSION[New_user]'";


$limit_result = $conn -> query($limti_check);


if ($limit_result -> num_rows > 0){


    $check_limit = $limit_result -> fetch_assoc();



    $limit_1 = 10000;

    $limit_2 = (int) filter_var($_POST["amount"],FILTER_VALIDATE_INT);


    htmlspecialchars($limit_2);

//NOW CHECK IF USER HAS EXCCEEDED THE DAILY LIMIT//
if ($check_limit["Limit_amount"] > $limit_1){



    $message_status = "Daily limit exceeded &#128532.Your limit is ₦20,000 daily,please upgrade to kyc2 ";


    include __DIR__.("/Failed.php");


    die();




}else{



    //CEHCK IF THE AMOUNT WHEN SUM UP WITH THE PREVOIUS LIMIT WILL BE MORE THAN 20,000


$limit_3 = $limit_2 + $check_limit["Limit_amount"];


    if ($limit_3 > $limit_1){

//DAILY LIMIT HAS BEEN EXCEEDED//

$message_status = "Daily limit exceeded &#128532.Your limit is ₦10,000 daily,please upgrade to kyc2 ";


include __DIR__.("/Failed.php");


die();



    }




}



}




       }










        $_SESSION["Account_no"] = $result_acct["Account_no"];

        $_SESSION["Surname"] =   $result_acct["Surname"];

        $_SESSION["First_name"] =   $result_acct["First_name"];
        $_SESSION["Last_name"] = $result_acct["Last_name"];


       $_SESSION["Account_balance"] = $result_acct["Account_balance"] - $amount;

       $_SESSION["Account_balance"];

$_SESSION["AMOUNT"] = $amount;


$_SESSION["New_bal"] = $user["Account_balance"] - $_SESSION["AMOUNT"];

$_SESSION["remark"] = htmlspecialchars($_POST["remark"]);


    }

}else{


    $message_status = "Invalid account number &#128532";


    include __DIR__.("/Failed.php");


    die();


   
}





}

//CHECK IF USER ACCOUNT BALANCE IS SUFFICEINT

if ($amount > $user["Account_balance"]){



    $message_status = "Insufficient balance";


    include __DIR__.("/Failed.php");


    die();




}







}else{
    header("location: index.php");
    exit;
}

?>

         <div class="verifcation-box">
            <h1><i class="fa fa-check"> </i><br>Confirm Paymemt</h1>    
            
  <p>You are about to send <b> <?php echo "₦". number_format (     
$_SESSION["AMOUNT"] ). ".00" ;?></b> to <b><?php echo $_SESSION["Surname"] . " ". $_SESSION["Last_name"]. " ". $_SESSION["First_name"];?></b> </p>
  
  <p>Please verify the details properly.</p>
  
  <p>Your new balance will be <b><?php echo "₦". number_format ($_SESSION["New_bal"]);?></b></p>
 

  <form method ='post' action="checkout.php">
  <p><input type="checkbox" name="beneficiary" value="save"> Save as beneficary</p>


     <p class="send-btn" onclick="openPin(event)">send</p>

<p class="error_message"></p>


  </div>

      <?php include __DIR__.("/EnterPin.php"); ?>
  
           




           <style>

            body{
                margin: 0;
                font-size: 15px;
                background-color: rgba(0,0,0,0.7);
            }
            i{
                cursor: pointer;
                
            }
            span{
                cursor: pointer;
            }
            h1 i{
margin-top: 10px;
margin-bottom: 5px;
border-radius: 50%;
width: 35px;
height: 35px;
font-size: 25px;
color: mediumseagreen;
                background-color: white;
            }
            h1{
                color: white;
                background-color: mediumseagreen;
                padding: 5px 5px;
            }
            .verifcation-box{
                width: 90%;
             overflow-y: scroll;
                background-color: white;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                /*position: fixed;*/
                display: block;
                /*  margin-top: 20px;
                border: 4px solid rgb(0,0,52);*/
             
            }
            .verifcation-box p:nth-child(1){
                box-shadow:  0px 16px 8px 0px rgba(0,0,0,0.2);
                padding:  10px 10px;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
            .verifcation-box input[type=submit]{
                width: 50%;
                font-size: 20px;
                padding: 10px 10px;
                border: none;
                background-color: rgb(0,0,180);
                color: white;
                margin-bottom: 100px;
                margin-top: 10px;
                border-radius: 2rem;
            }
            input[type=submit]{
                border-radius: 2rem;
                width: 50%;
                font-size: 20px;
                padding: 10px 10px;
                border: none;
                background-color: mediumseagreen;
                color: white;
                margin-bottom: 100px;
                margin-top: 10px;
            }
            .send-btn{
                text-align: center;
                padding: 10px 10px;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                display: block;
                background-color: mediumseagreen;
                color: white;
                border-radius: 2rem;
                cursor: pointer;
            }
            i{
                color: white;
            }
            span{
                color: white;
            }
           </style>

           </body>
           </html>