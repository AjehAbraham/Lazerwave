<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);

if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) == TRUE){

    die("Invalid email");

}else{

htmlspecialchars($email);

}



$password = htmlspecialchars ($_POST["password"]);

if(empty($password)){

  die("Please create a password");


}else if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){


    die("Password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");



}else{

$password = htmlspecialchars($password);


}



if(isset($_POST["country"]) && !empty($_POST["country"])){


$country = htmlspecialchars($_POST["country"]);


if($country =="Nigeria" || $country == "Ghana"){



}else{


die("Not Avalaible in your Region ".$country);

}


}else{

die("Please select a country");


}


if(isset($_POST["terms"])){

$terms =  filter_var($_POST["terms"],FILTER_SANITIZE_STRING);

if(empty($terms)){

  die("Please accept out terms and conditions");

}else{


    if ($terms == "yes"){

        htmlspecialchars($terms);


    }else{

die("Invalid terms,Please select terms");


    }


}

}else{


  die("Please Accept out Terms");
}

/// TRIM AND REMOVE BACKLASH FROM INPUT//

//print_r($_POST);
//die();

trim($country);

//NOW REMOVE BACKLASH//

stripcslashes($country);
stripcslashes($terms);
stripcslashes($email);

  
require_once __DIR__ .("/db_connection.php");


$country = mysqli_real_escape_string($conn,$country);
$email = mysqli_real_escape_string($conn,$email);
$terms = mysqli_real_escape_string($conn,$terms);


//NOW CHECK IF EMAIL ALREADY EXIST IN DATABASE TO AVOID DUPLICATE ENTERY//

  
  
    $sql = "SELECT * FROM Register_db WHERE Email = '$email'";
  
  
   // $result = $conn -> query ($sql);

   $result = mysqli_query($conn,$sql);
  
    if (mysqli_num_rows($result) > 0){
      
        die("User already exist");
    
      
    }else{

      $date = date("Y/m/d");
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

$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$key = rand(). uniqid(). rand(838378,8309875). uniqid();


$password = password_hash($password,PASSWORD_DEFAULT);

//CHECK IF USER HAS MANNUALLY REGISTER//

$check = "SELECT * FROM Register_tmp WHERE Email='$email'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

//USER HAS TEMEPORALY REGISTER//

die("success");

}else{


  //DO NOTHING
}


if(isset($_POST["code"]) && !empty($_POST["code"])){


  $refrealCode = htmlspecialchars($_POST["code"]);

  $refrealCode = mysqli_real_escape_string($conn,$refrealCode);

  $refrealCode = trim($refrealCode);
  $refrealCode = stripslashes($refrealCode);




}else{

 $refrealCode = rand();

}

$insert = "INSERT INTO Register_tmp(Email,Password,Country,Date,Time,User_agent,Ip_addr,Key_id)

VALUES('$email','$password','$country','$date','$time','$user_agent','$ip','$refrealCode')
";


if(mysqli_query($conn,$insert)){


 // $_SESSION["reg_auth"] = $key;


  die("success");

}else{

die("Error occur,please Retry");


}





  
  mysqli_close($conn);
  

  }

}
?>  
