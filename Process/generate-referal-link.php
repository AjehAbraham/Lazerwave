<?php

require_once __DIR__.("/sessionPage.php");


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){


require_once __DIR__.("/db_connection.php");




if(isset($_POST["refer"])){


$refer =htmlspecialchars($_POST["refer"]);


$refer= filter_var($refer,FILTER_SANITIZE_STRING);


if (empty($refer)){



die("Invalid request,please try again.");

}else if($refer == "refer"){


//IS A VALID REUQEST//


$date =htmlspecialchars(date("Y-m-d H:i:s"));

$time =htmlspecialchars(date("H:i:s"));

$refer_code =rand(765,9846).uniqid() . rand(12,76);

$ip_addr =htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$amount = 1000;

$insert ="INSERT INTO Refer_and_Earn(User_id,Amount,Link_key,Date)

VALUES('$_SESSION[New_user]','$amount','$refer_code','$date')";

if(mysqli_query($conn,$insert)){

    die("success");

}else{

die("Error creating link,please try again.");



}





}else{


die("Error reuqest,please try again.");



}





}else{

die("Server error,please try again.");




}



mysqli_close($conn);
}

?>