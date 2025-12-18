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



    if(isset($_POST["Amount"]) && !empty($_POST["Amount"])){

        $amount = (int) filter_var($_POST["Amount"],FILTER_SANITIZE_NUMBER_INT);
        
        if($amount <= 49){
        
        
            die("Amount cannot be less than ₦50");
            
        }elseif ($amount >= 10000){
        
        
            die("Airtime Purchase cannot be more than ₦10,000 per Transaction");
        
        }else{
        
        
            $amount = htmlspecialchars($amount);
        
        }
        
        
        
            }else{
        
                die("Please enter amount");
        
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



            $amount = "₦". number_format($amount). ".00";


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

            echo "
            
<div class='container-container-fluid'>
<div class='box-container-fluid'>
<b><i class='fa fa-close' onclick='close_container()'></i></b>
<p>Amount: <b>$amount</b></p>
<p>Tel: <b>$tel</b></p>
<p> Type: <b>Airtime Purchase</b></p>

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