<?php

session_start();


if(isset($_SESSION["New_user"])){

    require_once __DIR__.("/db_connection.php");

    $SQL = "SELECT * FROM Register_db WHERE id = '$_SESSION[New_user]' ";

 $result = $conn -> query($SQL);


 $user = $result -> fetch_assoc();



}
// delect cookie just incase of maintance

/*
setcookie("userId","",time()- 8640 * 7);

setcookie("check_confirm_real","",time() - 8640 * 70);
*/



if(!isset($_SESSION["New_user"])){


if (isset($_COOKIE["userId"])){ 

    //echo $_COOKIE['userId'] ."<br>";

    //cho "Cookie already exist";
if (isset($_COOKIE["check_confirm_real"])){

    //echo $_COOKIE['check_confirm_real'];

   // echo "Cookie already exist";

   header("Location:Authentication.php");
   exit;

}
}
}



require_once __DIR__.("/header.php");


?>



<?php require_once __DIR__.("/homePage.php") ?>

<head>
<title>Home</title>
</head>








<?php require_once __DIR__.("/footer.php"); ?>