<?php
$otp = rand(19872,134920);
        
$date = date("Y/m/d H:i:s");
$time = date("H:i:s");


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

  $ip_add = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
  $date = htmlspecialchars(date("Y/m/d H:i:s"));
  $time = htmlspecialchars(date("H:i:s"));
  $hash = password_hash($otp,PASSWORD_DEFAULT);
  $status = "";

$insert ="INSERT INTO General_otp_table (User_id,Otp,Hash,Date,Time,Status,User_agent)

VALUES('$_SESSION[New_user]','$otp','$hash','$date','$time','$status','$user_agent')

";

if(mysqli_query($conn,$insert)){

  $to =$_SESSION["Email"] ;
  $subject = "Email Verification";
  $headers = "From:Lazewave.com \r\n";
 // $headers .= "CC:".$_SESSION['reset_pass_email']. "\r\n";
  $headers .="MIME-Version:1.0\r\n";
  $headers .="Content-Type: text/html;charset=ISO-8859-1\r\n";
  
  
  $message ='<p style="margin-left: 6px"> Hello '. $_SESSION["Surname"]. ',</p>';
  
  $message .='<p>Your Otp is ' .$otp  .' </p>';
  
  $message .='<p>Please do not share this code.Your Otp will expire in 10 mintues</p>';
  $message .= '<p> If you did not request for this please ignore</p>';
  
 $mail = mail($to,$subject,$message,$headers);


//REDIRECT USER TO DESTROY SESSION//16479
//unset($_SESSION["Email"]);


if($mail == TRUE){


  //die("Otp has been sent to ". $_SESSION["Email"]);

  $topMessage = "Otp has been sent";
  
}else{

//die("Failed");
$topMessage = "Failed to send OTP";

}

}else{


  die("Error has occured,Please re-try again");
}