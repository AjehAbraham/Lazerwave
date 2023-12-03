<?php 
require_once __DIR__.("/sessionPage.php") ;



?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/Verification.css">
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
<title>Verification</title>
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

        <div class="verification-container">
<span class="material-symbols-outlined" onclick="window.history.back()">arrow_back</span>
<a href="dashboard-home">
<i class="fa fa-home" ></i></a>


</div>


<?php 


require_once "db_connection.php";

// cehck if user has already fill form 

$check_user_status = "SELECT * FROM More_information WHERE User_id = '$_SESSION[New_user]'";


//$check_user_result = $conn -> query($check_user_status);

$check_user_result = mysqli_query($conn,$check_user_status);



if (mysqli_num_rows($check_user_result) > 0){

   die("<p style='color: red;text-align: center;'>You have already fill this form,if you want to make some changes please contact 
   admin</p>");

}else{


  require_once "Kyc2.php";




}





require_once "Loader.php";

?>
        
        
       
        <?php //include __DIR__.("/logo.php"); 
        
require_once __DIR__.("/Network.php");
require_once __DIR__.("/Non-script.php"); 
        ?> 
        <script src="Src/Js/Verification.js"></script>
        
        </body>
        </html>
        
        
        
        