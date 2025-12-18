<?php
require_once "sessionPage.php";

if($_SERVER['REQUEST_METHOD'] == "GET" && realpath[__FILE__] == realpath($_SERVER["SCRIPT_NAME"])){


header("location: Warning");
exit;

}elseif($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["key"]) && !empty($_POST["key"])){

$key = htmlspecialchars($_POST['key']);


}else{


    die("Invalid request");

}



if(isset($_POST["title"]) && !empty($_POST["title"])){

    $title = htmlspecialchars($_POST['title']);
    
    
    }else{
    
    
        die("Please enter link Title");
    
    }

    
if(isset($_POST["amount"]) && !empty($_POST["amount"])){

    $amount = htmlspecialchars($_POST['amount']);

    if($amount <= 999){

        die("Amount cannot be less than ₦1,000");
    }
    
    
    }else{
    
    
        die("Please enter Amount");
    
    }

    
if(isset($_POST["message"]) && !empty($_POST["message"])){

    $messaage = htmlspecialchars($_POST['message']);
    
    
    }else{
    
    
        $messaage = "";
    
    }
    

     
if(isset($_POST["status"]) && !empty($_POST["status"])){

    $status = htmlspecialchars($_POST['status']);
    
    
    }else{
    
    
        $status = "";
    
    }

     
if(isset($_POST["Transaction-pin"]) && !empty($_POST["Transaction-pin"])){

    $pin = htmlspecialchars($_POST['Transaction-pin']);
    
    
    }else{
    
    die("Please enter your Transaction pin");
    
    }


    require_once "db_connection.php";

 $pin = mysqli_real_escape_string($conn,$pin);   

 $status = mysqli_real_escape_string($conn,$status);  

 $key = mysqli_real_escape_string($conn,$key);  

 $title = trim($title);

$key = trim($key);

//CHECK IF USER TRANSACTION PIN IS CORRECT//

$pinChecker = "SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]'";

$PinResult = mysqli_query($conn,$pinChecker);

if(mysqli_num_rows($PinResult) > 0){


    $UserPin = mysqli_fetch_assoc($PinResult);

    if(password_verify($pin,$UserPin["Pin"]) == "password_hash"){


        //PIN MATCH AND IS CORRECT NOW CHECK THE LINK STATUS IF ITY IS BLOCKED OR NOT..

$select = "SELECT * FROM Payment_link_table WHERE User_id='$_SESSION[New_user]' AND Hash_link='$key'";


$linkResult = mysqli_query($conn,$select);

if(mysqli_num_rows($linkResult) > 0){

$link = mysqli_fetch_assoc($linkResult);


if(!empty($status)){


    if($link["Status"] == "Active"){

        $linkStatus = "Block";

    }else if ($link["Status"] == "Block"){

        $linkStatus = "Active";
    }else{

        $linkStatus = "Active";

        
    }

}else{

    $linkStatus = "Active";

}


//var_dump($link);

// "<br>". $linkStatus;

//UPDATED LINK //


$update = "UPDATE Payment_link_table SET Status='$linkStatus',Title='$title',Link_message='$messaage',Amount='$amount' WHERE User_id='$_SESSION[New_user]' AND Hash_link='$key' ";


if(mysqli_query($conn,$update)){


    die("success");

}else{

    die("Unknown error occured");

}


}else{


    //A MACTH FOR LINK COULD NOT BE FOUND//
    die("Link does not exits or has been deleted");

}




    }else{


        die("Pin mismatch");

    }


}else{

    die("Please create a Transaction pin");
}

mysqli_close($conn);
}