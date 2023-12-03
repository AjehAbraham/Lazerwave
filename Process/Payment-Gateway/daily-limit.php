<?php

    //CHECK USER DAILY LIMIT//

    $qury = "- Debit"; 

    $select = "SELECT * FROM Transaction_history WHERE User_id='$_SESSION[New_user]'  AND Date_id >= NOW() - INTERVAL 23 HOUR
    ";


    $limitResult = mysqli_query($conn,$select);

    if(mysqli_num_rows($limitResult) > 0){

//CHECK USER DAILY LIMIT//

while($DailyLimit = mysqli_fetch_assoc($limitResult)){
   

if($DailyLimit["Remark"] != $qury){

    break;
    continue;

}

//var_dump($DailyLimit);


//$DailyAmt += $DailyLimit["Amount"];

$DailyAmt += $DailyLimit["Amount"];



}

//CHECK IF USER HAS UPGRADED TO KYC 2 OR NOT//

$extra = "SELECT * FROM Extra_info WHERE User_id='$_SESSION[New_user]'";

$extraResult = mysqli_query($conn,$extra);

if(mysqli_num_rows($extraResult) > 0){


//USER HAS UPGRADED TO KYC TWO AND THEIR DAILY LIMIT IS SUPPOSE TO BE $50,000//

$testKey = 50000;

$KycAmt = $DailyAmt + $amount;


if( $KycAmt <= $testKey){


    //USER HAS NOT EXCCEDED THEIR DAILY LIMIT//


}elseif ($KycAmt > $testKey){


    die("Daily Limit excceded,Please try again Tomorrow or upgrade to Kyc 3");

}else{


    //DO NOTHING//
}




}else{

//USER HAS NOT YET UPGRADED TO KYC 2//

$testKey = 10000;

$KycAmt = $DailyAmt + $amount;


if( $KycAmt <= $testKey){


    //USER HAS NOT EXCCEDED THEIR DAILY LIMIT//


}elseif ($KycAmt > $testKey){


    die("Daily Limit excceded,Please try again Tomorrow or upgrade to Kyc 2");

}else{


    //DO NOTHING//
}




die("found");

}

    }else{

//USER IS GOOD TO GO//


    }

    