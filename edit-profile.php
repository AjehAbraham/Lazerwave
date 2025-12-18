<?php 
require_once __DIR__.("/sessionPage.php");

// check if user has fill form so we can show previous data

$check_found  = "SELECT * FROM Extra_info WHERE User_id = '$_SESSION[New_user]'";

$check_result = mysqli_query($conn,$check_found);

if(mysqli_num_rows($check_result) > 0){

    $results = mysqli_fetch_assoc($check_result);

    $Tel =  $results["Tel"];
    $state = $results["State"];
    $address = $results["Address"];

}else{


    $Tel ="";
    $state = "";
    $address = "";

}

?>


<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/edit-profile.css">
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
<title>Edit profile</title>



<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03F9WWGK85"></script>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>

      </head>
      <body>

<div class="edit-profile-container">


    <form  id="FormData">
<h1>Edit profile</h1>

        <label><b>Phone number:</b></label>
        <br>
      <input type="tel" name="tel" value="<?php echo $Tel ?>"inputmode="numeric">
    
        <br>
    
        <label><b>Address:</b></label>
        <br>
        <input type="text" name="address"  value="<?php   echo $address; ?>">
        <br>


        <label><b>State:</b></label>
        <br>
        <input type="text"  name="state"  value="<?php echo $state;?>">
        <br>

        <p class="error_message"></p>


<input type="submit"  value="Save change">
</form>
</div>
<?php require_once "Loader.php";

 //include __DIR__.("/logo.php"); 
 require_once __DIR__.("/Non-script.php"); 
        require_once __DIR__.("/Network.php");
        
                ?>

    <script src="Src/Js/edit-profile.js"></script>

</body>
</html>