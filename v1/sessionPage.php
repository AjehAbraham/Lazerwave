<?php
session_start();

//session_regenerate_id();

if(isset($_SESSION["reg_auth"])){

header("Location: Finish-profile");
exit;

}


if (isset($_SESSION["New_user"])){

    require_once __DIR__.("/db_connection.php");

    require_once "Router/verify-login.php";

    $SQL = "SELECT * FROM Register_db WHERE id = '$_SESSION[New_user]' ";

 
$result = mysqli_query($conn,$SQL);

$user = mysqli_fetch_assoc($result);

 
 // CHECK USER LOGIN IF IT IS VALID OR NOT//

//CHECK IF REMEBER ME SESSION IS SET//

if(isset($_SESSION["Set_remeber me"])){

//UNSET THE SESSION//
unset($_SESSION["Set_remeber me"]);

  $cookie_name = "Token";


  $cookie_value =uniqid() .rand(). uniqid().rand(). uniqid();

  // hash th cookie value for safety


  setcookie($cookie_name,$cookie_value,time() + 86400 * 7);

  //set another cookie to save user id to avoid conflit

  $cookie_two_name ="userId";


  $cookie_two_vaLue = $_SESSION["New_user"];

 

  setcookie($cookie_two_name,$cookie_two_vaLue,time() + 86400 * 7);

  $cookie_value = password_hash($cookie_value,PASSWORD_DEFAULT);

  $cookie_two_vaLue = password_hash($cookie_two_vaLue,PASSWORD_DEFAULT);
  

  $date = date("Y/m/d H:i:s");

                               
  $insert_record = "INSERT INTO Authentication_table(User_id,Hash_key,Date_created)
  VALUES('$_SESSION[New_user]','$cookie_value','$date')";

 if(mysqli_query($conn,$insert_record)){


  //COOKIE DATA SUCCESSFULLY INSERTED//


 }else{

//ERROR OCCUR WHILE INSERTING COOKIE DATA



 }
}else{

//IT'S NOT SET SO DO NOTHING//


}


//require_once __DIR__.("/show addvert.php");


require_once __DIR__.("/include username.php");

require_once "create-transaction-pin.php";
//DAILY VISITORS GET REQUEST//



}else{

  
   
if (isset($_COOKIE["userId"]) && isset($_COOKIE["Token"])){
     
     require_once __DIR__.("/Last page.php");

     
     
session_destroy();

   header("location: Authentication");
   exit;



 }else{


  session_destroy();

  header("Location: Login");
  exit;

 }

 

}




?>

