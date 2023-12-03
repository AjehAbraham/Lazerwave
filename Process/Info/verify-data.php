<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    //print_r($_POST);

    if(isset($_POST["Tel"]) && !empty($_POST["Tel"])){

$tel = (int) filter_var($_POST["Tel"],FILTER_SANITIZE_NUMBER_INT);

if(strlen($tel) <= 9){


    die("Invalid phone number");

}elseif (strlen($tel) >= 12){


    die("Phone number too long or is not valid");

}else{


    $tel = htmlspecialchars($tel);

}



    }else{

        die("Please enter Phone number");

    }


            
            if(isset($_POST["Provider"]) && !empty($_POST["Provider"])){

                $provider = htmlspecialchars($_POST["Provider"]);
            
if($provider != "MTN" && $provider != "9MOBILE"  && 
$provider != "AIRTEL" &&  $provider != "GLO"){

die("Please select a valid network provider. Provider ".$provider. " not valid.");

}else{

$provider = htmlspecialchars($provider);

}

            }else{

                die("Please select a network Provider");

            }



            if(isset($_POST["plan"]) && !empty($_POST["plan"])){

                $plan = (int) filter_var($_POST["plan"],FILTER_SANITIZE_NUMBER_INT);
              
                    }else{

                        die("Please select a Data plan");

                    }

                    require_once "db_connection.php";
                    $plan = mysqli_real_escape_string($conn,$_POST["plan"]);
                    $plan = htmlspecialchars($plan);

                    $select = "SELECT * FROM Data_plan WHERE Hash='$plan'";

                    $Result = mysqli_query($conn,$select);

                    if(mysqli_num_rows($Result) > 0){

$dataPlan = mysqli_fetch_assoc($Result);

$plan = "₦". number_format($dataPlan["Amount"]). ".00";

                    }else{


                        die("Invalid Plan");

                    }
        



            if($provider === "MTN"){

                $logo = "Images/Mtn-logo.png";
            }elseif ($provider === "AIRTEL") {

                $logo = "Images/Airtel-logo.png";
            }else{

                if($provider === "GLO"){


                    $logo = "Images/Glo-logo.jpg";
                }elseif($provider === "9MOBILE"){

                    $logo = "Images/9Mobile-logo.png";
                }else{

                    $logo ="";
                }
            }

            $type = $_POST["plan"];

            echo "
            
<div class='container-container-fluid'>
<div class='box-container-fluid'>
<b><i class='fa fa-close' onclick='close_container()'></i></b>
<p>Amount: <b>$plan</b></p>
<p>Tel: <b>$tel</b></p>
<p> Type: <b>Data Purchase $dataPlan[Plan]</b></p>

<p>Provider: <b><img src='$logo' width='50px;'></b></p>

<br>
<p onclick='Open_pin_box()'>Procceed</p>
<br>
</div>
</div>
            ";


}else{

    header("Location: Warning");
    exit;
}