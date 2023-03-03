<?php
require_once __DIR__.("/sessionPage.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  

$tel = (int) filter_var($_POST["phone-number"],FILTER_SANITIZE_NUMBER_INT);



if (empty($tel)){

$message_status = "Phone number cannot be empty";

require_once __DIR__.("/Failed.php");


    die();

}

$str = 9;

if (strlen($tel) <= $str){


  
$message_status  = "Phone number cannot be empty";

    require_once __DIR__.("/Failed.php");
    
    
        die();

   // die("<p>Invalid phone number</p>");
}

if(strlen($tel) >= 11){


   
$message_status  = "Phone number cannot be empty";

    require_once __DIR__.("/Failed.php");
    
    
        die();

    //die("<p>Phone number too long</p>");
}else{
    htmlspecialchars($tel);
}



$address = filter_var($_POST["address"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);


if (empty($address)){

   
$message_status  = "Phone number cannot be empty";

    require_once __DIR__.("/Failed.php");
    
    
        die();


    //die("<p>Address cannot be blank</p>");
}

if (strlen($address) <= 16){

    
$message_status = "Phone number cannot be empty";

    require_once __DIR__.("/Failed.php");
    
    
        die();


   // die("<p>Address too short</p>");
}else{
    htmlspecialchars($address);
}


$state = htmlspecialchars($_POST["state"]);

if (empty($state)){

  
$message_status = "Please enter a state";

    require_once __DIR__.("/Failed.php");
    
    
        die();


 
}

if (strlen($state) <= 3){


  
$message_status  = "State must be at least four letters";

    require_once __DIR__.("/Failed.php");
    
    
        die();


}



include __DIR__.("/db_connection.php");

$ip_add = $_SERVER["REMOTE_ADDR"];

$date = date("Y-m-dd h:i:s");

$check_rcord ="SELECT * FROM Extra_info WHERE User_id ='$_SESSION[New_user]' ";

$result = $conn ->query($check_rcord);


if ($result -> num_rows > 0){
    while($record = $result -> fetch_assoc()){

        $update_if_found = "UPDATE Extra_info SET Tel='$tel', Address ='$address', State='$state' WHERE User_id = '$_SESSION[New_user]' ";


        if ($conn -> query($update_if_found) == TRUE){


            $status_message = "Record updated successfully";

            require_once __DIR__.("/success.php");
            
            
                die();

        }else{


            $status_message = "An unknown error has occur";

            require_once __DIR__.("/Failed.php");
            
            
                die();



        }



    }
}else{
    

$update_record = "INSERT INTO Extra_info(User_id,Tel,State,Address,Date,Ip_addr)

VALUES('$_SESSION[New_user]','$tel','$state','$address','$date','$ip_add')

";


if ($conn -> query($update_record) == TRUE){
    $status_message = "Updated successfully";

    require_once __DIR__.("/success.php");
    
    
        die();
}else{


    $status_message = "An unknown error has occur";

    require_once __DIR__.("/Failed.php");
    
    
        die();



}

}







}



?>






