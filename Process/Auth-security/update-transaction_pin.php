<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){



if(isset($_POST["password"]) && !empty($_POST["password"])){


    $password = htmlspecialchars($_POST["password"]);
    
    
    }else{
    
        die("Please enter your password");
    }
    
    

if(isset($_POST["new_pin"]) && !empty($_POST["new_pin"])){


    $pin = htmlspecialchars($_POST["new_pin"]);

    $pin = (int) filter_var($pin,FILTER_SANITIZE_NUMBER_INT);


}else{

    die("Please enter your new pin");
}





if(strlen($pin) <=3){

    die("Pin should be four");


}else if(strlen($pin) >=5 )
{
    
    die("pin too long");


}


//CHECK IF USER PASSWORD MATCH THEN UPDATE TRANSACTION PIN//

require_once "db_connection.php";


$select = "SELECT * FROM Register_db WHERE id='$_SESSION[New_user]'";


$result = mysqli_query($conn,$select);

$results = mysqli_fetch_assoc($result);


if(password_verify($password,$results["Password"]) == "password_hash"){


    //CHECK IF USER OLD PIN AND NEW PIN IS THE SAME//

    $check = "SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]'";

    $pinResult = mysqli_query($conn,$check);

    //PRECAUION//
    if(mysqli_num_rows($pinResult) > 0){

$UserPin = mysqli_fetch_assoc($pinResult);

if(password_verify($pin,$UserPin["Pin"]) == "password_hash"){

    die("Your old Transaction pin cannot the thesame with youe new Transaction Pin");
    
}



    }else{

        die("Create Transaction Pin");
    }

    //USER PASSWORD MATCH AND IT'S CORRECT//
    $HASH = password_hash($pin,PASSWORD_DEFAULT);

    $update = "UPDATE User_pin SET Pin='$HASH' WHERE User_id='$_SESSION[New_user]'";

if(mysqli_query($conn,$update)){


    die("success");
}else{


    die("Error occured while updating your Transaction Pib");

}



}else{




    //PASSWORD IS INCOORECT//
    die("Your password is invalid");
}


}else{


    header("Location: Warning");
    exit;
}