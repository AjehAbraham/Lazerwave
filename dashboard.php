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


<div class="options-container">
<div class="Send-cash">
<a href="sendmoney">
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

require_once "Non-script.php";

        ?>

        