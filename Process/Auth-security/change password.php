<?php require_once __DIR__.("/sessionPage.php") ;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //include __DIR__.("/Loader.php");

$old_password = $_POST["old-password"];

$new_password = $_POST["new-password"];

$confirm_password = $_POST["confirm-password"];


if (empty($old_password)){

    die("Old password cannot be empty");

}

if (empty($new_password)){

   
    
        die("New password cannot be empty");

}
if (empty($confirm_password)){
    
    
        die("please re-enter new password in confirm password");

}


 if ($confirm_password !== $new_password){
    
    
        die("New password and confirm password does not match");


 }else{

    //CHECK IF PASSWORD CONTAIN ONE UPPERCASE ONE LOWER CASE AND ONE SPECAIL CHARACTER



 }

if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$confirm_password)){

    
        die("password must container at least one uppercase,one 
        lowercase,one special character and 8 in length ");





}else{

//CHECK IF OLD PASSWORD PASSWORD MATCH BEFORE YOU CHNAGE THE PASSWORD//

$select = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";

$result = mysqli_query($conn,$select);
$results = mysqli_fetch_assoc($result);

if (password_verify($old_password,$results["Password"]) == "password_hash"){

//OLD PASSWORD IS CORRECT AND IT MATCHES//


//CHECK IF OLD PASSWORD AND NEW PASSWORD IS THESAME//

if(password_verify($confirm_password,$results["Password"]) == "password_hash"){

    die("Old password and New password cannot be the same,Please select a new password");
}

$hash = password_hash($confirm_password,PASSWORD_DEFAULT);
$date = date("Y/m/d H:i:s");
 

$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"tablet"));


$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"mobile"));



$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"windows"));


$isAndriod = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"andriod"));


$isIphone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"iphone"));


$isIpad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"ipad"));


$isIos= $isIpad || $isIphone;



if($isMob){

if($isTab){

 $agent = "Tablet";

}else{


 $agent = "Mobile";
}

}else{

 $agent = "Desktop";
}

if($isIos){

 $user_agent = $agent. " Iphone IOS";

}else if($isAndriod){

$user_agent = $agent . " Andriod";

}else{

$user_agent = $agent. " Windows";

}

$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$time = htmlspecialchars(date("H:i:s"));

//NOW INSERT//

require_once __DIR__.("/db_connection.php");


$update = "UPDATE Register_db SET Password ='$hash' WHERE id='$_SESSION[New_user]'";



if(mysqli_query($conn,$update)){

    //INSERT INTO CHANGE PASSWORD HISTORY//

    $insert = "INSERT INTO Change_password_history(User_id,Date_id,Ip_addr,Device_name,Time_id	
    )
    VALUES('$_SESSION[New_user]','$date','$ip','$user_agent','$time')
    ";



if(mysqli_query($conn,$insert)){

    die("success");

}else{

die("Password updated but error occured");
    
}

}else{


    die("Error occured while updating your password");

}


}else{

    //USER OLD PASSWORD IS NOT CORRECT//

die("Your old password is incorrect");



}

}
 


mysqli_close($conn);

 }else{
    header("location: Warning");
    exit;
 }
 



