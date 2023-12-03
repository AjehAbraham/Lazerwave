<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["email"])){

$email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);


if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) == TRUE){

  die("<b style='color:red;'>Invalid email</b>");



}else{


   // die("<b style='color:red;'>Invalid email</b>");

   require_once "db_connection.php";

   $email = mysqli_real_escape_string($conn,$email);
   $email = stripslashes($email);
   $email = trim($email);
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

   $hash_key = uniqid().rand(23432,876123). uniqid().uniqid();

   $key_id = password_hash($email,PASSWORD_DEFAULT);

   $status = "Null";

$select = "SELECT * FROM Register_db WHERE Email='$email'";

$email_result = mysqli_query($conn,$select);

if(mysqli_num_rows($email_result) > 0){

//USER DETAILS FOUND//

$result = mysqli_fetch_assoc($email_result);

$insert = "INSERT INTO Reset_password(User_id,Email,Hash_key,Key_id,Date,
User_agent,Ip,Status)

VALUES('$result[id]','$result[Email]','$hash_key','$key_id','$date','$user_agent','$ip','$status')
";

if(mysqli_query($conn,$insert)){

//SEND USER EMAIL TO AUTHENTICATE RESET PASSWORD//

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


function getBrowser() { 
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
  
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    }elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    }
  
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    }elseif(preg_match('/Firefox/i',$u_agent)){
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    }elseif(preg_match('/OPR/i',$u_agent)){
      $bname = 'Opera';
      $ub = "Opera";
    }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
      $bname = 'Google Chrome';
      $ub = "Chrome";
    }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
      $bname = 'Apple Safari';
      $ub = "Safari";
    }elseif(preg_match('/Netscape/i',$u_agent)){
      $bname = 'Netscape';
      $ub = "Netscape";
    }elseif(preg_match('/Edge/i',$u_agent)){
      $bname = 'Edge';
      $ub = "Edge";
    }elseif(preg_match('/Trident/i',$u_agent)){
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    }
  
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
  ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
          $version= $matches['version'][0];
      }else {
          $version= $matches['version'][1];
      }
    }else {
      $version= $matches['version'][0];
    }
  
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
  
    return array(
      'userAgent' => $u_agent,
      'name'      => $bname,
      'version'   => $version,
      'platform'  => $platform,
      'pattern'    => $pattern
    );
  } 
  
  // now try it
  $ua=getBrowser();
  $yourbrowser=  $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] ;
  
  $user_agent = $user_agent. " on ". $yourbrowser;

$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);


$to = $result["Email"];
$from = 'Lazerwave@gmail.com';
$fromName = 'Reset-password'; 

$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
/*$headers .= 'Bcc: welcome2@example.com' . "\r\n"; */
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

$subject ="Reset Password";
 

 
 $MailMessage ="
    <h3 style='color: white; padding: 10px 10px ;margin: auto; text-align: center;background-color: rgb(0,0,100)'>Lazerwave</h3>";
    
    
    $MailMessage .="<p>Hello ".$result["Surname"]. ",<p>";
    
    
    $MailMessage .="<p>Click <a href='9paywave.000webhostapp.com/create-password?Token=$hash_key'></a> to reset your password</p>";
    
    $MailMessage .="<p>Device ". $user_agent."</p>";

    $MailMessage .="<p>From ". $ip."</p>";

    
 
 $mail = mail($to,$subject,$MailMessage, $headers);

 if($mail == TRUE){


 // die("Email has been sent to Reset your password.");


die("success");

 }else{


 
die("Failed to send Email,please try again.");

 }

}else{

//ERROR OCCURS //

die("Error occur please try again");

}



}else{

//RECORD NOT FOUND,CHECK TEMPORARY REGISTER DATABASE//

$temp = "SELECT * FROM Register_tmp WHERE Email='$email'";


$email_result = mysqli_query($conn,$temp);

if(mysqli_num_rows($email_result) > 0){

//A MATCH IS FOUND IN TEMPEORAY DATABASE//



$result = mysqli_fetch_assoc($email_result);

$insert = "INSERT INTO Reset_password(User_id,Email,Hash_key,Key_id,Date,
User_agent,Ip,Status)

VALUES('$result[id]','$result[Email]','$hash_key','$key_id','$date','$user_agent','$ip','$status')
";

if(mysqli_query($conn,$insert)){

//SEND USER EMAIL TO AUTHENTICATE RESET PASSWORD//


die("Email has been sent to Reset your password.");

}else{

//ERROR OCCURS //

die("Error occur please try again");

}

//SEND USER EMAIL TO AUTHENTICATE RESET PASSWORD//


}else{


//RECORD NOT FOUND ANYWHERE//

die("User does not exit");

}


}



}

}else{

die("Please enter your email");

}



}