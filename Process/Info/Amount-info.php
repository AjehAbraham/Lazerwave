<?php
require_once "sessionPage.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    
    if(isset($_POST["amount"]) && !empty($_POST["amount"])){


$amount = (int) filter_var($_POST["amount"],FILTER_VALIDATE_INT);

$test = 49;

if($amount <= $test){


die("Amount cannot be less than ₦50");

}else{
if($user["Account_balance"] < $amount){


    die("Insufficient Funds");
}

$amount ="₦" .number_format($amount). ".00";

echo "<b style='color: white;text-align: center;padding: 10px 10px;
background-color: rgb(0,0,56);border-radius: 2rem;'>".$amount. "</b><br>";

echo "<br>
<label style='color: #666;'><b>Remark (optional):</b></label>
<br>

<input type='text' name='remark' placeholder='Remark(e.g fees,rent)...'>
<br>
<br>

<input type='submit' value='Procced'>

";

die();

}




    }else{


die("Please enter Amount");

    }
    

                //CHECK KYC//
                
                
                $kyc = "SELECT * FROM More_information WHERE User_id ='$_SESSION[New_user]'";
                
                $kyc_result = $conn -> query($kyc);
                
             
                    //NOW CHECK IF USER HAS EXCEEDED DAILY LIMIT//
                    
                    $limit ="SELECT *  FROM Account_limit WHERE User_id='$_SESSION[New_user]'";
                    
                    $limit_result = $conn -> query($limit) -> fetch_assoc();
                    
                    $str = 50000;
                                
              
                }else{


                    header("Location: Warning");
                    exit;
                }




?>
