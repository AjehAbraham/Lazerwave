<?php 
require_once __DIR__.("/sessionPage.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$DOB =  htmlspecialchars($_POST["DOB"]);

if (empty($DOB)){
    
    die("Please enter a date for date of birth");


}else{

  htmlspecialchars($DOB);


}


$state = filter_var($_POST["state"],FILTER_SANITIZE_STRING);

if (empty($state)){


  die("State cannot be blank");


}else{

if (!preg_match("/^[a-zA-Z-']*$/",$state)){


    die("Only letters and white spaces is allowed for state");



}


  htmlspecialchars($state);
}





$LGA = filter_var($_POST["LGA"],FILTER_SANITIZE_STRING);

if (empty($LGA)){


    die("Please enter a your  Local govermenmt.");


}else{


if (!preg_match("/^[a-zA-Z-']*$/",$LGA)){


    die("Only letters and white spaces is allowed for LGA");



}

  htmlspecialchars($LGA);


}




$M_name = filter_var($_POST["M_name"],FILTER_SANITIZE_STRING);

if (empty($M_name)){

    die("Please enter Mother's name .");


}else{

  htmlspecialchars($M_name);
}




$N_kin= filter_var($_POST["N_kin"],FILTER_SANITIZE_STRING);

if (empty($N_kin)){


    die("Next of kin name cannot be blank.");


}else{


  htmlspecialchars($N_kin);
}




$Status = filter_var($_POST["status"],FILTER_SANITIZE_STRING);

if (empty($Status)){


    die("Please tell us your relationship status with your next of kin.");


}else{

    
    if (!preg_match("/^[a-zA-Z-']*$/",$Status)){

    
        die("Only letters and white spaces is allowed for Relationship with Next of kin");
    
    
    
    }

  htmlspecialchars($Status);
}





$occupation = filter_var($_POST["Occupation"],FILTER_SANITIZE_STRING);

if (empty($occupation)){

    die("Please tell us more about your job status.");


}else{



//CHECK IF OCCUPATION IS A VALID ONE


if (!$occupation === "Student" || !$occupation === "Self employed" ||
!$occupation === "Employed" || !$occupation === "Retired"){


    die("Invalid occupation");





}

  htmlspecialchars($occupation);


}

//VALDIATE DATE//

//if(!checkdate($DOB)){

//  die("Invalid Date Format");
//}

require_once __DIR__.("/db_connection.php");

$date =htmlspecialchars( date("Y/m/d  H:i:s") );

$ip_addr = htmlspecialchars( $_SERVER["REMOTE_ADDR"]);



$stmt  = $conn -> prepare("INSERT INTO More_information(User_id,DOB,State_origin	,LGA,Mother_name,
Next_kin,Relationship_kin,Occupation,Date_sub,Ip_add	)

VALUES(?,?,?,?,?,?,?,?,?,?)

");

$stmt -> bind_param("isssssssss",$_SESSION['New_user'],$DOB,$state,$LGA,$M_name,$N_kin,$state,$occupation,$date,$ip_addr);


if ($stmt == TRUE){

  $stmt -> execute();
  
  die("success");


}else{
 


    die("An unknown error has occur,please try again later");

}
$stmt -> close();

$conn -> close();





}


?>


