<?php
require_once "sessionPage.php";



if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["request"]) && !empty($_POST["request"])){

        $username = htmlspecialchars($_POST["request"]);


        //CHECK DATABASE//
        require_once "db_connection.php";

        $username = mysqli_real_escape_string($conn,$username);
        $username = stripslashes($username);
        $username = trim($username);

        //$username = "@". $username;
      
        $select  = "SELECT * FROM Username WHERE Username='$username'";

        $result = mysqli_query($conn,$select);

        if(mysqli_num_rows($result) > 0){

//USERNAME WAS FOUND IN DATABAS

$results = mysqli_fetch_assoc($result);

if($results["User_id"] == $_SESSION["New_user"]){


    die("Username <b>".$username. " </b>is your Username");

}else{

    //NOW CHECK REGISTER DB TO FETCH USER FULL NAME//

    $fetch = "SELECT * FROM Register_db WHERE id='$results[User_id]'";

    $User = mysqli_query($conn,$fetch);

    $UserDetails = mysqli_fetch_assoc($User);


die("<b style='color: white; border-radius: 2rem;padding: 7px 7px;
background-color: rgb(0,0,56);text-align: center; font-size: 13px;'>" . $UserDetails["Surname"] 
." ". $UserDetails["Last_name"]. " ". $UserDetails["First_name"] ."</b><br>
");


}



        }else{

//CHECK REGISTER DB JUST INCASE USER IS USING ACCOUNT NUMBER//

$select  = "SELECT * FROM Register_db WHERE Account_no='$username'";

$result = mysqli_query($conn,$select);

if(mysqli_num_rows($result) > 0){

//USERNAME WAS FOUND IN DATABAS

$results = mysqli_fetch_assoc($result);



if($results["id"] == $_SESSION["New_user"]){


    die("Account Number <b>".$username. " </b>is your Account Number");
}

die("<i style='color: white;padding: 7px 7px;
background-color: rgb(0,0,56);border-radius: 2rem; font-size: 13px; text-align: center;'>" . $results["Surname"] 
." ". $results["Last_name"]. " ". $results["First_name"] ."</i><br><br>
");



}else{



    die("Invalid Username or Account number");


}


        }


    }else{


        die("Please enter a Username or account number");


    }


}else{

    header("Location: Warning");
    exit;
}