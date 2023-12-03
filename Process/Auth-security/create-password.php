<?php
session_start();
//var_dump($_SESSION);

if(!isset($_SESSION["Reset-password-email"]) && !isset($_SESSION["Hash_id"])){


    header("Location: Warning");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["password"]) && isset($_POST["con-password"])){

$password = htmlspecialchars($_POST["password"]);

$con_password = htmlspecialchars($_POST["con-password"]);

if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){


    die("Password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");


}else if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$con_password)){


    die("Confirm Password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");




}else{


//CHECK IF PASSWORD AND CONFIRM PASSWORD IS THESAME//


if($password == $con_password){


    //DO NOTHING
}else{



die("Password and confirm password must be the same");



}


}

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


//UPDATE PASSWORD FOR USEER//

require_once "db_connection.php";

//CHECK REGISTER DATABASES//

$email = $_SESSION["Reset-password-email"];

//CHECK EMAIL //

$test = "SELECT * FROM Reset_password WHERE Email='$email' AND Hash_key='$_SESSION[Hash_id]'";

$status = mysqli_query($conn,$test);

if(mysqli_num_rows($status) > 0){

$permit = mysqli_fetch_assoc($status);


if($permit["Status"] != "Null"){

    die("Link has Expired");

}else{



    //LINK IS VALID//
}


}else{


    die("Failed");
}






$password = password_hash($password,PASSWORD_DEFAULT);

$select = "SELECT * FROM Register_db WHERE Email='$email'";

$result = mysqli_query($conn,$select);


if(mysqli_num_rows($result) > 0){


//USER INFO EXITS UPDATE PASSWORD//
$update = "UPDATE Register_db SET Password='$password' WHERE Email='$email'";

if(mysqli_query($conn,$update)){

//UPDATE RESRET PASSWORD STATUS COLOUMN TO AVOID USER FROM USING LINK AGAIN//

$update_status = "UPDATE Reset_password SET Status='exp' WHERE Email='$email' AND Hash_key='$_SESSION[Hash_id]'";

if(mysqli_query($conn,$update_status)){



}else{

//DO NOTHING//

}
unset($_SESSION["Reset-password-email"] );

unset($_SESSION["Hash_id"]);

die("success");


}else{


    die("Error occur");
}


}else{

//CHECK TEMPORARY REGSITER DATABASE//


$select = "SELECT * FROM Register_db WHERE Email='$email'";

$result = mysqli_query($conn,$select);


if(mysqli_num_rows($result) > 0){

    

//USER INFO EXITS UPDATE PASSWORD//
$update = "UPDATE Register_tmp SET Password='$password' WHERE Email='$email'";

if(mysqli_query($conn,$update)){

    $update_status = "UPDATE Reset_password SET Status='exp' WHERE Email='$email' AND Hash_key='$_SESSION[Hash_id]'";

    if(mysqli_query($conn,$update_status)){
    
    
    
    }else{
    
    //DO NOTHING//
    
    }
    



    
unset($_SESSION["Reset-password-email"] );

unset($_SESSION["Hash_id"]);

die("success");


}else{


    die("Error occur");
}


}




}






    }else{


die("Please fill the form properly");

    }



}else{


    header("Location: Warning");
    exit;
}