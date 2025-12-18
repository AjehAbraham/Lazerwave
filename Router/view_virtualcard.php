<?php
require_once "sessionPage.php"; 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){


if(!isset($_POST["rayID"])){

    die();

}

if ($_POST["rayID"] == Null){
//THRWO ERROR BECAUSE IT AN INVALID LINK//

die();

}else{

//LINK IS VALID//
$card_no = $_POST["rayID"];

$card_no = htmlspecialchars($card_no);


//STILL CHECK AGAIN TO AVOID ERROR

if (empty($card_no)){

    die();


}
//NOW SEARCH FOR CARD NO AND FETCH RESULT//

$card = "SELECT * FROM User_card WHERE User_id ='$_SESSION[New_user]' AND Hash_key='$card_no'";

//$card_result = $conn -> query($card);
$card_result = mysqli_query($conn,$card);

if (mysqli_num_rows($card_result) > 0){

//NOW RESULT WAS FOUND//

$card_details = mysqli_fetch_assoc($card_result);




$_SESSION["Card_hash_key"] = $card_details["Hash_key"];

}else{
 
    die();

}


}

    }

    ?>
    <style>
       .container-fluid-overlay {
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgb(255,255,255,0.9);
    transition: 0.2s;
    z-index: 1;    
    overflow-y: scroll;
        }
        .container-fluid-overlay #closeCardbtn{
            text-align: center;
            font-size: 22px;
            margin: auto;
            display: block;
            cursor: pointer;
        }
    </style>

<div class="container-fluid-overlay">

    <p><i class="fa fa-close" id="closeCardbtn"></i></p>

<div class="front-debit-card-fliud">

<?php //require_once __DIR__.("/logo.php"); ?>

<p><i class="fa fa-flash" style="color: white;
font-size: 13px" style="float: right"></i><i class="fa fa-flash" 
style="color: red;float: right;font-size: 15px"></i></p>

<p class="card-no"> <?php echo 
$card_details["Card_no"]; ?></p>
<p class="name"><?php echo $card_details["Full_name"] ;?></p>
<p class="exp">Exp <?php echo $card_details["Exp_date"];?></p>
<i class="fa fa-barcode" style="color: gold;margin-left: 19px;font-size: 30px"></i>


<?php

if($card_details["Status_r"] == "UnBlock"){
    
echo '
<b style="float: right">Active <i class="fa fa-circle" style="color:mediumseagreen"></i></b>
';
}else{
    
    echo '
    <b style="float: right">InActive <i class="fa fa-circle" style="color:red;"></i></b>
    ';
    
    
}
?>


<p><i class="fa fa-flash"style="font-size: 18px;color: white;float: right"></i><i class="fa fa-flash" style="color: red;font-size: 18px" style="float: right"></i></p>
</div>


<div class="back-card-container">
    <p><i class="fa fa-flash" style="color: red;font-size: 13px" ></i><i class="fa fa-flash"
     style="color: white;float: right;font-size: 15px"></i></p>
    
<div class="black-spot"><?php echo $card_details["Ccv"];?></div>



<p style="font-size: 9px;">Please do not share your card details with anyone,always ensure to keep it safe.Report any suspicious activity</p>

<i class="fa fa-qrcode" style="margin-left: 19px;font-size: 30px"></i>

<!--p>please report any suspicous or unauthorise use of your card</p>
<p>ajehabraham51@gmail.com</p>
<p>call: 09074220984</p-->
<p><i class="fa fa-flash" style="color: white;font-size: 18px" style="float: right"></i><i class="fa fa-flash" style="color: red;float: right;font-size: 18px"></i></p>




</div>

<div class="Block-card-container">

    <form  id="formId">   
    <?php   
    
       if($card_details["Status_r"] == "UnBlock"){
       
    echo "
        
        
        <p><b>Block card</b><br>Why do you want to Block this card?<br>
        <select name='reason'>
            
            <option></option>
            <option>Lost</option>
            <option>Stolen</option>
            <!--option>Disabled</option-->
        </select></p>
    
    <p class='submitForm' onclick='Open_pin_box()'>De-Activate card</p>

    <input type='hidden' value='$card_details[id]' name='card_no'>
    ";
        
     require_once "Transaction-pin-box.php";
    
       }else{
        echo " <input type='hidden' value='stolen' name='reason'>
            
    <input type='hidden' value='$card_details[id]' name='card_no'>

<lable><b>Transaction pin</b></lable>

<br><input type='number' inputmode='numeric' name='Transaction-pin' style='-webkit-text-security:disc;'>
           
        <p class='submitForm' onclick='submit_form(event)'><button>Activate Card</button></p></form>";  
           
           
       }
       ?>
       
       </div>
       <br>
       <br>
    
    <b class="error_message" style='color: red;'></b>
    <br>
    <br>
    
</div>

    </div>
<script src="Src/Js/viewvirtualcard.js"></script>