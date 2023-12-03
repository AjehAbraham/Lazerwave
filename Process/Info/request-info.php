<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

   // print_r($_POST);
if(isset($_POST["request"]) && !empty($_POST["request"])){

    $request = htmlspecialchars($_POST["request"]);

}else{

    die("Invalid request");

}


if(isset($_POST["amount"]) && !empty($_POST['amount'])){

$amount = (int) filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT);

$amount =number_format($amount). "";

}else{

    die("Please enter amount");
}

$info = "SELECT * FROM Register_db WHERE Account_no='$request'";


$results = mysqli_query($conn,$info);

if(mysqli_num_rows($results) > 0){


$data = mysqli_fetch_assoc($results);


//FETCH USERNAME //
/*
$select ="SELECT * FROM Register_db WHERE id='$data[User_id]'";

$detailsResult = mysqli_query($conn,$select);

$UserInfo = mysqli_fetch_assoc($detailsResult);
*/
$fullName = $data["Surname"]." ".$data["Last_name"] . " ".$data["First_name"];

echo "
      
<div class='container-container-fluid'>
<div class='box-container-fluid'>
<b><i class='fa fa-close' onclick='close_container()'></i></b>
<p>Amount: <b>₦$amount</b></p>
<p>Receiver : <b>$fullName</b></p>
<p> Type: <b>Money Request</b></p>

<p>Account Number: <b>$request</b></p>

<br>
<input type='submit' value='Proceed' onclick='submitForm()'>
<br>
</div>
</div>
";

}else{


    //die("Invalid request");


    $info = "SELECT * FROM Username WHERE Username='$request'";


    $results = mysqli_query($conn,$info);
    
    if(mysqli_num_rows($results) > 0){
    
    
    $data = mysqli_fetch_assoc($results);
    
    

$select ="SELECT * FROM Register_db WHERE id='$data[User_id]'";

$detailsResult = mysqli_query($conn,$select);

$UserInfo = mysqli_fetch_assoc($detailsResult);

$fullName = $UserInfo["Surname"]." ".$UserInfo["Last_name"] . " ".$UserInfo["First_name"];

echo "
      
<div class='container-container-fluid'>
<div class='box-container-fluid'>
<b><i class='fa fa-close' onclick='close_container()'></i></b>
<p>Amount: <b>₦$amount</b></p>
<p>Receiver : <b>$fullName</b></p>
<p> Type: <b>Money Request</b></p>

<p>Username: <b>$request</b></p>

<br>
<input type='submit' value='Proceed' onclick='submitForm()'>
<br>
</div>
</div>
";
    
    
    }else{
    
    
        die("Invalid request");
    
    }



}


}