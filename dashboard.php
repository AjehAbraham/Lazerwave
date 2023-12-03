<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

    ///  header('HTTP/1.0 403 Forbiddden',TRUE,403);
    //  die("<h3> 403 Access denied!The file you request for does not exist.</h3>");

}


?>



  <div class="dashboard-container">

<img src="<?php echo $dp; ?>"width="120px"> 

<p><i class="fa fa-bell" id="open-notify-btn" onclick="FetchNotification()"> </i></p>
        
<br><br><br><br>
    <p>Hi <?php echo $Usernames . ",". "<br>". $greet; ?>.</p>


  
</div>

<form id="DataDoger"><input type='hidden' name='doger'></form>
<p class="notify_error_message"></p>


</div>



        <div class="dashboard-menu-container">    

            <p>Total balance 
           <b class="close-btn"> <i class='fa fa-eye'  id='balStatus'></i></b></p>
            
<p class="Account-balance-p" ></p>


 <p>   Cashback <b>
         ₦0.00
    </b></p>
               

<h5><a href="Transaction-history">Transaction history</a></h5>

<br><br><br>

</div>



<input type='hidden' value="
<?php 
 echo '₦' .number_format ($user['Account_balance']). '.00' ?>
" id="UserId">

<script>

  //const test = localStorage.clear();

  
function AutoChecker(){


Bal = document.querySelector("#UserId").value;


var Mode = localStorage.getItem("BalStatus");


if(Mode === "Hide"){


document.querySelector(".Account-balance-p").innerHTML = 
"<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";



}else{


document.querySelector(".Account-balance-p").innerHTML = Bal;



}

}
//window.onload = AutoChecker();

window.addEventListener("load",AutoChecker)


document.querySelector("#balStatus").addEventListener("click",Bal_status);
function Bal_status(){


Bal = document.querySelector("#UserId").value;


var Mode = localStorage.getItem("BalStatus");



if(Mode == "Hide"){

  
  localStorage.removeItem("BalStatus");

  localStorage.setItem("BalStatus","Show");

}else{

  localStorage.removeItem("BalStatus");
  
  localStorage.setItem("BalStatus","Hide");


}



if(Mode == "Hide"){



  document.querySelector(".Account-balance-p").innerHTML = 
  "<i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><i class='fa fa-asterisk'></i><br>";
  
  

}else{



  document.querySelector(".Account-balance-p").innerHTML = Bal;
  

}


}

document.querySelector(".open-notify-btn").addEventListener("click",FetchNotification);
function FetchNotification(){

//event.preventDefault();

document.querySelector(".loader-overlay-refresh").style.display ="block";

var form = $("#DataDoger");
var url = "Notification";

$.ajax ({
type: "POST",
url: url,
data: form.serialize(),
dataType:'json',
encode: true,
success: function(data){
//form has beeen submitted//

},
error: function(data){
document.querySelector(".loader-overlay-refresh").style.display ="none";



document.querySelector(".notify_error_message").innerHTML  = data.responseText;   
}
});

}

document.querySelector("#close-notification-btn").addEventListener("click",closeNotification);

function closeNotification(){

document.querySelector(".Notifications").style.width="0%";

}

  </script>




<div class="options-container">
<div class="Send-cash">
<a href="saved-beneficiary">
<i class="fa fa-send"></i>
Transfer</a>
</div>

<div class="Top-up">
<a href="receive-money">
<i class="fa fa-plus"></i>
Top Up
</a>
</div>

</div>





        <p class="quick">Quick actions</p>

<div class="flex">
   
<div class="quick-actions-container">
<a href="airtime-purchase"><p>Airtime</p>
<i class="fa fa-phone-square"></i></a>
</div>
<div class="quick-actions-container">
  <a href="data-purchase">
<p>Data</p>
<i class="fa fa-rss"></i></a>

</div>
<div class="quick-actions-container">
        <p><a href="coming-soon_page">Electricity</a>
      </p>
<i class="fa fa-flash"></i>
</div>
<div class="quick-actions-container">
<p><a href="coming-soon_page">Tv</a></p>
<i class="fa fa-television"></i>
</div>


</div>


<div class="flex">
        <div class="quick-actions-container">
        <p><a href="coming-soon_page">Internet</a></p>
        <i class="fa fa-wifi"></i>
        </div>
        <div class="quick-actions-container">
        <p><a href="https://fast9shop.000webhostapp.com" target="blank">Shop</a></p>
        <i class="fa  fa-cart-plus"></i>
        </div>
        <div class="quick-actions-container">
        <p><a href="coming-soon_page">Betting</a></p>
        <i class="fa fa-soccer-ball-o"></i>
        </div>
        <div class="quick-actions-container">
                <p><a href="coming-soon_page">Fees</a></p>
                <i class="fa fa-university"></i>
        
        </div>
        
        </div>
     
        <?php 
        require_once "Loader-refresh.php";

require_once __DIR__.("/Network.php");

//require_once "Notification.php";
require_once "Non-script.php";

        ?>
<!--script src="Src/Js/dashboarD.js"></script-->

        