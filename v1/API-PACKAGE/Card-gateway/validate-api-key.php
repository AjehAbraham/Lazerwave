<?php
require_once "db_connection.php";
//THIS FILE CONTAIN CODE(S) TO VALIDATE/FECH USER CARD DETAILS//

$ApiDate = htmlspecialchars(date("Y/m/d H:i:s"));
$ApiDate = date("d D F Y",strtotime($ApiDate));
$ApiDate = $ApiDate ." ". date("H:i:sa");

if($_SERVER['REQUEST_METHOD'] == "GET"){

//CHECK IF CARD DETAILS IS PRESENT IN REQUEST//

//CHECK FOR USER API KEY AND VALIDATE IF THE KEY IS CORRECT


if(isset($_GET["api-token"]) && !empty($_GET["api-token"])){

//NOW CHECK IF API KEY IS VALID//

$APIkey = htmlspecialchars($_GET["api-token"]);

$select = "SELECT * FROM API_keys WHERE API_key='$APIkey'";


$KeyResult = mysqli_query($conn,$select);

if(mysqli_num_rows($KeyResult) > 0){


    $ReponseResult = mysqli_fetch_assoc($KeyResult);

    if($ReponseResult["Status"] !="ok" or $ReponseResult["Status"] !="granted"){


        //MEANINS HTE API KEY MIGHT HAVE EXPIRED OR IS NO LONGER VALID FOR SOME REASONS//
    }else{


        //USER IS GOOD TO GO!//


    }


    //FTECH API KEY DETAILS FROM REGISTER DATABASE//

    $ApiFetchInfo = "SELECT * FROM Register_db WHERE id='$ReponseResult[User_id]'";


    $keyOwnerResult = mysqli_query($conn,$ApiFetchInfo);

    $keyOwner = mysqli_fetch_assoc($keyOwnerResult);


    //DEBIT USER OF 1 NAIRA FOR EACH REQUEST(THIS WILL BE AVALIABLE IN NEXT VERSION);

}else{

//API KEY IS NOT VALID//

$API_response = array(
    "Status" => "200",
    "Message" => "Invalid API key",
    "Response" => "",
    "StatusText" => "400",
    "Type" => "Auto-checker",
    "Date" => "$ApiDate",
    );

    json_encode($API_response);
    print_r($API_response);
die();


}


}else{

//USER DOES NOT HAVE API KEY OR API KEY IS NOT PRESENT IN REQUEST//

//PRINT OUT MESSAGE USING ARRAY WITH DEIFNED REPONSE TEXTA//

$ApiDate = htmlspecialchars(date("d/m/y H:i:s:a"));
$ApiDate = date("d D F Y",strtotime($ApiDate));

$API_response = array(
"Status" => "200",
"Message" => "No API key",
"Response" => "",
"StatusText" => "506",
"Type" => "Auto-checker",
"Date" => "$ApiDate",
);

json_encode($API_response);
print_r($API_response);
die();


}

}