<?php
require_once "sessionPage.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["Provider"]) && !empty($_POST["Provider"])){

$provider = htmlspecialchars($_POST["Provider"]);



$nework = "SELECT * FROM Data_plan WHERE Network_provider='$provider' ORDER BY Amount ASC";

$results = mysqli_query($conn,$nework);

if(mysqli_num_rows($results) > 0){

echo "
<label><b>Plan:</b></label>
<br>
<select name='plan'>
<option></option>
";
    while($resultss = mysqli_fetch_assoc($results)){



        
echo "

<option value='$resultss[Hash]'>$resultss[Plan]</option>
       
";

    }

echo "</select>
<br>
<br>
<p class='verify-data' onclick='SubmitData()'>Validate</p>";

die();

}else{



    die("No plan Available for ". $provider);

}


if($provider == "MTN"){



}else if($provider == "AIRTEL"){

die("Airtel Not Avaliable");



}else{


if($provider == "GLO"){

die("Glo Not Avaliable");

}else if($provider == "9MOBILE"){


    die("9Mobile Not Avaliable");

}else{


die("Please select a valid Network Provider");


}


}




}else{

    die("Please select a Network Provider.");


}


}else{


    header("Location: warning");
    exit;
}