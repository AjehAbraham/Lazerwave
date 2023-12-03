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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>    
<title>Dashboard</title>

      </head>
      <body>

    <div class="sidebar-container">
        <i class="fa fa-close" id="close-btn" style="font-size: 21px;color: white;"></i>

      

<?php  //require_once "Flag.php";?>

  <h3>Hi <?php echo $user["Surname"] ?>,welcome back!.</h3>



<div class="top-nav">
       <a href="saved-beneficiary"> <p><i class="fa fa-send" style="margin-right: 10px;"></i>
       <b>Transfer</b></a></p>

       
       
        <a href="Myprofile"><p><i class="fa fa-user-plus" style="margin-right: 8px;"></i><b>MyProfile</b></a></p>      

         
            <a href="setting"> <p><i class="fa fa-cogs" style="margin-right: 15px;"></i><b>Settings</b></a></p>




  <a href="logout"> <p><i class="fa fa-sign-out" style="margin-right: 15px;"></i> <b>Logout</b></a></p>


  <!--a href="About" target='blank'><p><i class="fa fa-support" 
       style="margin-right: 20px;"></i><b>support</b></a></p-->

</div>

 </div>


 <div class="header-container">
<img src="Images/logo.JPEG" 
     style='width: 40px;height: 40px;border-radius: 50%;'>

    <p style="margin-top: -10px;"><i class="fa fa-bars" id="open-btn"></i></p>
 </div>

</div>



<?php require_once "dashboard.php"; ?>

 
 <script src="Src/Js/header.js"></script>


      </body>
</html>
