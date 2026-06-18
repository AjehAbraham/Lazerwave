<?php
require_once "sessionPage.php";
?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/create-payment-link.css">
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


<!-- AUTO INCREASE TEXT AREAS SIZE-->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.3.min.js"></script>

<!--END OF TEXT AREA -->

<title>Create payment link</title>
<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
</head>
<body>
<?php require_once "default_sidebar.php"; ?>

<div class="form-container">

<h2>Create payment link</h2>

 <form id="FormData">
 <input type="file" name="image"  onchange ="loadFile(event)"style="display:none;" id="file" accept="image">

<p><img id="output">  </p>

<p>Add image(optional)</p>

<p><label for="file">Select Image</lable></p>
        <br>
<label>Message(optional)</label>

<textarea  cols="" rows="" placeholder="Type, paste, cut text here..."name="Message"></textarea>

<br>

<label>Link Title</label>

<input type="text" name="title" autocomplete="on" placeholder="What's this for? e.g donation,Rent,fees,Contribution..">
<br>

<label>Amount(₦1,000 and above)</label>

<input type="number" name="amount" inputmode="numeric" placeholder="e.g 1000">

<br>

<div class="select-terms-container">
 <!--label class="switch" id="selector">
  <input type="checkbox" name="terms" value="Yes" >
  <span class="slider round" id="selector"></span></label>


<br><br-->
<b><input type="checkbox" name="terms" value="Yes" > I agree to terms and conditions.<br><a href="#"> Terms and condtions</a></b>

<p class="error_message" style='text-align: center;color: red;'></p>

<input type="submit" value="Generate Link">
</div>

</form>
</div>
</div>

<?php require_once "Loader-refresh.php";?>

          
<script src="Src/Js/create-payments-link.js"></script>


<?php require_once __DIR__.("/Non-script.php"); 
        
        require_once __DIR__.("/Network.php");
        
                ?>

</body>
</html>
