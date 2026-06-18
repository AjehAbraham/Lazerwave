<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning");
  exit;

    
}
?>

<style>
.Notifications{
width: 100%;
height: 100%;
position: fixed;
transition: 0.4s;
overflow-y: scroll;
transition: 0.1s;
background-color: white;
top: 0;
left: 0;
right: 0;
bottom: 0;
z-index: 3;
}
#close-notification-btn{
color: red;
font-size: 22px;
cursor: pointer;
margin: auto;
display: block;
text-align: center;
}
.Notification-message{
padding: 7px 7px;
background-color: white;
color: #666;
}
.Notification-message p:nth-child(1){
padding: 8px 8px;
background-color: #f1f1f1;
color: #222;
text-align: center;
}

.Notification-message p:nth-child(2){

  text-align: center;
}

.Notification-message p:nth-child(3){

  text-align: center;

}

.Notification-message p:nth-child(4){
padding: 8px 8px;
width: 50%;
text-align: center;
margin-left: 5px;
  background-color: rgb(0,0,56);
  border-radius: 2rem;
  color: white;
  cursor: pointer;
}
@media screen and (min-width: 600px){
  
.Notification-message p:nth-child(4){
  width: 30%;
}
}

.Notification-message p a:link,a:visited{
  color: white;
  text-decoration: none;
}
.Dark-mode .Notifications{
  background-color: rgb(0,0,56);
  color: white;

}
.Dark-mode .Notification-message{
  background-color: rgb(0,0,56);
  color: white;
}
.Dark-mode #close-notification-btn{
  color: white;
}
.Dark-mode .Notification-message p:nth-child(1){
  background-color: #555;
  color: white;
}
</style>



<div class="Notifications">
  <p> <i class="fa fa-close" id="close-notification-btn" onclick='closeNotification()'></i></p>
<?php require_once "db_connection.php";


$notification = "SELECT * FROM Notification WHERE User_id='$_SESSION[New_user]' ORDER BY id DESC";

$NotifyResult =mysqli_query($conn,$notification);

if(mysqli_num_rows($NotifyResult) > 0){


  while($Mynoti = mysqli_fetch_assoc($NotifyResult)){

  $notDate = date("D d F Y",strtotime($Mynoti["Date"]));

//$reciverId = "SELECT * FROM Register_db WHERE id='"


  if($Mynoti["Time"] > 12){

    $notTime = $Mynoti["Time"]."PM";
  }else{


    $notTime = $Mynoti["Time"]."AM";
  }

  if($Mynoti["Type"] == "Transfer"){


    $notAmount = "₦". number_format($Mynoti["Amount"]). ".00";

echo "


<div class='Notification-message'>
<p>$notDate $notTime</p>
<p style='color: mediumseagreen;'> + Credit $notAmount</p>
<p>$Mynoti[Message]</p>

</div>
";

  }elseif($Mynoti["Type"] == "Money request" && $Mynoti["Status"] != "Accepted" && $Mynoti["Receiver_id"] != $_SESSION["New_user"]){

    $notAmount = "₦". number_format($Mynoti["Amount"]). ".00";
    

echo "

<div class='Notification-message'>
<p> $notDate $notTime</p>
<p>Money Request</p>
<p>$Mynoti[Message]. Sum of $notAmount</p>
<p><a href='view-notification?id=$Mynoti[Notify_id]'>See more...</a></p>
</div>
";

    

  }else{

    if($Mynoti["Type"] == "Money request" && $Mynoti["Status"] == "Accepted"){

      $notAmount = "₦". number_format($Mynoti["Amount"]). ".00";

      if($Mynoti["User_id"] == $_SESSION["New_user"]){

        //$NotMessage ="You Accepted the sum of $notAmount via money Request.";

      }else{


//$NotMessage = "Your Request of the sum of $notAmount via money Request has been Accepted.";

      }
      
      $notAmount = "₦". number_format($Mynoti["Amount"]). ".00";
$NotMessage = $Mynoti["Message"];
      echo "

      <div class='Notification-message'>
      <p> $notDate $notTime</p>
      <p>Request has been Accepted!<br>You accepted request of the sum of $notAmount</p>
      <p>$NotMessage </p>
  
      </div>
      ";



    }else if($Mynoti["Type"] =="Money request"  && $Mynoti["Status"] == "Decline"){



      $notAmount = "". number_format($Mynoti["Amount"]). ".00";

      echo "

      <div class='Notification-message'>
      <p> $notDate $notTime</p>
      <p>$Mynoti[Message]</p>
      
  
      </div>
      ";

    
    }else{

echo "

<div class='Notification-message'>
<p> $notDate $notTime</p>
<p>Lazerwave</p>
<p>Urgent Notice</p>
<p><a href='view-notification?id=$Mynoti[Notify_id]'>See more...</a></p>
</div>
";


      
    }



  }

}

}else{


  echo "<h2 style='color: red;text-align: center;'> No Notification</h2>";
}


?>

</div>



<script>
  document.querySelector("#open-notify-btn").addEventListener("click",openNotification);

function openNotification(){

document.querySelector(".Notifications").style.width="100%";


}
document.querySelector("#close-notification-btn").addEventListener("click",closeNotification);

function closeNotification(){

document.querySelector(".Notifications").style.width="0%";

}
</script>
