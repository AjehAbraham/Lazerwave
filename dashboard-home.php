<?php
require_once "sessionPage.php";


include __DIR__.("/db_connection.php");

$select_dp = "SELECT * FROM Profile_picture WHERE User_id ='$_SESSION[New_user]' ORDER BY id DESC LIMIT 1 ";


$result = mysqli_query($conn,$select_dp);

if(mysqli_num_rows($result) > 0){
 

   $profile_picture = mysqli_fetch_assoc($result);

      //  require_once "View picture.php";

        $image = $profile_picture["Image_path"];
   
$dp ="Uploads/".$image;
   
    
}else{

  
  $dp ="Images/Null-image.png";

}
//show greeting

$date = date("H");

if ($date <= 11){

  $greet = "Good Morning";

}else if($date >= 16){

  $greet = "Good Evening";

}else{

 if($date >= 12){

$greet = "GoodAfternoon";

 }


}

//FETCH USERNAME//

$userName = "SELECT * FROM Username WHERE User_id='$_SESSION[New_user]'";

$UserResult = mysqli_query($conn,$userName);

if(mysqli_num_rows($UserResult) > 0){

$Query = mysqli_fetch_assoc($UserResult);

$Usernames = $Query["Username"];



}else{

$Usernames = "Chief";


}
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet"href="Src/Css/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">
 
<title>Dashboard</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>


      <div class="header-container">
        <img src="Images/logo.JPEG" style="width: 60px;border-radius: 50%;height: 60px">
    <p><i class="fa fa-bars" id="open-btn"></i></p>
 </div>
 <br><br><br><br>


    <div class="sidebar-container">

<div class="top-nav">
  
<i class="fa fa-close" id="close-btn" style="font-size: 21px;color: white;"></i>


  <h3>Hi <?php echo $user["Surname"] ?>,Welcome back!.</h3>

       <p> <a href="sendmoney"> <i class="fa fa-send"></i><b>Transfer</b></a></p>
       <p><a href="Myprofile"><i class="fa fa-user-plus"></i><b>Profile</b></a></p>      
       <p><a href="setting"><i class="fa fa-cogs"></i><b>Settings</b></a></p>
       <p><a href="logout"><i class="fa fa-sign-out"></i> <b>Logout</b></a></p>
       <p><a href=""><i class="fa fa-exclamation-circle"></i> <b>Get help</b></a></p>

</div>
 </div>



<?php require_once "dashboard.php"; ?>
 
 <script src="Src/Js/dashboard.js"></script>


      </body>
</html>
