<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  
     require_once __DIR__.("/db_connection.php");

    //$conn -> real_escape_string($_POST["email"]);

    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);

    $email = mysqli_real_escape_string($conn,$email);

    if(empty($email)){

die("Please enter your Email");

    }else{

$email = htmlspecialchars($email);


    }



if(isset($_POST["password"]) && !empty($_POST["password"])){

$password = htmlspecialchars($_POST["password"]);


}else{

die("Please enter your password");


}

    

$sql =  "SELECT * FROM Register_db WHERE Email = '$email' ";

//$result = $conn -> query($sql);

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0){

     $new_user = mysqli_fetch_assoc($result);
                 if (password_verify(htmlspecialchars($_POST["password"]), 
                 $new_user["Password"]) == "password_hash"){
                           
               session_start();
                session_regenerate_id();


                $_SESSION["New_user"] = $new_user["id"];

require_once "save season id.php";
require_once "Daily visitors.php";
require_once "login-history.php";

//CHECK IF USER SELECT REMEMBER-ME//
if (isset($_POST["remember-me"])){


      $_SESSION["Set_remeber me"] = rand();

    




}else{

//USER DID NOT SELECT REMEMBER ME//


}


//SEND MESSAGE//  
die("success");

                 }else{

//USER PASSWORD IS INCORRECT//
die("Invalid username or password &#128532;");



                 }




            }else{


//USER INFO COULD NOT BE FOUND IN DATABASE//

//NOW CHECK IF USER HAS REGISTER TEMPORARLY//

$check = "SELECT * FROM Register_tmp WHERE Email='$email'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

      $user_info = mysqli_fetch_assoc($result);

      //CHECK IF USER PASSWORD MATCHES//


      if(password_verify($password,$user_info["Password"]) == "password_hash"){



            session_start();
            session_regenerate_id();
      
            $_SESSION["reg_auth"] = $user_info["Email"];


            
      
            die("success");


      }else{


            die("Invalid username or password &#128532;");



      }


}else{


      die("Your info could not be found &#128532;");




}


die("Your info could not be found &#128532;");

            }


mysqli_close($conn);

      }else{

//WRONG REQUEST METHOD//
header("Location: Warning");
exit;




      }
    
?>