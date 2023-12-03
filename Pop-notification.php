<?php
//require_once "sessionPage.php";
session_start();
if (isset($_SESSION["New_user"])){

    require_once __DIR__.("/db_connection.php");

   // require_once "Verfiy login.php";

    $SQL = "SELECT * FROM Register_db WHERE id = '$_SESSION[New_user]' ";

 
$result = mysqli_query($conn,$SQL);

$user = mysqli_fetch_assoc($result);
$seen = "seen";
$pop = "SELECT * FROM Notification WHERE  Remark IS NULL AND User_id ='$_SESSION[New_user]' ORDER BY id DESC ";

$pop_result = mysqli_query($conn,$pop);

if(mysqli_num_rows($pop_result) > 0){

    //AFTER USER HAS SEEN IT THEN UPDATE IT TO AVOID SHOWING IT AGAIN//

    $update = "UPDATE Notification SET Remark='seen' WHERE User_id='$_SESSION[New_user]'";

    if(mysqli_query($conn,$update)){



    }else{

        echo "All";

    }


    echo '
    <div class="pop-Notification-overlay">
    
<p><i class="fa fa-close" id="close_popUp" onclick="close_popUp()"></i></p>
    ';

while($pop_not = mysqli_fetch_assoc($pop_result)){

if($pop_not["Type"] == "Money request" && $pop_not["Status"] != "Accepted" or $pop_not["Status"] != "Decline"){
    
$pop_amount ="₦" .number_format($pop_not["Amount"]). ".00";
echo"
<div class='Pop-Notifications'>
    <p>Notification <i class='fa fa-bell' id='Notification-bell'></i></p>
    <p>Hello $user[Surname]</p>
<p>$pop_not[Message]<br> <b style='font-size: 17px;'>$pop_amount</b></p>
<p><a href='view-notification?id=$pop_not[Notify_id]'>View <i class='fa fa-eye'></i></a></p>
</div>

";


}else{
    
echo"
<div class='Pop-Notifications'>
    <p>Notification <i class='fa fa-bell' id='Notification-bell'></i></p>
    <p>Hello $user[Surname]</p>
<p>$pop_not[Message]<br></p>
<p><a href='view-notification?key=$pop_not[Notify_id]'>View <i class='fa fa-eye'></i></a></p>
</div>

";

}

}

echo "
</div>";

}else{

//DO NOTHING AS NO NOTIFICATION WAS FOUND FROM USER//
die("All");
}

}else{

    die("All");
}
?>


<style>
      .pop-Notification-overlay{
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                overflow-y: scroll;
                background-color: #f1f1f1;
                z-index: 4;
            }
           #close_popUp{
            margin: auto;
            display: block;
            text-align: center;
            color: red;
            font-size: 17px;
           }
            .Pop-Notifications{
                text-align: center;
                box-shadow: 0px 16px 8px 0px rgba(0,0,56);
                width: 90%;
                margin: auto;
                padding: 5px 5px;
                font-size: 15px;
                margin-top: 10%;
                z-index: 4;
                background-color: white;
            }
            
            @media screen and (min-width: 600px){
                .Pop-Notifications{
                    margin-top: 5%;
                    width: 60%;
                }
            }
            .Pop-Notifications p:nth-child(1){
font-size: 15px;
            }
            #Notification-bell{
                animation: shake-bell .2s infinite;
            }
            @keyframes shake-bell {
                0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
            }
            .Pop-Notifications p:nth-child(2){
                font-size: 15px;
                
            }
            .Pop-Notifications p:nth-child(3){
                font-size: 13px;
            }
            .Pop-Notifications p:nth-child(4){
                padding: 8px 8px; 
                color: white;
                background-color: rgba(0,0,56);
                margin: auto;
                width: 75%;
                border-radius: 2rem;
                margin-bottom: 10px;
                cursor: pointer;
            }
            .Pop-Notifications p:nth-child(4) a:link,a:visited{
                color: white;
                text-decoration: none;
            }
            .Pop-Notifications p:nth-child(5){
               padding: 8px 8px; 
               color: white;
               background-color: red;
               margin: auto;
               width: 75%;
               border-radius: 2rem;
               margin-bottom: 10px;
            cursor: pointer;
            }
            @media screen and (min-width: 600px){
                .Pop-Notifications p:nth-child(4){
                    width: 40%;
                }
                .Pop-Notifications p:nth-child(5){
                    width: 40%;
                }
            }
            .Dark-mode  .pop-Notification-overlay{
                background-color: rgb(0,0,56);
                color: white;
            }
            .Dark-mode  .Pop-Notifications{
                background-color: rgb(0,0,20);
                color: white;
            }
            </style>
