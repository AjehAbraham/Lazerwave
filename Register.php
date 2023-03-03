<?php

/*
session_start();

if (isset($_SESSION["Email"])){

}else{
  header("location:checkReg.php");
  exit;
}
*/
require __DIR__.("/Network.php");


?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Register.css">
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
<title>Register</title>



<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->

      </head>
      <body>

<?php 

require_once __DIR__.("/logo.php") ?>





         <div class="form-container"> 
        
            <h1>Register</h1>
            <?php $action = "Process reg.php"; htmlspecialchars($action);?>

<form method="post" id="formId">

    <label for="surname-name"><b>Surname:</b></label>
    <br>
    <input type="text" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''?>" name="surname" oninput="this.value = this.value.toUpperCase()">
   


    <label for="last-name"><b>Last name(optional):</b></label>
    <br>
    <input type="text" name="last_name" oninput="this.value = this.value.toUpperCase()">
    <br>



    <label for="First-name"><b>First name:</b></label>
    <br>

    <input type="text" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''?>" name="first_name"  oninput="this.value = this.value.toUpperCase()">
   


<p>
    Male
    <input type="radio" name="Gender"  value="Male">
    Female
    <input type="radio" name="Gender" value="Female"></p>

    
<p>


<select name="Country">
  <option><?php echo isset($_POST['country']) ? $_POST['country'] : ''?></option>
  <option>Nigeria</option>
  <option>Ghana</option>
  <option>South Africa</option>
</select></p>

<p class="danger"><?php ?></p>

    <label for="E-mail"><b>E-mail:</b></label>
    <br>

    <input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : '' ?>"placeholder="Mail..." autocomplete="on">
    


    <label for="password"><b>password:</b></label>
    <br>
    <input type="password"name="Password" autocomplete="off" name="password" value=" <?php echo isset($_POST['password']) ? $_POST['password'] : ''?>" placeholder="password...">
    
    <p class="danger_password"></p>


    <p><input type="checkbox" name="terms" value="yes"> I have agree to the terms and conditions.
    <br>
    <a href=""><b>Privacy policy</b></a>
    <br>
    <a href=""><b>Cookie policy</b></a>
<br>
  <a href="">  <b>Terms and conditions</b></a>
    </p>

<p style="color:red;"><?php ?></p-->

<div class="register">
    <input type="submit" id="submitButton" value="Register">
    </div>
    
    </form>

    <a href="login.php"><div class="sign-in"><input type="submit" value="Sign in"></a></div>
    </div>


    <p class="error_message"></p>



<div class="loader-overlay">

<div class="loader-message">
</div>
</div>













<script src="Register.js"></script>

    </body>
    </html>


  <?php require_once __DIR__.("/footer.php") ?>


