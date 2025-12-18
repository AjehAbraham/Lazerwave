<?php

require_once "db_connection.php";

//THIS FILE CONTAIN CODE(S) TO VALIDATE/FETCH USER CARD DETAILS//

//VALIDET USER API KEY//
require_once "validate-api-key.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){

//CHECK IF CARD DETAILS IS PRESENT IN REQUEST//

if(isset($_GET["token"]) && !empty($_GET["token"])){


    $token = (int) filter_var($_GET["token"],FILTER_SANITIZE_NUMBER_INT);


    if(empty($token)){

        $API_response = array(
            "Status" => "200",
            "Message" => "Token is empty",
            "Response" => "",
            "StatusText" => "506",
            "Type" => "Auto-checker",
            "Date" => "$ApiDate",
            );
            
        json_encode($API_response);
        print_r($API_response);
die();


    }else{


        $fetchCard = "SELECT * FROM User_card WHERE Card_no='$token'";

        $CardResult = mysqli_query($conn,$fetchCard);

        if(mysqli_num_rows($CardResult)> 0){


            $UserResult = mysqli_fetch_assoc($CardResult);

//FETCH CARD USER DETAILS//
$userInfo = "SELECT * FROM Register_db WHERE id='$UserResult[User_id]'";

$userResult = mysqli_query($conn,$userInfo);

$user = mysqli_fetch_assoc($userResult);
$fullName = $user["Surname"] . " ". $user["Last_name"] . " ". $user["First_name"];
            
if($UserResult["Status_r"] == "Block"){

$CardStatus ="InActive";

        }else{

            $CardStatus = "Active";
        }
$API_response = array(
    "Status" => "200",
    "Message" => "success",
    "Response" => array(
    "Full_name" => "$fullName",
    "Type" => "$UserResult[Type]",
    "Status" => "$CardStatus'",
    ),
    "StatusText" => "502",
    "Type" => "Auto-checker",
    "Date" => "$ApiDate",
    );

    
    json_encode($API_response, true);
    var_dump($API_response);
die();


        }else{



            $API_response = array(
                "Status" => "200",
                "Message" => "No result found",
                "Response" => "",
                "StatusText" => "500",
                "Type" => "Auto-checker",
                "Date" => "$ApiDate",
                );

                json_encode($API_response);
                print_r($API_response);
        die();
        
        }


    }


}else{


//TOKEN IS NOT PRESENT SO GIVE USER ERROR MESSSAGE//

$API_response = array(
    "Status" => "200",
    "Message" => "No Token",
    "Response" => "",
    "StatusText" => "506",
    "Type" => "Auto-checker",
    "Date" => "$ApiDate",
    );

    json_encode($API_response);
    print_r($API_response);
die();

}

}else{

//STOP SCRIPT BUT DON'T PRINT ANY MESSAGE BECAUSE ONLY GET REQUEST IS VALID//

die();

}