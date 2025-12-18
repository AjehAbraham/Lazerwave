<?php 
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["username"]) && !empty($_POST["username"])){


        $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH );


    }else{


        die("Username cannot be empty");
    }


    if (!preg_match("/^[a-zA-Z-']*$/",$username)){


        die("Only letters are allowed");

    }


    require_once "db_connection.php";

    $username = mysqli_real_escape_string($conn,$username);
    $username = stripslashes($username);
    $username = trim($username);

    $username = "@". $username;
    //CEHCK IF USERNAME EXIT//

    $check = "SELECT * FROM Username WHERE Username='$username'";

    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0){

//USER ALREADY EXIT;

die("Username already exit,suggestion " .$username. rand(1285,23491));


    }else{
//CHECK IF USER HAS ALREADY CREATED USERNAME//

$verify = "SELECT * FROM Username WHERE User_id='$_SESSION[New_user]'";

$verfiyResult = mysqli_query($conn,$verify);

if(mysqli_num_rows($verfiyResult) > 0){


    //USER HAS ALREADY CREATED A USERNAME
    die("You have already created a username");

}else{


    //DO NOTHING AS USER HAS NOT CREATED THEIR USERNAME//
    
}


//INSERT DATA TO USERNAME TABLE//

$ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$date = htmlspecialchars(date("Y/m/d H:i:s"));
$time = htmlspecialchars(date("H:i:s"));
$username = $username;

$insert = "INSERT INTO Username (User_id,Username,Date,Time,ip_addr)

VALUES('$_SESSION[New_user]','$username','$date','$time','$ip')

";

if(mysqli_query($conn,$insert)){


    die("success");
}else{



    die("Failed,please try again");
}



    }

mysqli_close($conn);

}else{


    header("Location: Warning");
    exit;
}