<?php
require_once "sessionPage.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

     // header('HTTP/1.0 403 Forbiddden',TRUE,403);
     // die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
      
}else if($_SERVER["REQUEST_METHOD"] == "POST"){


if(!isset($_POST["duration"]) && !isset($_POST["type"])){


    die("Please select an option");

}elseif (empty($_POST["duration"]) && empty($_POST["type"])){


    die("Please choose Duration or Transaction Type. Invalid option(s) ". $_POST["duration"] . " ". $_POST["type"]);
}else{

$duration = filter_var($_POST["duration"],FILTER_SANITIZE_STRING);

$type = filter_var($_POST["type"],FILTER_SANITIZE_STRING);

}

$duration = stripslashes($duration);
$type = stripcslashes($type);

$duration = htmlspecialchars($duration);
$type = htmlspecialchars($type);

//die($type.$duration);

require_once "db_connection.php";

$duration = mysqli_real_escape_string($conn,$duration);
$type = mysqli_real_escape_string ($conn,$type);

//SELECT TRANSACTION FOR THIS MONTH//
//die($duration.$type);

if($duration == "All Time" && $type == "All"){
   

//SELECT ALL TRANSACTION HISTORY FOR THIS MONTH FROM ALL CATEGORY(sUCCESSFUL,FAILED AND PENDING)

require_once "db_connection.php";

$not_data = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]' ORDER BY Date_id DESC";


$transation_hist = mysqli_query($conn,$not_data);

  if(mysqli_num_rows($transation_hist) > 0){

while($not_result = mysqli_fetch_assoc($transation_hist)){


if($not_result["Remark"] == "+ Credit"){

$remark = "style='color:mediumseagreen;'";


}else if($not_result["Remark"] == "- Debit"){

$remark ="style='color:red'";


}else{

$remark = "style='color: grey'";



}


if($not_result["Status_remark"] == "Successful"){


//$gggg= "";
$remark_color ="style='float: left; color: mediumseagreen'";


}else{


$remark_color ="style='float: left
;color: red'";


}


if($not_result["Sender_account_no"] == "MTN"){
    
    $network_image = "Images/Mtn-logo.png";
    
}else if ($not_result["Sender_account_no"] == "AIRTEL"){
    
    
    $network_image = "Images/Airtel-logo.png";
}else{
    
    if($not_result["Sender_account_no"] == "GLO"){
        
        
        $network_image = "Images/Glo-logo.jpg";

    }else  if($not_result["Sender_account_no"] == "9MOBILE"){
            
            $network_image ="Images/9Mobile-logo.png";

        }else{
            
            $network_image ="";
        }
        
    
    
    
    
}



if($not_result["Time_id"] > 12){
    
    $time = " ". $not_result["Time_id"] ."PM";
    
    
}else{
    
    $time =" ".$not_result["Time_id"]. "AM";
}




$not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;




if ($not_result["Type"] == "Transfer"){
    
$not_amount = "₦". number_format($not_result["Amount"]) .".00";


echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p>$not_result[Type]<br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";


}else if ($not_result["Type"] == "Money Request"){
$not_amount = "₦". number_format($not_result["Amount"]) .".00";

echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>Money Request <i class='fa fa-money'></i></p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p>$not_result[Type]<br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";


}else{


if($not_result["Type"] == "Airtime purchase"){
    
$not_amount = "₦". number_format($not_result["Amount"]) .".00";


echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";


}else if
($not_result["Type"] == "Data purchase"){

 $not_amount = "₦". number_format($not_result["Amount"]) .".00";
 
echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";







}else{
    
    
if($not_result["Type"] == "Account Statement"){

$not_amount = "₦". number_format($not_result["Amount"]) .".00";

echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>ACCOUNT STATEMENT</p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p>$not_result[Type]<br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";










}else if
($not_result["Type"] == "Referal"){

$not_amount = "₦". number_format($not_result["Amount"]) .".00";

echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p>$not_result[Type]<br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";


}else{

    $not_amount = "₦". number_format($not_result["Amount"]) .".00";

echo "


<div class='notifications-container'>

<p>$not_date </p>

<p><i class='fa fa-circle'$remark></i> </p>
<p><!--i class='fa fa-bank'></i--></p>

<b $remark> <br>$not_result[Remark]<br>$not_amount </b>


<p>$not_result[Type]<br>$not_result[Type_name]</p>

<b $remark_color>$not_result[Status_remark]</b>

<p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>

<br>
<br>
</div>
";

}





}






}}



}else{


echo "<p>No $type Transaction  for ". $duration ."</p>";


}


                    
                    }elseif ($duration == "All Time" && $type == "Successful"){



                        
    require_once "db_connection.php";

    $query = "Successful";

    $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' 
    AND User_id='$_SESSION[New_user]' ORDER BY Date_id DESC";
 
    
    $transation_hist = mysqli_query($conn,$not_data);
    
      if(mysqli_num_rows($transation_hist) > 0){
    
    while($not_result = mysqli_fetch_assoc($transation_hist)){
    
    
    if($not_result["Remark"] == "+ Credit"){
    
    $remark = "style='color:mediumseagreen;'";
    
    
    }else if($not_result["Remark"] == "- Debit"){
    
    $remark ="style='color:red'";
    
    
    }else{
    
    $remark = "style='color: grey'";
    
    
    
    }
    
    
    if($not_result["Status_remark"] == "Successful"){
    
    
    //$gggg= "";
    $remark_color ="style='float: left; color: mediumseagreen'";
    
    
    }else{
    
    
    $remark_color ="style='float: left
    ;color: red'";
    
    
    }
    
    
    if($not_result["Sender_account_no"] == "MTN"){
        
        $network_image = "Images/Mtn-logo.png";
        
    }else if ($not_result["Sender_account_no"] == "AIRTEL"){
        
        
        $network_image = "Images/Airtel-logo.png";
    }else{
        
        if($not_result["Sender_account_no"] == "GLO"){
            
            
            $network_image = "Images/Glo-logo.jpg";

        }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                
                $network_image ="Images/9Mobile-logo.png";

            }else{
                
                $network_image ="";
            }
            
        
        
        
        
    }
    
    
    
    if($not_result["Time_id"] > 12){
        
        $time = " ". $not_result["Time_id"] ."PM";
        
        
    }else{
        
        $time =" ".$not_result["Time_id"]. "AM";
    }
    
    
    
    
    $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
    
    
    
    
    if ($not_result["Type"] == "Transfer"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if ($not_result["Type"] == "Money Request"){
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Money Request <i class='fa fa-money'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
  
    
    if($not_result["Type"] == "Airtime purchase"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if
    ($not_result["Type"] == "Data purchase"){
    
     $not_amount = "₦". number_format($not_result["Amount"]) .".00";
     
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    }else{
        
        
    if($not_result["Type"] == "Account Statement"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>ACCOUNT STATEMENT</p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    
    
    
    }else if
    ($not_result["Type"] == "Referal"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
    
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p><!--i class='fa fa-bank'></i--></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    }
    
    
    
    
    
    }
    
    
    
    
    
    
    }}
    
    
    
    }else{
    
    
    echo "<p>No  $type Transaction for ". $duration."</p>";
    
    
    }
    





                    }else{



                        if($duration == "All Time" && $type == "Failed"){

                            require_once "db_connection.php";
                            $query = "Failed";

                            $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' AND User_id='$_SESSION[New_user]'   ORDER BY Date_id DESC";
                         
                            
                            $transation_hist = mysqli_query($conn,$not_data);
                            
                              if(mysqli_num_rows($transation_hist) > 0){
                            
                            while($not_result = mysqli_fetch_assoc($transation_hist)){
                            
                            
                            if($not_result["Remark"] == "+ Credit"){
                            
                            $remark = "style='color:mediumseagreen;'";
                            
                            
                            }else if($not_result["Remark"] == "- Debit"){
                            
                            $remark ="style='color:red'";
                            
                            
                            }else{
                            
                            $remark = "style='color: grey'";
                            
                            
                            
                            }
                            
                            
                            if($not_result["Status_remark"] == "Successful"){
                            
                            
                            //$gggg= "";
                            $remark_color ="style='float: left; color: mediumseagreen'";
                            
                            
                            }else{
                            
                            
                            $remark_color ="style='float: left
                            ;color: red'";
                            
                            
                            }
                            
                            
                            if($not_result["Sender_account_no"] == "MTN"){
                                
                                $network_image = "Images/Mtn-logo.png";
                                
                            }else if ($not_result["Sender_account_no"] == "AIRTEL"){
                                
                                
                                $network_image = "Images/Airtel-logo.png";
                            }else{
                                
                                if($not_result["Sender_account_no"] == "GLO"){
                                    
                                    
                                    $network_image = "Images/Glo-logo.jpg";
                        
                                }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                                        
                                        $network_image ="Images/9Mobile-logo.png";
                        
                                    }else{
                                        
                                        $network_image ="";
                                    }
                                    
                                
                                
                                
                                
                            }
                            
                            
                            
                            if($not_result["Time_id"] > 12){
                                
                                $time = " ". $not_result["Time_id"] ."PM";
                                
                                
                            }else{
                                
                                $time =" ".$not_result["Time_id"]. "AM";
                            }
                            
                            
                            
                            
                            $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
                            
                            
                            
                            
                            if ($not_result["Type"] == "Transfer"){
                                
                            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p>$not_result[Type]<br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            }else if ($not_result["Type"] == "Money Request"){
                            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>Money Request <i class='fa fa-money'></i></p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p>$not_result[Type]<br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            }else{
                          
                            
                            if($not_result["Type"] == "Airtime purchase"){
                                
                            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            }else if
                            ($not_result["Type"] == "Data purchase"){
                            
                             $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                             
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            
                            
                            
                            
                            
                            }else{
                                
                                
                            if($not_result["Type"] == "Account Statement"){
                            
                            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>ACCOUNT STATEMENT</p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p>$not_result[Type]<br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            }else if
                            ($not_result["Type"] == "Referal"){
                            
                            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p>$not_result[Type]<br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            
                            }else{
                            
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                            
                            echo "
                            
                            
                            <div class='notifications-container'>
                            
                            <p>$not_date </p>
                            
                            <p><i class='fa fa-circle'$remark></i> </p>
                            <p><!--i class='fa fa-bank'></i--></p>
                            
                            <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                            
                            
                            <p>$not_result[Type]<br>$not_result[Type_name]</p>
                            
                            <b $remark_color>$not_result[Status_remark]</b>
                            
                            <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                            
                            <br>
                            <br>
                            </div>
                            ";
                            
                            }
                            
                            
                            
                            
                            
                            }
                            
                            
                            
                            
                            
                            
                            }}
                            
                            
                            
                            }else{
                            
                            
                            echo "<p>No  $type Transaction  for " . $duration."</p>";
                            
                            
                            }
                            
                        
                        
                        





                        }}/*else{





                            

                            
//die("coming soon,only <b>All time</b> options is available");
                        }





                    }*/
                    
    
if($duration == "This Week" && $type == "All"){
   

    //SELECT ALL TRANSACTION HISTORY FOR THIS MONTH FROM ALL CATEGORY(sUCCESSFUL,FAILED AND PENDING)
    
    require_once "db_connection.php";
    
    $not_data = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]' AND NOW() <= DATE_ADD(Date_id,INTERVAL 1 WEEK) ORDER BY Date_id DESC";
    
    
    $transation_hist = mysqli_query($conn,$not_data);
    
      if(mysqli_num_rows($transation_hist) > 0){
    
    while($not_result = mysqli_fetch_assoc($transation_hist)){
    
    
    if($not_result["Remark"] == "+ Credit"){
    
    $remark = "style='color:mediumseagreen;'";
    
    
    }else if($not_result["Remark"] == "- Debit"){
    
    $remark ="style='color:red'";
    
    
    }else{
    
    $remark = "style='color: grey'";
    
    
    
    }
    
    
    if($not_result["Status_remark"] == "Successful"){
    
    
    //$gggg= "";
    $remark_color ="style='float: left; color: mediumseagreen'";
    
    
    }else{
    
    
    $remark_color ="style='float: left
    ;color: red'";
    
    
    }
    
    
    if($not_result["Sender_account_no"] == "MTN"){
        
        $network_image = "Images/Mtn-logo.png";
        
    }else if ($not_result["Sender_account_no"] == "AIRTEL"){
        
        
        $network_image = "Images/Airtel-logo.png";
    }else{
        
        if($not_result["Sender_account_no"] == "GLO"){
            
            
            $network_image = "Images/Glo-logo.jpg";
    
        }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                
                $network_image ="Images/9Mobile-logo.png";
    
            }else{
                
                $network_image ="";
            }
            
        
        
        
        
    }
    
    
    
    if($not_result["Time_id"] > 12){
        
        $time = " ". $not_result["Time_id"] ."PM";
        
        
    }else{
        
        $time =" ".$not_result["Time_id"]. "AM";
    }
    
    
    
    
    $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
    
    
    
    
    if ($not_result["Type"] == "Transfer"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if ($not_result["Type"] == "Money Request"){
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Money Request <i class='fa fa-money'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
    
    
    if($not_result["Type"] == "Airtime purchase"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if
    ($not_result["Type"] == "Data purchase"){
    
     $not_amount = "₦". number_format($not_result["Amount"]) .".00";
     
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    }else{
        
        
    if($not_result["Type"] == "Account Statement"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>ACCOUNT STATEMENT</p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    
    
    
    }else if
    ($not_result["Type"] == "Referal"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
    
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p><!--i class='fa fa-bank'></i--></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    }
    
    
    
    
    
    }
    
    
    
    
    
    
    }}
    
    
    
    }else{
    
    
    echo "<p>No  $type Transaction  for " .$duration ."</p>";
    
    
    }
    
    
                        
                        }elseif ($duration == "This Week" && $type == "Successful"){
    
    
    
                            
        require_once "db_connection.php";
    
        $query = "Successful";
    
        $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' AND User_id='$_SESSION[New_user]' 
        AND NOW() <= DATE_ADD(Date_id, INTERVAL 1 WEEK) ORDER BY Date_id DESC";
     
        
        $transation_hist = mysqli_query($conn,$not_data);
        
          if(mysqli_num_rows($transation_hist) > 0){
        
        while($not_result = mysqli_fetch_assoc($transation_hist)){
        
        
        if($not_result["Remark"] == "+ Credit"){
        
        $remark = "style='color:mediumseagreen;'";
        
        
        }else if($not_result["Remark"] == "- Debit"){
        
        $remark ="style='color:red'";
        
        
        }else{
        
        $remark = "style='color: grey'";
        
        
        
        }
        
        
        if($not_result["Status_remark"] == "Successful"){
        
        
        //$gggg= "";
        $remark_color ="style='float: left; color: mediumseagreen'";
        
        
        }else{
        
        
        $remark_color ="style='float: left
        ;color: red'";
        
        
        }
        
        
        if($not_result["Sender_account_no"] == "MTN"){
            
            $network_image = "Images/Mtn-logo.png";
            
        }else if ($not_result["Sender_account_no"] == "AIRTEL"){
            
            
            $network_image = "Images/Airtel-logo.png";
        }else{
            
            if($not_result["Sender_account_no"] == "GLO"){
                
                
                $network_image = "Images/Glo-logo.jpg";
    
            }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                    
                    $network_image ="Images/9Mobile-logo.png";
    
                }else{
                    
                    $network_image ="";
                }
                
            
            
            
            
        }
        
        
        
        if($not_result["Time_id"] > 12){
            
            $time = " ". $not_result["Time_id"] ."PM";
            
            
        }else{
            
            $time =" ".$not_result["Time_id"]. "AM";
        }
        
        
        
        
        $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
        
        
        
        
        if ($not_result["Type"] == "Transfer"){
            
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else if ($not_result["Type"] == "Money Request"){
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Money Request <i class='fa fa-money'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else{
      
        
        if($not_result["Type"] == "Airtime purchase"){
            
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else if
        ($not_result["Type"] == "Data purchase"){
        
         $not_amount = "₦". number_format($not_result["Amount"]) .".00";
         
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        
        
        
        
        
        }else{
            
            
        if($not_result["Type"] == "Account Statement"){
        
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>ACCOUNT STATEMENT</p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        
        
        
        
        
        
        
        
        }else if
        ($not_result["Type"] == "Referal"){
        
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else{
        
            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p><!--i class='fa fa-bank'></i--></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        }
        
        
        
        
        
        }
        
        
        
        
        
        
        }}
        
        
        
        }else{
        
        
        echo "<p>No $type Transaction  for ". $duration."</p>";
        
        
        }
        
    
    
    
    
    
                        }else{
    
    
    
                            if($duration == "This Week" && $type == "Failed"){
    
                                require_once "db_connection.php";
                                $query = "Failed";
    
                                $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' AND User_id='$_SESSION[New_user]'  
                                AND NOW() <= DATE_ADD(Date_id, INTERVAL 1 WEEK) ORDER BY Date_id DESC";
                             
                                
                                $transation_hist = mysqli_query($conn,$not_data);
                                
                                  if(mysqli_num_rows($transation_hist) > 0){
                                
                                while($not_result = mysqli_fetch_assoc($transation_hist)){
                                
                                
                                if($not_result["Remark"] == "+ Credit"){
                                
                                $remark = "style='color:mediumseagreen;'";
                                
                                
                                }else if($not_result["Remark"] == "- Debit"){
                                
                                $remark ="style='color:red'";
                                
                                
                                }else{
                                
                                $remark = "style='color: grey'";
                                
                                
                                
                                }
                                
                                
                                if($not_result["Status_remark"] == "Successful"){
                                
                                
                                //$gggg= "";
                                $remark_color ="style='float: left; color: mediumseagreen'";
                                
                                
                                }else{
                                
                                
                                $remark_color ="style='float: left
                                ;color: red'";
                                
                                
                                }
                                
                                
                                if($not_result["Sender_account_no"] == "MTN"){
                                    
                                    $network_image = "Images/Mtn-logo.png";
                                    
                                }else if ($not_result["Sender_account_no"] == "AIRTEL"){
                                    
                                    
                                    $network_image = "Images/Airtel-logo.png";
                                }else{
                                    
                                    if($not_result["Sender_account_no"] == "GLO"){
                                        
                                        
                                        $network_image = "Images/Glo-logo.jpg";
                            
                                    }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                                            
                                            $network_image ="Images/9Mobile-logo.png";
                            
                                        }else{
                                            
                                            $network_image ="";
                                        }
                                        
                                    
                                    
                                    
                                    
                                }
                                
                                
                                
                                if($not_result["Time_id"] > 12){
                                    
                                    $time = " ". $not_result["Time_id"] ."PM";
                                    
                                    
                                }else{
                                    
                                    $time =" ".$not_result["Time_id"]. "AM";
                                }
                                
                                
                                
                                
                                $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
                                
                                
                                
                                
                                if ($not_result["Type"] == "Transfer"){
                                    
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else if ($not_result["Type"] == "Money Request"){
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Money Request <i class='fa fa-money'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else{
                              
                                
                                if($not_result["Type"] == "Airtime purchase"){
                                    
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else if
                                ($not_result["Type"] == "Data purchase"){
                                
                                 $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                 
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                
                                
                                
                                
                                
                                }else{
                                    
                                    
                                if($not_result["Type"] == "Account Statement"){
                                
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>ACCOUNT STATEMENT</p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                }else if
                                ($not_result["Type"] == "Referal"){
                                
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else{
                                
                                    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p><!--i class='fa fa-bank'></i--></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                }
                                
                                
                                
                                
                                
                                }
                                
                                
                                
                                
                                
                                
                                }}
                                
                                
                                
                                }else{
                                
                                
                                echo "<p>No $type Transaction History for " . $duration."</p>";
                                
                                
                                }
                                
                            
                            
                            
    
    
    
    
    
                            }else{
    
    
    
if($duration == "This Month" && $type == "All"){
   

    //SELECT ALL TRANSACTION HISTORY FOR THIS MONTH FROM ALL CATEGORY(sUCCESSFUL,FAILED AND PENDING)
    
    require_once "db_connection.php";
    
    $not_data = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]' AND NOW() <= DATE_ADD(Date_id, INTERVAL 1 MONTH) ORDER BY Date_id DESC";
    
    
    $transation_hist = mysqli_query($conn,$not_data);
    
      if(mysqli_num_rows($transation_hist) > 0){
    
    while($not_result = mysqli_fetch_assoc($transation_hist)){
    
    
    if($not_result["Remark"] == "+ Credit"){
    
    $remark = "style='color:mediumseagreen;'";
    
    
    }else if($not_result["Remark"] == "- Debit"){
    
    $remark ="style='color:red'";
    
    
    }else{
    
    $remark = "style='color: grey'";
    
    
    
    }
    
    
    if($not_result["Status_remark"] == "Successful"){
    
    
    //$gggg= "";
    $remark_color ="style='float: left; color: mediumseagreen'";
    
    
    }else{
    
    
    $remark_color ="style='float: left
    ;color: red'";
    
    
    }
    
    
    if($not_result["Sender_account_no"] == "MTN"){
        
        $network_image = "Images/Mtn-logo.png";
        
    }else if ($not_result["Sender_account_no"] == "AIRTEL"){
        
        
        $network_image = "Images/Airtel-logo.png";
    }else{
        
        if($not_result["Sender_account_no"] == "GLO"){
            
            
            $network_image = "Images/Glo-logo.jpg";
    
        }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                
                $network_image ="Images/9Mobile-logo.png";
    
            }else{
                
                $network_image ="";
            }
            
        
        
        
        
    }
    
    
    
    if($not_result["Time_id"] > 12){
        
        $time = " ". $not_result["Time_id"] ."PM";
        
        
    }else{
        
        $time =" ".$not_result["Time_id"]. "AM";
    }
    
    
    
    
    $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
    
    
    
    
    if ($not_result["Type"] == "Transfer"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if ($not_result["Type"] == "Money Request"){
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Money Request <i class='fa fa-money'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
    
    
    if($not_result["Type"] == "Airtime purchase"){
        
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else if
    ($not_result["Type"] == "Data purchase"){
    
     $not_amount = "₦". number_format($not_result["Amount"]) .".00";
     
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    }else{
        
        
    if($not_result["Type"] == "Account Statement"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>ACCOUNT STATEMENT</p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    
    
    
    
    
    
    
    
    }else if
    ($not_result["Type"] == "Referal"){
    
    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    
    }else{
    
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
    
    echo "
    
    
    <div class='notifications-container'>
    
    <p>$not_date </p>
    
    <p><i class='fa fa-circle'$remark></i> </p>
    <p><!--i class='fa fa-bank'></i--></p>
    
    <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
    
    
    <p>$not_result[Type]<br>$not_result[Type_name]</p>
    
    <b $remark_color>$not_result[Status_remark]</b>
    
    <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
    
    <br>
    <br>
    </div>
    ";
    
    }
    
    
    
    
    
    }
    
    
    
    
    
    
    }}
    
    
    
    }else{
    
    
    echo "<p>No $type Transaction History for ". $duration ."</p>";
    
    
    }
    
    
                        
                        }elseif ($duration == "This Month" && $type == "Successful"){
    
    
    
                            
        require_once "db_connection.php";
    
        $query = "Successful";
    
        $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' 
        AND User_id='$_SESSION[New_user]' AND NOW() <= DATE_ADD(Date_id, INTERVAL 1 MONTH) ORDER BY Date_id DESC";
     
        
        $transation_hist = mysqli_query($conn,$not_data);
        
          if(mysqli_num_rows($transation_hist) > 0){
        
        while($not_result = mysqli_fetch_assoc($transation_hist)){
        
        
        if($not_result["Remark"] == "+ Credit"){
        
        $remark = "style='color:mediumseagreen;'";
        
        
        }else if($not_result["Remark"] == "- Debit"){
        
        $remark ="style='color:red'";
        
        
        }else{
        
        $remark = "style='color: grey'";
        
        
        
        }
        
        
        if($not_result["Status_remark"] == "Successful"){
        
        
        //$gggg= "";
        $remark_color ="style='float: left; color: mediumseagreen'";
        
        
        }else{
        
        
        $remark_color ="style='float: left
        ;color: red'";
        
        
        }
        
        
        if($not_result["Sender_account_no"] == "MTN"){
            
            $network_image = "Images/Mtn-logo.png";
            
        }else if ($not_result["Sender_account_no"] == "AIRTEL"){
            
            
            $network_image = "Images/Airtel-logo.png";
        }else{
            
            if($not_result["Sender_account_no"] == "GLO"){
                
                
                $network_image = "Images/Glo-logo.jpg";
    
            }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                    
                    $network_image ="Images/9Mobile-logo.png";
    
                }else{
                    
                    $network_image ="";
                }
                
            
            
            
            
        }
        
        
        
        if($not_result["Time_id"] > 12){
            
            $time = " ". $not_result["Time_id"] ."PM";
            
            
        }else{
            
            $time =" ".$not_result["Time_id"]. "AM";
        }
        
        
        
        
        $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
        
        
        
        
        if ($not_result["Type"] == "Transfer"){
            
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else if ($not_result["Type"] == "Money Request"){
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Money Request <i class='fa fa-money'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else{
      
        
        if($not_result["Type"] == "Airtime purchase"){
            
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else if
        ($not_result["Type"] == "Data purchase"){
        
         $not_amount = "₦". number_format($not_result["Amount"]) .".00";
         
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        
        
        
        
        
        }else{
            
            
        if($not_result["Type"] == "Account Statement"){
        
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>ACCOUNT STATEMENT</p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        
        
        
        
        
        
        
        
        }else if
        ($not_result["Type"] == "Referal"){
        
        $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        
        }else{
        
            $not_amount = "₦". number_format($not_result["Amount"]) .".00";
        
        echo "
        
        
        <div class='notifications-container'>
        
        <p>$not_date </p>
        
        <p><i class='fa fa-circle'$remark></i> </p>
        <p><!--i class='fa fa-bank'></i--></p>
        
        <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
        
        
        <p>$not_result[Type]<br>$not_result[Type_name]</p>
        
        <b $remark_color>$not_result[Status_remark]</b>
        
        <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
        
        <br>
        <br>
        </div>
        ";
        
        }
        
        
        
        
        
        }
        
        
        
        
        
        
        }}
        
        
        
        }else{
        
        
        echo "<p>No $type Transaction History for ". $duration."</p>";
        
        
        }
        
    
    
    
    
    
                        }else{
    
    
    
                            if($duration == "This Month" && $type == "Failed"){
    
                                require_once "db_connection.php";
                                $query = "Failed";
    
                                $not_data = "SELECT * FROM Transaction_history WHERE Status_remark='$query' AND User_id='$_SESSION[New_user]'
                                 AND NOW() <= DATE_ADD(Date_id, INTERVAL 1 MONTH)  ORDER BY Date_id DESC";
                             
                                
                                $transation_hist = mysqli_query($conn,$not_data);
                                
                                  if(mysqli_num_rows($transation_hist) > 0){
                                
                                while($not_result = mysqli_fetch_assoc($transation_hist)){
                                
                                
                                if($not_result["Remark"] == "+ Credit"){
                                
                                $remark = "style='color:mediumseagreen;'";
                                
                                
                                }else if($not_result["Remark"] == "- Debit"){
                                
                                $remark ="style='color:red'";
                                
                                
                                }else{
                                
                                $remark = "style='color: grey'";
                                
                                
                                
                                }
                                
                                
                                if($not_result["Status_remark"] == "Successful"){
                                
                                
                                //$gggg= "";
                                $remark_color ="style='float: left; color: mediumseagreen'";
                                
                                
                                }else{
                                
                                
                                $remark_color ="style='float: left
                                ;color: red'";
                                
                                
                                }
                                
                                
                                if($not_result["Sender_account_no"] == "MTN"){
                                    
                                    $network_image = "Images/Mtn-logo.png";
                                    
                                }else if ($not_result["Sender_account_no"] == "AIRTEL"){
                                    
                                    
                                    $network_image = "Images/Airtel-logo.png";
                                }else{
                                    
                                    if($not_result["Sender_account_no"] == "GLO"){
                                        
                                        
                                        $network_image = "Images/Glo-logo.jpg";
                            
                                    }else  if($not_result["Sender_account_no"] == "9MOBILE"){
                                            
                                            $network_image ="Images/9Mobile-logo.png";
                            
                                        }else{
                                            
                                            $network_image ="";
                                        }
                                        
                                    
                                    
                                    
                                    
                                }
                                
                                
                                
                                if($not_result["Time_id"] > 12){
                                    
                                    $time = " ". $not_result["Time_id"] ."PM";
                                    
                                    
                                }else{
                                    
                                    $time =" ".$not_result["Time_id"]. "AM";
                                }
                                
                                
                                
                                
                                $not_date = date("D d F Y",strtotime($not_result["Date_id"])).$time;
                                
                                
                                
                                
                                if ($not_result["Type"] == "Transfer"){
                                    
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Transfer to $not_result[Bank] <i class='fa fa-bank'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else if ($not_result["Type"] == "Money Request"){
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Money Request <i class='fa fa-money'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else{
                              
                                
                                if($not_result["Type"] == "Airtime purchase"){
                                    
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Airtime Top Up $not_result[Sender_account_no] <i class='fa fa-phone' style='color: skyblue'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else if
                                ($not_result["Type"] == "Data purchase"){
                                
                                 $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                 
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Data purchase $not_result[Sender_account_no] <i class='fa fa-wifi' style='color: skyblue'></i> </p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p><img src='$network_image' width='70px'><br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                
                                
                                
                                
                                
                                }else{
                                    
                                    
                                if($not_result["Type"] == "Account Statement"){
                                
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>ACCOUNT STATEMENT</p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                }else if
                                ($not_result["Type"] == "Referal"){
                                
                                $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p>Referal Bonus <i class='fa fa-trophy' style='color: gold;'></i></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                
                                }else{
                                
                                    $not_amount = "₦". number_format($not_result["Amount"]) .".00";
                                
                                echo "
                                
                                
                                <div class='notifications-container'>
                                
                                <p>$not_date </p>
                                
                                <p><i class='fa fa-circle'$remark></i> </p>
                                <p><!--i class='fa fa-bank'></i--></p>
                                
                                <b $remark> <br>$not_result[Remark]<br>$not_amount </b>
                                
                                
                                <p>$not_result[Type]<br>$not_result[Type_name]</p>
                                
                                <b $remark_color>$not_result[Status_remark]</b>
                                
                                <p><a href='ViewTransaction?transaction=$not_result[Transaction_id]'>View</a></p>
                                
                                <br>
                                <br>
                                </div>
                                ";
                                
                                }
                                
                                
                                
                                
                                
                                }
                                
                                
                                
                                
                                
                                
                                }}
                                
                                
                                
                                }else{
                                
                                
                                echo "<p>No $type Transaction History for " . $duration."</p>";
                                
                                
                                }
                                
                            
                            
                            
    
    
    
    
    
                            }else{
    
    
    
    
    
                                
    
                                
   // die("coming soon,only <b>All time</b> options is available");
                            }
    
    
    
    
    
                        }
                        
        
    
    
    
                                
    
                                
    //die("coming soon,only <b>All time</b> options is available");
                            }
    
    
    
    
    
                        }
                        
        
    







                    mysqli_close($conn);

}else{


die("Error loading page");


}