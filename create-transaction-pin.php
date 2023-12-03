<?php
if(isset($_SESSION["New_user"])){


//CHECK IF USER HAS TRANSACTION PIN//

$selects = "SELECT * FROM User_pin WHERE User_id='$_SESSION[New_user]'";

$PinResult = mysqli_query($conn,$selects);

if(mysqli_num_rows($PinResult) > 0){



    
}else{



    //USER HAS NOT CREATED TRANSACTION PIN YET///

require_once "create-pin-box.php";


}


}else{


    die("Please Login");
}

