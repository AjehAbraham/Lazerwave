<?php
require_once "sessionPage.php";

$_SESSION["Email"] = $user["Email"];
$_SESSION["Surname"] = $user["Surname"];

if ($_SERVER["REQUEST_METHOD"] == "GET"  && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");

  exit;


}


if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $OTP = (int) filter_var($_POST["otp_no"],FILTER_SANITIZE_NUMBER_INT);

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
///CHECK IF OTP IS EMPTY

if (!empty($OTP)){  

  htmlspecialchars($OTP);



//now check if otp match//

require_once __DIR__.("/db_connection.php");

$check_otp = "SELECT * FROM General_otp_table WHERE User_id ='
$_SESSION[New_user]' AND NOW() <= DATE_ADD(Date,INTERVAL 10 MINUTE) ORDER BY id DESC LIMIT 1";

//$OTP_result = $conn -> query($check_otp) -> fetch_assoc();
$OTP_result = mysqli_query($conn,$check_otp);

if(mysqli_num_rows($OTP_result) > 0){


$UserOtp = mysqli_fetch_assoc($OTP_result);

//CHECK IF USER HAS USED OTP//
if($UserOtp["Status"] == "seen"){

  die("Otp has expired");

}

if(password_verify($OTP,$UserOtp["Hash"]) == "password_hash" && $OTP == $UserOtp["Otp"]){

//UPDATE OTP STATUS SOP THAT USER CANNOT USE IT AGAIN//

$update = "UPDATE General_otp_table SET Status='seen' WHERE User_id='$_SESSION[New_user]' AND Otp='$OTP'";

if(mysqli_query($conn,$update)){

//INSERT DATS//

$status = "verified";
$INSERT = "INSERT INTO Email_verification(User_id,Status,Date,Time)
  
VALUES('$_SESSION[New_user]','$status','$date','$time')
";

if(mysqli_query($conn,$INSERT)){


  $to =$_SESSION["Email"] ;
  $subject = "Email Verification";
  $headers = "From:Lazewave.com \r\n";
 // $headers .= "CC:".$_SESSION['reset_pass_email']. "\r\n";
  $headers .="MIME-Version:1.0\r\n";
  $headers .="Content-Type: text/html;charset=ISO-8859-1\r\n";
  
  
  $message ='<p style="margin-left: 6px"> Hello '. $_SESSION["Surname"]. ',</p>';
  
  $message .='<p>Your Email has been verified  successfully</p>';
  
  $message .='<p>From ip address'. $ip_add.'</p>';
  
  $message .="<p>Using ". $user_agent."</p>";
  
  
  mail($to,$subject,$message,$headers);


//REDIRECT USER TO DESTROY SESSION//16479
unset($_SESSION["Email"]);




  die("success");

}else{

  die("Please Re-try again");

}


}else{


  die("Failed");

}


}else{


  die("Invalid Otp or Otp has expire");


}



}else{


  die("Please Request or Re-request for Otp");


}

}else{


  die("Please enter your otp");

}
}
mysqli_close($conn);
