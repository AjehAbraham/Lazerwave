<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);

    if(isset($_POST["cookie"]) && $_POST["cookie"] == "Accept"){

//SET ALL THE COOKIES YOU NEED//

$uniqueID = rand(91834,193854). uniqid(). rand(8129745,19283745);

$sessionID = uniqid(). rand(8273,10295). uniqid().rand(87,120);

$status = "runing";

setcookie("uniqueID",$uniqueID, time() + 86400 * 7,"/");


setcookie("SessionID",$sessionID, time() + 86400 * 7,"/");

setcookie("status",$status, time() + 86400 * 7,"/");

echo "success";

    }else{



        //FORM HAS BEEN MANIPULATED//

    }


}else{


    //header("Location: Warning");
    //exit;
}