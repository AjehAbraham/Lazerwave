<?php
session_start();
//session_regenerate_id();

if (isset($_SESSION["New_user"])){

  // IF USER HAS ALREADY SIGN IN REDIRECT THEM TO HOME PAGE TO AVOID RE-WRITTING COOKIE 

header("location: dashboard-home");
   exit;
}



    // CHHECK IF THE COOKIE IS SET
    
if (isset($_COOKIE["userId"]) && isset($_COOKIE["Token"])){

      (int) filter_var($_COOKIE["userId"],FILTER_VALIDATE_INT);


      htmlspecialchars($_COOKIE["userId"]);

      htmlspecialchars($_COOKIE["Token"]);

   
   //CHECK IF THE COOKIE IS VALID WITH THE COOKIE IN DATABASE  
   
   require_once __DIR__.("/db_connection.php");
   
   
   $UserId = htmlspecialchars($_COOKIE["userId"]);

$hash_id =  htmlspecialchars($_COOKIE["Token"]);

$UserId = mysqli_real_escape_string($conn,$UserId);
$hash_id = mysqli_real_escape_string($conn,$hash_id);

$UserId = stripslashes($UserId);

$UserId = trim($UserId);
$check = "SELECT * FROM Authentication_table WHERE User_id='$UserId' ORDER BY id DESC LIMIT 1";

  // $result = $conn -> query($check);
  $result = mysqli_query($conn,$check);

   if (mysqli_num_rows($result) > 0){

   // $real_result = $result -> fetch_assoc

$real_result = mysqli_fetch_assoc($result);


//NOW CHECK IS TOKEN AND HASH STORE IN DATABASE MACTHES//

if(password_verify($hash_id,$real_result["Hash_key"]) == "password_hash"){


//PASSWORD HASH MACTH USER IS CLEAR AND VALID TO LOGIN//

session_regenerate_id();

$_SESSION["New_user"] = $real_result["User_id"];


$_SESSION["Set_remeber me"] = rand();

require_once __DIR__.("/save season id.php");



//require_once __DIR__.("/Account limit.php");


require_once  "Process/login-history.php";




//CHECK IF LAST VISITED PAGE IS SET//

if(isset($_COOKIE["last_visited_page"])){


    $lastPage = htmlspecialchars($_COOKIE["last_visited_page"]);

    $lastPage = basename($lastPage, ".php");

    //UNSETCOOKIE FOR LAST VISITED PAGE//

setcookie("last_visited_page", "", time() - 3600);

header("Location: $lastPage");
exit;


}else{
//LAST VISITED PAGE NOT SET

header("Location: dashboard-home");
exit;

}



}else{


//PASSWORD DOES NOT MATCH,UNSET COOKIE AND REDIRECT USER TO LOGIN

setcookie("Token", "", time() - 3600);

setcookie("userId", "" ,time() - 3600);
header("Location: Login");
exit;

}


   }else{

//UNSET COOKIE AS NO RESULT WAS FOUND//

setcookie("Token", "", time() - 3600);

setcookie("userId", "" ,time() - 3600);

header("Location: Login");
exit;



   }


}else{


//COOKIES ARE NOT SET SO REDIRCT USER TO LOGIN PAGE//
header("Location: Login");
exit;

}
?>