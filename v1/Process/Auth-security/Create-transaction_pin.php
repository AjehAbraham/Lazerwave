<?php require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    


    if(isset($_POST["new_pin"])){


        $pin = (int) filter_var($_POST["new_pin"],FILTER_SANITIZE_NUMBER_INT);

        if(empty($pin)){

            die("Pin must be four digit mumber");

        }elseif(strlen($pin) <= 3 or strlen($pin) >= 5){



            die("Pin must be four digit");

        }
        
        else{

          $pin =  htmlspecialchars($pin);

        }

    }else{

        die("Please enter new pin");

    }


    if(isset($_POST["confirm-pin"])){


        $confirmPin = (int) filter_var($_POST["confirm-pin"],FILTER_SANITIZE_NUMBER_INT);

        if(empty($confirmPin)){

            die("Confirm pin must be four digit mumber");

        }elseif(strlen($confirmPin) <= 3 or strlen($confirmPin) >= 5){



            die("Confirm pin must be four digit");

        }
        
        else{

          $confirmPin =  htmlspecialchars($confirmPin);

        }



    }else{

        die("Please re-enter your pin");

    }




//CHECK IF BOTH PIN ARE THESAME//

if($pin !== $confirmPin){
    die("Pin mismatch,Please make sure both pin are the same");

}else{

    //CHECK IF PIN CAN BE EASILY GUESSED//

    if($pin == "1234"){


        die("Pin is very weak");
    }elseif($pin == "4567"){

        die("Pin is very weak");
    }else{

$year = htmlspecialchars(date("Y"));

if($pin == $year){

    die("Pin is weak");
}

    }

//INSERT PIN TO DATABAS//

require_once "db_connection.php";

$pin = mysqli_real_escape_string($conn,$pin);
$pin = stripslashes($pin);
$pin = trim($pin);

$date = htmlspecialchars(date("Y/m/d H:i:s"));


//CHECK IF USER IS RE-SUBMING FORM AGAIN//

$select ="SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]'";

$result = mysqli_query($conn,$select);

if(mysqli_num_rows($result) > 0){

    die("Transaction pin has been created already");

}else{



}

$pin = password_hash($pin,PASSWORD_DEFAULT);

$insert = "INSERT INTO User_pin (User_id,Pin,Date_id)

VALUES('$_SESSION[New_user]','$pin','$date')
";

if(mysqli_query($conn,$insert)){

    die("success");
}else{


    die("Error occured while creating your pin");

}



}

mysqli_close($conn);

}else{

    header("Location: Warning");
    exit;
}

?>