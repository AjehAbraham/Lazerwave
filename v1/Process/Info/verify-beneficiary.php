<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["acct_no"]) && !empty($_POST["acct_no"])){


    $string = filter_var($_POST["acct_no"],FILTER_SANITIZE_NUMBER_INT);

if(strlen($string) >= 9 && strlen($string) <= 10){

    $select = "SELECT * FROM Register_db WHERE Account_no='$string'";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){
//  USER FOUND//

$user = mysqli_fetch_assoc($result);

die($user["Account_no"]);

    }else{


        //ACCOUNT NUMBER CANNOT BE FOUND//
    }

}else{
//STRING IS EITHER LESS THAN 9 OR GREATER THAN 11//

    exit;
}


}else{

    //DATA NOT AVALIABLE IN REQUEST//
    exit;
}



}else{

//INVALID REQUEST TYPE
    exit;
}
