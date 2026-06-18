<?php
require_once "sessionPage.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
      //die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
      
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

  
    
if(isset($_POST["Acct_no"]) && !empty($_POST["Acct_no"])){

   
//$acct_no = (int) filter_var($_POST["Acct_no"],FILTER_VALIDATE_INT);

$acct_no = htmlspecialchars($_POST["Acct_no"]);

/*if(strlen($acct_no) <= 8){

die("Account Number too short");

}else if (strlen($acct_no) >= 11){


    die("Account Number too long");
}else{
//CHECK IF ACCOUNT NUMBER IS CURRENT LOGIN-IN USER OWN
*/
if($acct_no == $user["Account_no"]){

    die("Account number ".$acct_no." Is your account number.");

    
}

}else{

    die("Please enter username or account number");


}

//CHECK ACCOUNT NUMBER//
require_once "db_connection.php";

$acct_no = stripslashes($acct_no);
$acct_no = mysqli_real_escape_string($conn,$acct_no);

$fetch_details = "SELECT * FROM Register_db WHERE Account_no ='$acct_no'";

$acct_result = mysqli_query($conn,$fetch_details);

if(mysqli_num_rows($acct_result) > 0){

    $account_details = mysqli_fetch_assoc($acct_result);

    if($account_details["id"] == $acct_no){


        die("Account number <b>".$acct_no. "</b> is your account number");

    }

    $full_name = $account_details["Surname"]. " ". $account_details["Last_name"]." ". $account_details["First_name"];
   
echo "<b style='padding: 10px 10px;background-color: rgba(0,0,52);
color: white;border-radius: 2rem;width: 95%'>" .$full_name ."</b><br>";

echo "
<br>
<label style='color: #666;'><b>Amount:</b></label>
<br>

<input type='number' name='amount' placeholder='Enter amount...' 
inputmode='numeric' oninput='Verify_amount()' autocomplete='off'>

<p class='amount_error_message' style='color: red;'></p>


";
             
die();
    
    
}else{


    //CHECK IF IT'S IS USERNAME//

    require_once "db_connection.php";

    $checkUsername = "SELECT * FROM Username WHERE Username='$acct_no'";


    $usernameResult = mysqli_query($conn,$checkUsername);

    if(mysqli_num_rows($usernameResult) > 0){
        
        $username = mysqli_fetch_assoc($usernameResult);

        if($username["User_id"] == $_SESSION["New_user"]){


            die("Username <b>".$acct_no. " </b>is your Username");
        }

$fetch_details = "SELECT * FROM Register_db WHERE id ='$username[User_id]'";

$acct_result = mysqli_query($conn,$fetch_details);

        $account_details = mysqli_fetch_assoc($acct_result);

        $full_name = $account_details["Surname"]. " ". $account_details["Last_name"]." ". $account_details["First_name"];
       
    echo "<b style='padding: 10px 10px;background-color: rgba(0,0,52);
    color: white;border-radius: 2rem;width: 95%'>" .$full_name ."</b><br>";
    
    echo "
    <br>
    <label style='color: #666;'><b>Amount:</b></label>
    <br>
    
    <input type='number' name='amount' placeholder='Enter amount...' 
    inputmode='numeric' oninput='Verify_amount()' autocomplete='off'>
    
    <p class='amount_error_message' style='color: red;'></p>
    
    
    ";
                 
    die();


    }else{



    

die("Invalid Username or Account Number");

    }

}




mysqli_close($conn);

}else{


    header("Locaton: Warning");
    exit;
}
?>