<?php

//NOW CHECK IF THE COOKIE WE SET WHEN USER LOGIN IN PRESENT AND THE SESSION ID IS CORRECT WITH DATABASE ELSE SIGN THE USER OUT AND DESTROY COOKIE//

 $fetch_log = "SELECT * FROM User_session_id WHERE User_id ='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1";
 
 
 //$log_result = $conn -> query($fetch_log);
 
 $log_result = mysqli_query($conn,$fetch_log);



 if (mysqli_num_rows($log_result) > 0){
 
 //$log_details = $log_result -> fetch_assoc();

 $log_details = mysqli_fetch_assoc($log_result);
 
 //NOW COMPARE DETAILS OF THE CODE//
 
 if($log_details["Session_id"] === session_id()){
 
 //THE SESSION IS VALID //
 
 
 
 
 }else{
 
 //NOW CHECK IF COOKIE IS SET//
 
 unset($_SESSION["New_user"]);
 
 //INVALID SESSION LOG USER OUT//
 
 
 //CHEXK IF COOKIE IS SET TO REDIRECT USER BECAUSE USER HAS PROBALY LOGIN USING ANOTHER BROWSER OR DEVICE//
 
     
if (isset($_COOKIE["userId"])){

    if (isset($_COOKIE["Token"])){
        
        
              
      $new_va = rand(3444,8373) .uniqid().rand(63637,833737);
      
      setcookie("Refresh_session", $new_va,time() + 36000);
      
      
      
      $new_va = password_hash($new_va,PASSWORD_DEFAULT);
      
      $_SESSION["Refresh_session"] = $new_va;
    
        
    
    
    
    
    header("Location: Refresh-session");
    
    exit;
    
    
}
 
 
 }
 
 
 
 }
 
 
 
 }else{
 
 
 //NO RESULT FOUND LOG THE USER OUT AND DESTROY ALL COOKIES 
 
      $new_va = rand(3444,8373) .uniqid().rand(63637,833737);
      
      setcookie("Refresh_session", $new_va,time() - 36000);
    
 
 header("Location: logout");
 
 exit;
 
 
 
 
 
 }
 
 
 
 
 
 
 
 
 
 //}
   
   
   
   
   
   //}
   
   ?>