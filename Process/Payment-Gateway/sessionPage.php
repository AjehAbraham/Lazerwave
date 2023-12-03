<?php
session_start();

if (isset($_SESSION["New_user"])){

    require_once __DIR__.("/db_connection.php");

    $SQL = "SELECT * FROM Register_db WHERE id = '$_SESSION[New_user]' ";

 $result = mysqli_query($conn,$SQL);
  
 $user = mysqli_fetch_assoc($result);

 // CHECK USER LOGIN IF IT IS VALID OR NOT//
 require_once "Daily visitors.php";
 

 require_once "Verfiy login.php";
 


//require_once __DIR__.("/Daily visitors.php");



}else{

    session_destroy();

die("Please login or reload page.");


 }

 //mysqli_close($conn);
?>

