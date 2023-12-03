<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["username"]) && !empty($_POST["username"])){

    
        $username = htmlspecialchars($_POST["username"]);

        if(strlen($username) <= 1){

            die("Username must be at least two in lenght");
        }else if (!preg_match("/^[a-zA-Z-']*$/",$username)){


            die("only Letters are allowed");
        }else{

            $username = "@".$username;

            require_once "db_connection.php";

            $select = "SELECT * FROM Username WHERE Username='$username'";

            $result = mysqli_query($conn,$select);

            if(mysqli_num_rows($result) > 0){


                die("Username ".$username. " Already taken");


            }else{


                die("<i style='padding: 7px 7px;color: white;background-color: rgb(0,0,56);
                text-align: center;border-radius: 2rem;font-size: 13px;'> ". $username. "</i>");

}


        }


    }else{

        die("Please enter your prefred Username");
    }

mysqli_close($conn);


}else{


    header("Location: Warning");
    exit;
}