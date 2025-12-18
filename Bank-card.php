<?php 
require_once __DIR__.("/sessionPage.php");

?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Src/Css/view-virtualcard.css">
    <link rel="stylesheet" href="Src/Css/bank-card.css">
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
<title>Bank card</title>

<link rel="icon" type="image/jpeg" href="Images/logo.JPEG"/>
      </head>
      <body>

     
        <div class="bank-card-container">

<h1><a href="virtualCard"><i class="fa fa-credit-card"></i></a>Bank card</h1>

        </div>

<?php 

$selct_card =  "SELECT * FROM User_card WHERE User_id ='$_SESSION[New_user]' ORDER BY id DESC";


//$result = $conn -> query ($selct_card);
$result = mysqli_query($conn,$selct_card);

if (mysqli_num_rows($result)> 0){
   
        while ($card = mysqli_fetch_assoc($result)){

               $card_details=substr($card["Card_no"],-4);
                
                $card_four = substr($card["Card_no"], 0,-10);
               
             

                echo "<br>
                <div class='saved-cards'>
                <p>$card[Type]</p>
        <p> $card_four ******* $card_details
         <i class='fa fa-flash' style='color: red'></i></p>
         <p> $card[Full_name]</p>
        <p><form class='form_data' id='$card[Hash_key]'><input type='hidden' name='rayID'
        value='$card[Hash_key]'><button class='fetch'>
        View <i class='fa fa-eye'></i></button></form></p>
        
        <br><br><br>
                </div>";
        }
}else{
        echo "<p style='text-align:center;'>No card found</p>";
}


?>
<p class="status_message"></p>

       <div class="add-card">
           <a href="virtualCard"><p> <i class="fa fa-plus"></i> Create Virtual Card</p></a>
        </div>      
        <?php 
        
        include __DIR__.("/Loader.php"); 

require_once __DIR__.("/Network.php");

require_once "Non-script.php";
        ?>
        <script src="Src/Js/Bank-card.js"></script>
        </body>
        </html>