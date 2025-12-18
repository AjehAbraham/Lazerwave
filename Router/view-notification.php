<?php
require_once "sessionPage.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){


    if(isset($_GET["id"]) && !empty($_GET["id"])){

$id = htmlspecialchars($_GET["id"]);

$id = stripslashes($id);
$id = trim($id);

require_once "db_connection.php";

$id = mysqli_real_escape_string($conn,$id);

$fetch = "SELECT * FROM Notification WHERE Notify_id ='$id'";

$Request = mysqli_query($conn,$fetch);
if(mysqli_num_rows($Request) > 0){

$results = mysqli_fetch_assoc($Request);

$date = date("d D F Y",strtotime($results["Date"]));

if($results["Time"] > 12){
    $time = $results["Time"]. "PM";

}else{

    $time = $results["Time"]. "AM";
}

if($results["Type"] == "Money request" && $results["Status"] !="Accepted"){

    $amount = "₦". number_format($results["Amount"]). ".00";

$info = "
<div class='Notification-message'>

<p>$date $time</p>

<p> $results[Message].Sum of $amount.</p>

<form id='FormData'>
<input type='hidden' name='id' value='$results[Notify_id]'>
<p class='accept'> Accept Request</p>";




}elseif ($results["Type"] ==  "Bonus"){

    $amount = "₦". number_format($results["Amount"]). ".00";

    $info= "
    <div class='Notification-message'>
    
    <p>$date $time</p>
    
    <p><b>Bonus Reward</p><br> $results[Message]</p>
    <p>Claim Reward</p>
    </div>
    
    ";
    
    

}else{

    $info = "
    <div class='Notification-message'>
    
    <p>$date $time</p>
    <p><b>Lazerwave Notice!</b></p>
    <p> $results[Message]</p>
    </div>
    
    ";
    
    



}



}else{

    header("Location: dashboard-home");
    exit;
}

    }else{

        header("Location: dashboard-home");
        exit;
    }

}

?>



<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/view-notification.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         

<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>

<!--ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->


<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">

<title>Notification</title>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-03F9WWGK85');
</script>
</head>
<body>





<?php 

echo $info;

require_once "Transaction-pin-box.php";
"</form>";

//require_once "Transaction-pin-box.php"; 


require_once "Network.php";

require_once "Non-script.php";


require_once "Loader-refresh.php";

?>


<script src="Src/Js/view-notification.js"></script>
</body>
</html>