<?php
require_once __DIR__.("/sessionPage.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST["tel"])){

$tel = (int) filter_var($_POST["tel"],FILTER_SANITIZE_NUMBER_INT);



if (empty($tel)){


    die("Phone number cannot be empty");

}

$str = 9;

if (strlen($tel) <= $str){


  
    
        die("Invalid phone number");

   // die("<p>Invalid phone number</p>");
}

if(strlen($tel) >= 11){


   
        die("Phone number too long");

    //die("<p>Phone number too long</p>");
}else{
    htmlspecialchars($tel);
}

  }else{

    die("Please enter your phone number");
  }

  if(isset($_POST["address"])){


$address = filter_var($_POST["address"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);


if (empty($address)){

    
        die("Address cannot be empty");



}else{
    htmlspecialchars($address);
}

  }else{

    die("Please enter your address");
  }



  if(isset($_POST['state'])){

$state = htmlspecialchars($_POST["state"]);

if (empty($state)){

    
        die("Please enter a state");


 
}

if (strlen($state) <= 2){


    
        die( "State must be at least four letters");

    
}

}else{


    die("State cannot be blank");
}



include __DIR__.("/db_connection.php");

$tel = mysqli_real_escape_string($conn,$tel);
$address = mysqli_real_escape_string($conn,$address);
$state = mysqli_real_escape_string($conn,$state);
$tel = stripslashes($tel);
$state = stripslashes($state);
$address = stripcslashes($address);

$state = trim($state);
$tel = trim($tel);



$ip_add = $_SERVER["REMOTE_ADDR"];

$date = date("Y-m-d h:i:s");

$check_rcord ="SELECT * FROM Extra_info WHERE User_id ='$_SESSION[New_user]' ";

//$result = $conn ->query($check_rcord);
$result = mysqli_query($conn,$check_rcord);

if (mysqli_num_rows($result) > 0){

//USER HAS FILL FORM SO UPDATE USER INFO INSTEAD//

        $update_if_found = "UPDATE Extra_info SET Tel='$tel', Address ='$address', State='$state' WHERE User_id = '$_SESSION[New_user]' ";

if(mysqli_query($conn,$update_if_found)){
            
                die("success");

        }else{

            
            
                die("An unknown error has occur");



        }


}else{
   //ELSE USER HAS NOT FILL FORM SO INSEART NEW RECORD// 

$update_record = "INSERT INTO Extra_info(User_id,Tel,State,Address,Date,Ip_addr)

VALUES('$_SESSION[New_user]','$tel','$state','$address','$date','$ip_add')

";

if(mysqli_query($conn,$update_record)){

        die("success");

}else{

    
    
        die("An unknown error has occur");



}

}





mysqli_close($conn);

}else{

    header("Location: Warning");
    exit;
}

?>






