<?php

$BlockStatusCheker = "SELECT * FROM Block_account WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1";

$CheckerResult = mysqli_query($conn,$BlockStatusCheker);

if(mysqli_num_rows($CheckerResult) > 0){

    //CHECK IF USER ACCOUNT HAS BEEN BLOCK//

    $UserAccountStatus = mysqli_fetch_assoc($CheckerResult);
    //var_dump($UserAccountStatus);

    if($UserAccountStatus["Account_status"] == "Block"){


        die("Your account is not Active,Please re-activate your account");

    }elseif ($UserAccountStatus["Account_status"] == "Unblock"){


        //USER IS GOOD TO GO//


    }else{


        die("Please contack Admin to help resolve your account");

    }


}else{


    //USER IS GOOD TO GO//
}