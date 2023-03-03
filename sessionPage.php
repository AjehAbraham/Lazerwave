<?php


session_start();

//session_regenerate_id();

if (isset($_SESSION["New_user"])){
    require_once __DIR__.("/db_connection.php");

    $SQL = "SELECT * FROM Register_db WHERE id = '$_SESSION[New_user]' ";

 $result = $conn -> query($SQL);


 $user = $result -> fetch_assoc();

 require_once __DIR__.("/Account limit.php");

 
 /* 
 echo $_SERVER["http-self"];

 /*if ($result -> num_rows > 0){
    while ($user = $result -> fetch_assoc()){


    }
 }
*/

}else{

  
   
if (isset($_COOKIE["userId"])){

 if (isset($_COOKIE["check_confirm_real"])){

   header("location:Authentication.php");
   exit;



 }else{

   // no need to redirect user
   /*
   header("location:login.php");
   exit;*/
 }

 

}else{

  header("location: Login.php");
  exit;

}
}

?>

