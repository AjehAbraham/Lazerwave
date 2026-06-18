<?php
session_start();

$ApiDate = htmlspecialchars(date("Y/m/d H:i:s"));
$ApiDate = date("d D F Y",strtotime($ApiDate));
$ApiDate = $ApiDate ." ". date("H:i:sa");

if($_SERVER["REQUEST_METHOD"] == "GET"){


if(isset($_GET["type"]) && !empty($_GET["type"])){


$requestType =htmlspecialchars($_GET["type"]);

if($requestType == "validate"){


    require_once "API-PACKAGE/Card-gateway/verify-card.php";

    json_encode($API_response);
    print_r($API_response);
die();


}else if($requestType == "top-up"){

require_once "API-PACKAGE/Card-gateway/proccess-payment.php";

}else{


    $API_response = array(
        "Status" => "200",
        "Message" => "Invalid request type",
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


    $API_response = array(
        "Status" => "200",
        "Message" => "Server error",
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


    die();
}