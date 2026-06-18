<?php
 require_once __DIR__.("/sessionPage.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST["Acct_no"]) && isset($_POST["amount"])){


//NOW CHECK IF DATA IS EMPTY//

if(empty($_POST["Acct_no"])){

  die("Please enter Account number");
}else{


$acct_num = htmlspecialchars($_POST["Acct_no"]);

}

if(empty($_POST["amount"])){


die("Please enter Amount tp procced");

}else{


  $amount = htmlspecialchars($_POST["amount"]);
}


//CHECK IF USER BALANCE IS SUFFICIENT//

$bal_checker = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

$bal_result = mysqli_query($conn,$bal_checker);

if(mysqli_num_rows($bal_result) > 0){

$balance = mysqli_fetch_assoc($bal_result);

if($amount > $balance["Account_balance"] ){

  die("Insufficient Funds");
}


}


if(isset($_POST["remark"]) && !empty($_POST["remark"])){

$remark = filter_var( $_POST["remark"],FILTER_SANITIZE_STRING);

  $remark = htmlspecialchars($remark);

  $_SESSION["remark"] = $remark;

}else{


//USER DID NOT ENTER ANY REMARK//
$_SESSION["remark"] = "Nil";

}

//NOW CHECK BOTH ACCOUNT NUMBER AND AMOUNT IF IT IS VALID//

require_once "db_connection.php";

$acct_num = stripslashes($acct_num);
$amount = stripslashes($amount);
$acct_num = mysqli_real_escape_string($conn,$acct_num);
$amount = mysqli_real_escape_string($conn,$amount);

$validate_acct = "SELECT * FROM Register_db WHERE Account_no ='$acct_num'";

$acct_result = mysqli_query($conn,$validate_acct);

if(mysqli_num_rows($acct_result) > 0){

//A MATCH WAS FOUBD FOR ACCOUNT NUMBER//
$result = mysqli_fetch_assoc($acct_result);


$full_name = $result["Surname"] ." ". $result["Last_name"]. " ". $result["First_name"];

$_SESSION["Full_name"] = $full_name;

}else{


  $checkUsername = "SELECT * FROM Username WHERE Username='$acct_num'";


  $usernameResult = mysqli_query($conn,$checkUsername);

  if(mysqli_num_rows($usernameResult) > 0){
      
      $username = mysqli_fetch_assoc($usernameResult);

      $validate_acct = "SELECT * FROM Register_db WHERE id='$username[User_id]'";

      $acct_result = mysqli_query($conn,$validate_acct);
      
     
      //A MATCH WAS FOUBD FOR ACCOUNT NUMBER//
      $result = mysqli_fetch_assoc($acct_result);
      
      
      $full_name = $result["Surname"] ." ". $result["Last_name"]. " ". $result["First_name"];
      
      $_SESSION["Full_name"] = $full_name;
      




  }else{

die("Invalid username or account Number");


  }

}
//NOW CHECK AMOUNT//
$test = 49;

if($amount <= $test){

die("Amount cannot be less than ₦50");

}else{

$_SESSION["AMOUNT"] = $amount;

}

$_SESSION["New_bal"] = $user["Account_balance"] - $_SESSION["AMOUNT"];

  }else{

//FORM HAS BEEN TEMPERED BY USE

die("Please fill in the form properly");


  }


}else{

header("Location: Warning");
exit;

}
?>

</div>
</div>
<div class="confrim-payment-overlay">
 <div class="confirm-payment-container">

  
  <p><!--i class="fa fa-check-circle"></i--> Confirm Payment</p>
  
  
   <p>Recipient <b><?php echo $_SESSION["Full_name"];?></b></p>
  
  
  
  
  
  <p>Amount <b><?php echo "₦".number_format($_SESSION["AMOUNT"]) . ".00";?></b></p>
  
  
   <p>Charge(s) <b>₦0.00</b></p>
   
    <p>Tax <b>₦0.00</b></p>
  
  
  <p>Remark <b><?php echo $_SESSION["remark"] ?></b></p>
  
  
  <p>Cashback <b>₦0.00</b></p>
  
   <p>Avaliable balance <b><?php echo "₦".number_format($user["Account_balance"]);?></b></p>
  
   
   <p>New balance <b><?php echo "₦". number_format ($_SESSION["New_bal"]);?></b></p>
  
  
  <p>Please validate the details properly as transfer are Irreversible.</p>
  
  


    <p style="font-size: 15px
    ">
  </p>





<p class="opentBtn" onclick="OpenPinBox()">Validate</p>
<br>
<p class="Cancel" onclick="CloseForm()">Cancel</p>

</div>
</div>

  
  
  <style>

.confrim-payment-overlay{
top: 0;
left: 0;
right: 0;
bottom: 0;
position: fixed;
background-color: white;
overflow-y: scroll;
z-index: 1;
}
  
  .confirm-payment-container{
  margin: auto;
  width: 90%;
  background-color: ;
  color: rgb(0,0,100);
  
  }
  .confirm-payment-container b{
    float: right;
  }
  @media screen and (min-width: 600px){
.confirm-payment-container{
width: 70%;


}
}
  
  .confirm-payment-container p:nth-child(1){
  text-align: center;
  font-size: 15px;
  /*color: white;
  background-color: rgb(0,0,52);*/
  padding: 6px 6px;
  border-radius: 2rem;
  
  }
  .confirm-payment-container b{
  color: grey;
  }
  
   .confirm-payment-container p:nth-child(10){
  color: red;
  font-size: 13px;
  text-align: center;
  }
  
  .opentBtn{
  background-color: mediumseagreen;
  text-align: center;
  margin: auto;
  width: 72%;
  color: white;
  padding: 7px 7px;
  font-size: 15px;
  border-radius: 2rem;
  cursor: pointer;
  }
  .Cancel{
  background-color: red;
  text-align: center;
  margin: auto;
  width: 72%;
  color: white;
  padding: 7px 7px;
  font-size: 15px;
  border-radius: 2rem;
  cursor: pointer;
  }
  .Cancel a:link{
  color: white;
  text-decoration: none;
  }
  .Cancel a:visited{
  color: white;
  }
  input[type=submit]{
      padding: 10px 10px;
      font-size: 15px;
      color: white;
      text-align: center;
      background-color: rgb(0,0,52);
      width: 70%;
      border-radius: 2rem;
      cursor: pointer;
  }
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
  float: right;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 13px;
  width: 13px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: rgb(0,0,56);
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.Dark-mode input:checked + .slider{
  border: 1px solid white;
  background-color: green;
}
 .Dark-mode .confrim-payment-overlay{
background-color: rgb(0,0,56);
color:white;
}
.Dark-mode  .confirm-payment-container{
  color: white;
}
.Dark-mode  .confirm-payment-container p:nth-child(3){
  color: white;
}
.Dark-mode .confirm-payment-container b{
  color: white;
}
</style> 