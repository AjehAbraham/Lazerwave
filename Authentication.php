<?php


session_start();

if (isset($_SESSION["New_user"])){

  // IF USER HAS ALREADY SING IN REDIRECT THEM TO HOME PAGE TO AVOID RE-WRITTING COOKIE 

  header("location:index.php");
    exit;
}else{


    // CHHECK IF THE COOKIE IS SET
    
if (isset($_COOKIE["userId"])){

    if (isset($_COOKIE["check_confirm_real"])){

      (int) filter_var($_COOKIE["userId"],FILTER_VALIDATE_INT);


      htmlspecialchars($_COOKIE["userId"]);

      htmlspecialchars($_COOKIE["check_confirm_real"]);

   
   //CHECK IF THE COOKIE IS VALID WITH THE COOKIE IN DATABASE  
   
   require_once __DIR__.("/db_connection.php");



   $check = "SELECT * FROM  Authentication_table WHERE User_id ='$_COOKIE[userId]'";


   $result = $conn -> query($check);

   if ($result -> num_rows > 0){
    while($real_result = $result -> fetch_assoc()){

        // now check if the hash_link match so that we can log the user in

       if (password_verify($_COOKIE["check_confirm_real"],$real_result["Hash_key"]) == "password_hash"){


        session_start();

        session_regenerate_id();
$_SESSION["New_user"] = $real_result["User_id"];


require_once __DIR__.("/Account limit.php");



header("location:index.php");
     exit;

       }else{
      //redirect user to home page is cookie is false

       header("location:index.php");
       exit;
       }



    }
   }


   
    }else{
     // header("location:index.php");
    //  exit;
    }
   
    
   
   }else{
   
   // header("location:index.php");
   //  exit;
   
   }
}



?>