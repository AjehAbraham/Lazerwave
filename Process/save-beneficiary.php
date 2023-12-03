<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"]== "POST"){

if(isset($_POST["data"]) && !empty($_POST["data"])){


    $acct = (int) filter_var($_POST["data"],FILTER_SANITIZE_NUMBER_INT);

    require_once "db_connection.php";

    $acct = mysqli_real_escape_string($conn,$acct);
    $acct = stripslashes($acct);
    $acct = trim($acct);

    $check ="SELECT * FROM Register_db WHERE Account_no='$acct'";

    $Result = mysqli_query($conn,$check);


    if(mysqli_num_rows($Result) > 0){
//A MATCH WAS FGOUND NOW SAVE IT IN SAVED BENEFICIARY//

    $dataDog = mysqli_fetch_assoc($Result);

//NOW CHECK IF USER HAS ALREADY EXIT IN CURRENT USER SAVED EBENEFICARY//

$select = "SELECT * FROM Beneficiary WHERE User_id='$_SESSION[New_user]' AND Acct_no='$acct'";

$Results = mysqli_query($conn,$select);

if(mysqli_num_rows($Results) > 0){


    die("Exit");

    


}else{

    //BENEFICIARY DOES NOT EXITS, NOW SAVE BENEFICARY INFO

    $fullName = $dataDog["Surname"] . " ". $dataDog["Last_name"] . " ". $dataDog["First_name"];
    
$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$date = htmlspecialchars(date("Y/m/d H:i:s"));

$time = htmlspecialchars(date("H:i:s"));


$insert = "INSERT INTO Beneficiary(User_id,Full_name,Acct_no,Date_id,Time_id,Ip_addr)
VALUES('$_SESSION[New_user]','$fullName','$dataDog[Account_no]','$date','$time','$ip')
";

if(mysqli_query($conn,$insert)){


    die("Success");
}else{

    die("Failed");
}



}



    }else{

        die("Failed");
    }


}else{


    die("Invalid request type");

}



}else{


    header("Location: Warning");
    exit;
}