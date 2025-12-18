<?php
require_once "sessionPage.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once "db_connection.php";

    $not_data = "SELECT * FROM Transaction_history WHERE User_id ='$_SESSION[New_user]' 
     ORDER BY Date_id DESC";
 
    
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
    
    
    echo "<p>No Transaction History</p>";
    
    
    }
    


mysqli_close($conn);

}else{

    header("Location: Warning");
    exit;
}