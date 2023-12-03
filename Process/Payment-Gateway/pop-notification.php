<?php


$PopNotfiyID = uniqid();
//INSERT INFO INTO NOTIFICATION//
$insertPop = "INSERT INTO Notification(User_id,Amount,Message,Receiver_id,Notify_id,Type,
Date,Time,Ip_addr,Status)
VALUES('$PopRecieverId','$amount','$PopMessage','$PopUserId','$PopNotfiyID','$PopType','$date',
'$time','$PopIp','$PopStatus')
";

if(mysqli_query($conn,$insertPop)){


//DO NOTHING//

}else{

//DO NOTHING//


}