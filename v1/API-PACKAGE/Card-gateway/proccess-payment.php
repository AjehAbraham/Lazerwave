<?php
require_once " validate-api-key.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){

require_once "validate-card.php";

//NOW CHECK IF REQUEST HAS ALL THE NECCESSARY INFO LIKE AMOUNT

if(isset($_GET["Amount"]) && !empty($_GET["Amount"])){


$amount = (int) filter_var($_GET["Amount"],FILTER_VALIDATE_NUMBER_INT);

if(empty($amount)){

    
    $API_response = array(
        "Status" => "200",
        "Message" => "Amount is empty",
        "Response" => "",
        "StatusText" => "506",
        "Type" => "Auto-checker",
        "Date" => "$ApiDate",
        );
        json_encode($API_response);
        print_r($API_response);
die();

}else{

    //AMOUNT  IS PRESENT AND THE REQUEST IS GOOD TO GO//
//DEBIT CARD OWNER IF THEIR BALANCE IS SUFFCIENT//
    require_once "debit-user.php";

    //CREDIT API KEY OWNER 
    require_once "credit-user.php";

    json_encode($API_response);
    print_r($API_response);
die();


}

}else{
//AMOUTN IS EMPTY//

$API_response = array(
    "Status" => "200",
    "Message" => "No Amount",
    "Response" => "",
    "StatusText" => "500",
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